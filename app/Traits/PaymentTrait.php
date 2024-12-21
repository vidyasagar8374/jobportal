<?php

namespace App\Traits;
use App\Models\Purchaseplan;
use Illuminate\Http\Request;
use Auth;

trait PaymentTrait {
    public function purchase($payment)
    {
        $data = new Purchaseplan;
        $data->user_id = Auth::user()->id;
        $data->payment_id = $payment['type'];
        $data->isactive = 1;
        $data->isexpiry = 0;
        $data->save();
        if($data)
        {
            return 1;
        }
        return 0;
    }

}