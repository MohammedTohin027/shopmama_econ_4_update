<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class StripeController extends Controller
{
    public function storeCheckout(Request $request){
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51K4GINDfqbtwx5tX7WhvQGR2bzqgVB7cf7aKEANbhCY7N5d67E7CWLt2An6wr7bgUzmdJM56PX3I8zaKnipa3WFv00pu28SfJ6');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:

        if (session()->has('coupon')) {
            $total_amount = session()->get('coupon')['total_amount'];
        }
        else {
            $total_amount = round(Cart::total());
        }

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $total_amount * 100,
        'currency' => 'usd',
        'description' => 'Example charge',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);



        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
            'payment_type' => 'stripe',
            'payment_method' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            'invoice_no' => 'SPM'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);

        $order = Order::findOrFail($order_id);

        $data = [
            'name' => $order->name,
            'invoice_no' => $order->invoice_no,
            'amount' => $order->amount,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        $carts = Cart::content();
        foreach ($carts as $item) {
            OrderItem::create([
                'order_id' => $order_id,
                'product_id' => $item->id,
                'color' => $item->options->color,
                'size' => $item->options->size,
                'image' => $item->options->image,
                'qty' => $item->qty,
                'price' => $item->price,
                'created_at' => Carbon::now(),
            ]);
        }

        Cart::destroy();
        if (session()->has('coupon')) {
            Session::forget('coupon');
        }

        $notification= [
            'message' => 'Order Complited Successfylly',
            'alert-type' => 'success',
        ];
        return redirect()->route('user.dashboard')->with($notification);


    }
}