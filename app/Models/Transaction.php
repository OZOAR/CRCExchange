<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'referral_id', 'btc_address', 'total_eur', 'status', 'transaction_id'];

    /**
     * @var bool
     */
    public $timestamps =  false;

    /**
     * @var array
     */
    protected $dates = ['created_at'];

    /**
     * Get id of the transaction.
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get BTC address of the transaction.
     *
     * @return string
     */
    public function getBtcAddress()
    {
        return $this->btc_address;
    }

    /**
     * Set BTC address for the transaction.
     *
     * @param string $btcAddress
     */
    public function setBtcAddress($btcAddress = null)
    {
        $this->btc_address = $btcAddress;
    }

    /**
     * Get total of the transaction in EUR.
     *
     * @return double
     */
    public function getTotal()
    {
        return $this->total_eur;
    }

    /**
     * Set total for the transaction.
     *
     * @param double $total
     */
    public function setTotal($total = null)
    {
        $this->total_eur = $total;
    }

    /**
     * Get status of the transaction.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status for the transaction.
     *
     * @param string $status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Get date of the transaction.
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->created_at;
    }

    /**
     * Get transaction owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get transaction referer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referer()
    {
        return $this->belongsTo(User::class, 'referral_id');
    }


    public function verifyTrans()
    {
        $method = 'POST';
        $target_url = 'https://indacoin.com/api/exgw_gettransactioninfo';
        $nonce = 1000000;
        $partnername='exrate';//ask for it
        $string=$partnername."_".$nonce;
        $secret= '4caa0510ac50dd5'; //ask for it
        $sig = base64_encode(hash_hmac('sha256', $string, $secret,true));

        $arr = array(
            'transaction_id' => $this->transaction_id
        );


        $data = json_encode($arr);

        $options = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n"
                    ."gw-partner: $partnername\r\n"
                    ."gw-nonce: ".$nonce."\r\n"
                    ."gw-sign: ".$sig."\r\n",
                'method' => $method,
                'content' => $data
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($target_url, false, $context);
        $result = json_decode($result);


        if($result->status == 'Finished'){

//print_r($result);
//die();

            $btc = $this->getPrice($result->curIn, 'BTC', $result->amountIn);
//            var_dump($this->referer);
//            die();




            $newBalance = sprintf('%f', ($btc / 100 * 2.5));

            $this->referer->balance = $newBalance;

//            $this->referer->balance = ((float)$this->referer->balance + $btc)/100 * (int)$this->referer->percent;
            $this->referer->save();

//            die();

            $this->status = 2;
            $this->save();


        }
    }

    public function getPrice($from, $to, $amount){
        $partner = 'exrate';
        $userId = 'support@exrate.cc';

        $url = 'https://indacoin.com/api/GetCoinConvertAmount/' . $from . '/' . $to . '/'.$amount.'/' . $partner . '/' . $userId;
        $val = (float)file_get_contents($url);
        return $val;

    }
}
