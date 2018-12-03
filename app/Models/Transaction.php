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
    protected $fillable = ['user_id', 'referral_id', 'btc_address', 'total_eur', 'status'];

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
}
