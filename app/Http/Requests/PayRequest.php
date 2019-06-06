<?php

namespace App\Http\Requests;

use App\Rules\BtcAddressRule;
use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $array = [
//            'btc-address' => ['required_if:crypt,BTC', 'string', new BtcAddressRule],
            'eur-amount'  => 'integer|min:30|max:10000',
            'referral-id' => 'integer|exists:users,id',
        ];

        $crypt = $this->request->get('crypt');//Get the input value
        if($crypt == 'BTC'){
            $array['btc-address'] = ['required', 'string', new BtcAddressRule];
        }

        return $array;

    }
}
