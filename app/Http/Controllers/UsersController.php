<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use Illuminate\Http\Request;
use Auth;
use Session;
use Omnipay\Omnipay;


class UsersController extends Controller
{

    private $gateway;

    public function __construct(){
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function store_order(Request $request){
        
        if($request->payment && $request->terms){
        $user = Auth::user();
        $carts = session()->get('cart');
        $order = new Order;
        $total_price = 0;
        $total_qty = 0;
        foreach ($carts as $cart) {
            $total_price += $cart['price'] * $cart['qty'];
            $total_qty += $cart['qty'];
        }

        $order->user_name = $user->name;
        $order->email = $user->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->total_price = $total_price;
        $order->order_status = 'Pending';
        $order->user_id = $user->id;
        $order->terms = $request->terms;
        $order->payment = $request->payment;
        $order->total_price = $total_price;
        $order->total_qty = $total_qty;
        $order->save();
        
        

        foreach($carts as $cart){
            $order_pro = new OrderProduct;
            $order_id = $order->id;
            $order_pro->order_id = $order_id;
            $order_pro->price = $cart['price'];
            $order_pro->qty = $cart['qty'];
            $order_pro->product_name = $cart['name'];
            $order_pro->product_id = $cart['id'];

            $order_pro->save();
        }
        
    }else{
        return 'Please complete the form';
    }

    //Session::forget('cart');
    return view('frontend.users.paypal');
    
    }

    public function pay(Request $request){
        $carts = session()->get('cart');
        $total_price = 0;
        $total_qty = 0;
        foreach ($carts as $cart) {
            $total_price += $cart['price'] * $cart['qty'];
            $total_qty += $cart['qty'];
        }

        try {
            $paypal_amount = round($total_price,2);
            $response = $this->gateway->purchase(array(
                'amount' => $paypal_amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();
            if($response->redirect()){
                $response->redirect();
            }else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function success(Request $request){
        if($request->input('paymentId') && $request->input('payerId')){
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('Payer_ID'),
                'transactionReference' => $request->input('paymentId')

            ));
            $response = $transaction->send();
            if($response->isSuccessful()){
                $arr = $response->getData();
                $payment = new Payment;
                $payment->order_id = Auth::user()->orders->id;
                $payment->user_id = Auth::user()->id;
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transaction'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCEY');
                $payment->payment_status = $arr['state'];
                $payment->save();
                return 'Payment is successful. Your transaction is '. $arr['id'];
            }else{
                return $response->getMessage();
            }
        }else{
            return 'Declined';
        }
    }

    public function error(){
        return 'User declined the payment';
    }
}
