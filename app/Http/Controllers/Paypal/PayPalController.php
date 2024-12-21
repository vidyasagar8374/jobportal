<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use App\Models\Purchaseplan;
use App\Models\paymentbnkdetails;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;


class PayPalController extends Controller
{
    //
    public function index(){
        return view('paypal');
    }

    public function payment(Request $request)
    {
       
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
  
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success'),
                "cancel_url" => route('paypal.payment/cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->pay
                    ]
                ]
            ]
        ]);
        // $response = json_decode($response, true);
        // dd($response);
        // filled
        $addpurchase_list = new PurchaseDetail;
        $addpurchase_list->trans_id = $response['id'];
        $addpurchase_list->status = "pending";
        $addpurchase_list->user_id = \Auth::user()->id;
        $addpurchase_list->plan = $request->type;
        $addpurchase_list->ref_id = Str::uuid();
        $addpurchase_list->payment_type = "Online";
        $addpurchase_list->amount =  $request->pay;
        $addpurchase_list->payment_recived = "Pending";
        $addpurchase_list->save();
        $paymentpurchase_id =$addpurchase_list->id;
        $startDate = Carbon::now();
        $expiretime = $startDate->addMonths($request->expiretime);
        $userlimit = $request->userlimit;
        session(['paymentpurchaseid' => $paymentpurchase_id]);
        session(['expiretime' => $expiretime]);
        session(['userlimit' => $userlimit]);


  
        if (isset($response['id']) & $response['id'] != null) {
  
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
  
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
  
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    
    }

    public function paymentCancel()
    {
        return redirect()
              ->route('paypal')
              ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentSuccess(Request $request)
    {
        // dd($request->all());

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        //  dd($response);
        $responsedetails  = json_encode($response);
        if (isset($response['status']) & $response['status'] == 'COMPLETED') {
              
                $trans_id = $response['id']; 
                $updatePurchaseDetail = PurchaseDetail::where('trans_id', $trans_id)->update([
                    'status' => "COMPLETED",
                    'payment_recived' => "received",
                    'info'=> $responsedetails,
                    
                ]);

                $insertpurchaseplans = new Purchaseplan;
                $insertpurchaseplans->user_id = \Auth::user()->id;
                $insertpurchaseplans->payment_id = session()->get('paymentpurchaseid');
                $insertpurchaseplans->isactive =  1;
                $insertpurchaseplans->isexpiry =  0;
                $insertpurchaseplans->isexpirydate= session()->get('expiretime');
                $insertpurchaseplans->userlimit= session()->get('userlimit');
                $insertpurchaseplans->save();

                Session::forget('paymentpurchaseid');
                Session::forget('expiretime');
                Session::forget('userlimit');



                // $flattenedArray = [];

                // // Function to recursively save keys and values into the array
                // function saveKeyValue($array, &$output) {
                //     foreach ($array as $key => $value) {
                //         if (is_array($value)) {
                //             // Recursively process nested arrays
                //             saveKeyValue($value, $output);
                //         } else {
                //             // Save key-value pairs
                //             $output[$key] = $value;
                //         }
                //     }
                // }

                // // Call the function to flatten the array
                // saveKeyValue($response, $flattenedArray);
                // // dd($flattenedArray);
                
                // $savepaymentdetails = new paymentbnkdetails;
                // $savepaymentdetails->payment_id = $flattenedArray['id'];
                // $savepaymentdetails->email_address = $flattenedArray['email_address'];
                // $savepaymentdetails->account_id = $flattenedArray['account_id'];
                // $savepaymentdetails->account_status = $flattenedArray['account_status'];
                // $savepaymentdetails->given_name = $flattenedArray['given_name'];
                // $savepaymentdetails->name = $flattenedArray['given_name'] .$flattenedArray['surname'];
                // $savepaymentdetails->surname = $flattenedArray['surname'];
                // $savepaymentdetails->country_code = $flattenedArray['country_code'];
                // $savepaymentdetails->address_line_1 = $flattenedArray['address_line_1'];
                // $savepaymentdetails->address_line_2 = $flattenedArray['address_line_2'];
                // $savepaymentdetails->admin_area_2 = $flattenedArray['admin_area_2'];
                // $savepaymentdetails->admin_area_1 = $flattenedArray['admin_area_1'];
                // $savepaymentdetails->postal_code = $flattenedArray['postal_code'];
                
                // $savepaymentdetails->save();


                

            return redirect()
                ->route('EmployeeHome')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('EmployeeHome')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }




}
