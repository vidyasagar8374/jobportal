<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Stripe;
use App\Traits\PaymentTrait;
use App\Models\PurchaseDetail;
use App\Models\Purchaseplan;

class PaymentController extends Controller
{
    use PaymentTrait;
    public function purchaseplan(Request $request)
    {
        return $this->purchase($request->all());
    }
    public function purchaseplaninfo(Request $request)
    {
        $type = $request->type;
        $amount = $request->pay;
        $user = \Auth::user()->id;
        $time = \Carbon\Carbon::now()->timestamp;
        $rand = rand();
        $transistation_id = $user . '-' . $type . '-' . $time . '-' . $rand;
        $stripe = new \Stripe\StripeClient('sk_test_51ON1LSFbFABFB0UVw71HbM9KMUlqv8w6YFlk6SvARvNp0g22tejNvTi0NuSw96Bpv0N9gOONDdzay6GPR7a24xc300T3OEFW0g');
        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => \Auth::user()->id . ':' . \Carbon\Carbon::now(),
                ],
                'unit_amount' => $amount * 100,
            ],
            'quantity' => 1,
            ]],
            'metadata' => array("trans_id" => $transistation_id),
            'mode' => 'payment',
            'success_url' => url('transactionsuccess?trans='. encrypt($transistation_id)),
            'cancel_url' => url('transactionfailed'),
        ]);
        $createpayment = new PurchaseDetail; 
        $createpayment->trans_id = $checkout_session->id;
        $createpayment->ref_id = $transistation_id;
        $createpayment->status = 'pending';
        $createpayment->plan = $type;
        $createpayment->user_id = \Auth::user()->id;
        $createpayment->payment_type = 'online';
        $createpayment->amount = $amount;
        $createpayment->payment_recived = 'pending';
        $createpayment->save();
        return Redirect::to($checkout_session->url);
    }
    public function transactionsuccess(Request $request){
        $updatePayment = PurchaseDetail::where('ref_id', decrypt($request->trans))->where('user_id', \Auth::user()->id)->update([
            'payment_recived' => 'recived',
            'status' => 'success',
        ]); 
        

        $paymentdetails = PurchaseDetail::where('ref_id', decrypt($request->trans))->where('user_id', \Auth::user()->id)->first();
        $updatePurchase = new Purchaseplan;
        $updatePurchase->user_id = \Auth::user()->id;
        $updatePurchase->payment_id = $paymentdetails->plan;
        $updatePurchase->isactive = 1;
        $updatePurchase->isexpiry = 0;
        $updatePurchase->save();
        $postUrl = route('payment.successpage');
        return view('payment.success', compact('paymentdetails', 'postUrl'));
    }
    public function paymentsuccesspage(Request $request){
        $data = $request->all();
        return view('payment.transistationsuccesspage', compact('data'));
    }
}
