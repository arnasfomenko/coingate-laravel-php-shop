<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CoinGate\CoinGate;

use Session;
use App\Order;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function show() {

      if(!Session::has('cart')) {

      return view("cart.show");

      }

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);

      return view("cart.show", [

        'cartitems'    => $cart->items,
        'totalPrice'  => $cart->totalPrice

      ]);

  }

    public function add(Request $request, $id) {

      $product = Product::find($id);

      $oldCart = Session::has('cart') ? Session::get('cart') : null;

      $cart = new Cart($oldCart);

      $cart->add($product, $product->id);

      $request->session()->put('cart',$cart);

      //dd($request->session()->get('cart'));

      return redirect("/");

    }

    public function destroy() {

      Session::forget('cart');

      return redirect("/");

    }

    public function getCheckout() {

      if(!Session::has('cart')) {

      return view("checkout.checkout");

      }

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;

      return view ('checkout.checkout', ['total' => $total]);

    }

    public function CoinGate() {
      //your app_id
      $app_id = "315";
      //your app_key
      $api_key = "2kxwMRvcepQW9bnsjSgGqP";
      //your api_secret
      $api_secret = "EmHW0Dt8sdpOTq9jxN4aJBlFVfGeK6iC";
      //currency you want to pay
      $currency = "eur";
      //currency you want to receive
      $receive_currency = "eur";
      //randomly generated token to secure the form
      $token = hash('sha512', 'coingate'.rand());

      $coingate_invoice_id = 'coingate'.rand();

      //Order sumbition to the database

      $o = Order::create([

      'user_id'   => auth()->id(),
      'coingate_invoice_id' => $coingate_invoice_id,
      'token' => $token,
      'total_price' => request('total'),
      'status' => 'unpaid'

      ]);

      //Post parameters , which are send to CoinGate

    $post_params = array(
      'order_id'          =>  $o->id, // custom id
      'token'             =>  $token,
      'price'             =>  request('total'),
      'currency'          =>  $currency,
      'receive_currency'  =>  $receive_currency,
      'callback_url'      => 'http://195.181.247.62/cart/callback?token='.$token,
      'cancel_url'        => 'http://195.181.247.62/cart',
      'success_url'       => 'http://195.181.247.62/myorders',
     );

     //Package -> coingate-php

      $order = \CoinGate\Merchant\Order::create($post_params, array(),array(
      'environment' => 'sandbox',
      'app_id' => $app_id,
      'api_key' => $api_key,
      'api_secret' => $api_secret));

      Session::forget('cart');

      if ($order) {
          echo $order->status;
          return redirect($order->payment_url);
      } else {
          print_r($order);
      }


    }

    public function callback(Request $request) {

      $order = Order::find($request->input('order_id'));

      if ($request->input('token') == $order->token) {

          $status = NULL;

          if ($request->input('status') == 'paid') {

            if ($request->input('price') >= $order->total_price) {

              $status = 'paid';

            }

          }

          else {

            $status = $request->input('status');

          }

          if (!is_null($status)) {

            $order->update(['status' => $status]);

          }

        }

      }

      public function myOrders() {

        $user_id = auth()->id();

        $myOrders = Order::get()->where('user_id',$user_id);

        return view('myOrders.myOrders',compact('myOrders'));

      }

    }
