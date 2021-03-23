<?php

namespace App\Http\Controllers;

use App\casereg_model;
use App\crime_model;
use App\DCB\ForwadAcceptCase;
use App\DCB\ReleaseCase;
use App\User;
use App\CaseWithdrawRequest;
use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use Brian2694\Toastr\Facades\Toastr;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
        $case=casereg_model::with(['unit','crimes'])->findOrFail($request->case_id);
         $accept_case=ForwadAcceptCase::where('case_id',$case->id)->where('accept_status',1)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)->first();
    if(!empty($accept_case)){
        $withdrawRequest=new CaseWithdrawRequest();
        $withdrawRequest->case_id=$request->case_id;
        $withdrawRequest->forward_id=$accept_case->id;
        $withdrawRequest->fine=$request->fine;
        $withdrawRequest->service_charge=$request->service_charge;
        $withdrawRequest->total=$request->total;
        $withdrawRequest->payment_method=$request->payment_method;
        $withdrawRequest->mobile_operator=$request->mobile_operator;
        $withdrawRequest->mobile_number=$request->mobile_number;
        $withdrawRequest->tax_transaction_id=$request->tax_transaction_id;
        $withdrawRequest->reference=$request->reference;
        $withdrawRequest->courier_address=$request->courier_address;
        $withdrawRequest->status='Pending';
        $withdrawRequest->date=date('Y-m-d');
        $withdrawRequest->save();

        $post_data = array();
        $post_data['total_amount'] = $request->total; # You cant not pay less than 10
        $post_data['courier_address'] = $request->courier_address; # You cant not pay less than 10
        $post_data['case_id'] = $request->case_id; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $withdrawRequest->id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        // $update_product = DB::table('orders')
        //     ->where('transaction_id', $post_data['tran_id'])
        //     ->updateOrInsert([
        //         'name' => $post_data['cus_name'],
        //         'email' => $post_data['cus_email'],
        //         'phone' => $post_data['cus_phone'],
        //         'amount' => $post_data['total_amount'],
        //         'status' => 'Pending',
        //         'address' => $post_data['cus_add1'],
        //         'transaction_id' => $post_data['tran_id'],
        //         'currency' => $post_data['currency']
        //     ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
        }
    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function success(Request $request)
    {
        // return $request;
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $mobile_op = $request->input('card_issuer');
        $PaymentMethod = $request->input('card_brand');
        $bnktran = $request->input('bank_tran_id');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        // $order_detials = DB::table('orders')
        //     ->where('transaction_id', $tran_id)
        //     ->select('transaction_id', 'status', 'currency', 'amount')->first();
        $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);
        $withdrawRequest=$checkWithdra;
        // $withdrawRequest->status=1;
        // $withdrawRequest->total=$amount;
        // $withdrawRequest->tax_transaction_id=$bnktran;
        // $withdrawRequest->mobile_operator= $mobile_op;
        // $withdrawRequest->bank_branch= $mobile_op;
        // $withdrawRequest->payment_method= $mobile_op;
        // $withdrawRequest->save();


        if ($withdrawRequest->status == 'Pending') {
            $validation = $sslc->orderValidate($tran_id, $amount, $currency, $request->all());

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);
                $withdrawRequest=$checkWithdra;
                $withdrawRequest->status='Processing';
                $withdrawRequest->total=$amount;
                $withdrawRequest->tax_transaction_id=$bnktran;
                $withdrawRequest->mobile_operator= $mobile_op;
                $withdrawRequest->bank_branch= $mobile_op;
                $withdrawRequest->payment_method= $PaymentMethod;
                $withdrawRequest->save();

                Toastr::success('Your payment success full :)' ,'Error');
                return redirect('/new-case');
                echo "<br >Transaction is successfully Completed";
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                // $update_product = DB::table('orders')
                //     ->where('transaction_id', $tran_id)
                //     ->update(['status' => 'Failed']);
                    $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);
                    $withdrawRequest=$checkWithdra;
                    $withdrawRequest->status='Failed';
                    $withdrawRequest->save();
                    Toastr::error('Your Validation Fail success full :)' ,'Error');
                return redirect('/new-case');
                echo "validation Fail";
            }
        } else if ($withdrawRequest->status == 'Processing' || $withdrawRequest->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            Toastr::success('Transaction is successfully Completed:)' ,'Success');
                return redirect('/new-case');
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            Toastr::error('Invalid Transaction:)' ,'Error');
            return redirect('/new-case');
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);

        $order_detials = $checkWithdra;

        if ($order_detials->status == 'Pending') {
            $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);
                    $withdrawRequest=$checkWithdra;
                    $withdrawRequest->status='Failed';
                    $withdrawRequest->save();
                    $dd =  $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);
                $dd->delete();
                    Toastr::error('Invalid Transaction:)' ,'Error');
                    return redirect('/new-case');
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            Toastr::success('Transaction is already Successful:)' ,'Success');
            return redirect('/new-case');
            echo "Transaction is already Successful";
        } else {
            Toastr::error('Invalid Transaction:)' ,'Error');
            return redirect('/new-case');
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {

        $tran_id = $request->input('tran_id');

        $order_detials =  $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);

        if ($order_detials->status == 'Pending') {
                $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);
                $withdrawRequest=$checkWithdra;
                $withdrawRequest->status='Canceled';
                $withdrawRequest->save();
                $dd =  $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);
                $dd->delete();
                Toastr::error('Transaction is Cancel:)' ,'Error');
            return redirect('/new-case');
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            Toastr::success('Transaction is already Successful:)' ,'Success');
            return redirect('/new-case');
            echo "Transaction is already Successful";
        } else {
            Toastr::error('Transaction is Invalid:)' ,'Error');
            return redirect('/new-case');
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            // $dd =  $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);
            //     $dd->delete();
            $order_details = CaseWithdrawRequest::findOrFail($tran_id);

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($tran_id, $order_details->amount, $order_details->currency, $request->all());
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    // $update_product = DB::table('orders')
                    //     ->where('transaction_id', $tran_id)
                    //     ->update(['status' => 'Processing']);
                        $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);
                        $withdrawRequest=$checkWithdra;
                        $withdrawRequest->status='Processing';
                        $withdrawRequest->save();
                        Toastr::success('Transaction is successfully Completed:)' ,'Success');
                        return redirect('/new-case');
                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    // $update_product = DB::table('orders')
                    //     ->where('transaction_id', $tran_id)
                    //     ->update(['status' => 'Failed']);

                        $checkWithdra=CaseWithdrawRequest::findOrFail($tran_id);
                        $withdrawRequest=$checkWithdra;
                        $withdrawRequest->status='Failed';
                        $withdrawRequest->save();
                        Toastr::error('validation Fail:)' ,'Error');
                        return redirect('/new-case');
                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.
                Toastr::success('Transaction is already Successful:)' ,'Success');
                return redirect('/new-case');
                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.
                Toastr::error('Invalid Transaction:)' ,'Error');
                return redirect('/new-case');
                echo "Invalid Transaction";
            }
        } else {
            Toastr::error('Invalid Data:)' ,'Error');
            return redirect('/new-case');
            echo "Invalid Data";
        }
    }

}
