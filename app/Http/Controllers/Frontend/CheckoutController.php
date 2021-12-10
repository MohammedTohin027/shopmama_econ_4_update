<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Ship_Division;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //  coupon apply
    public function couponApply(Request $request){
        $coupon_name = $request->coupon_name;
        $coupon = Coupon::where('coupon_name', $coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->where('status', 1)->first();
        if ($coupon) {
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round((Cart::total() * $coupon->coupon_discount) / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount) / 100),
            ]);
            return response()->json(['success' => 'Coupon Applied Successfully']);
        } else {
            return response()->json(['error' => 'Coupon is Invalied']);
        }
    }

    //  coupon Calculation
    public function couponCalculation(){
        if (session()->has('coupon')) {
            return response()->json(array(
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'sub_total' => round(Cart::total()),
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => round(Cart::total()),
            ));
        }
    }

    //  couponRemove
    public function couponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Removed Successfully']);
    }

    //  checkout view
    public function index(){
        $divisions  = Ship_Division::where('status', 1)->orderBy('division_name_en', 'ASC')->get();
        $carts = Cart::content();
        $cartQty= Cart::count();
        $cartTotal = round(Cart::total());
        return view('frontend.checkout-view', compact('divisions', 'carts', 'cartQty', 'cartTotal'));
    }

    //  checkout store
    public function checkoutStore(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;

        $data['carts'] = Cart::content();
        $data['cartQty'] = Cart::count();
        $data['cartTotal'] = round(Cart::total());

        if (session()->has('coupon')) {
            $total_amount = session()->get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }


        // $carts = Cart::content();
        // $cartQty = Cart::count();
        // $cartTotal = round(Cart::total());

        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data'));
        }
        elseif ($request->payment_method == 'sslEasy') {
            return view('frontend.payment.easy-payment', compact('data', 'total_amount'));
        } elseif($request->payment_method == 'sslHost') {
            return view('frontend.payment.hosted-payment', compact('data', 'total_amount'));
        }else {
            return 'Hand Cash';
        }

    }


}
