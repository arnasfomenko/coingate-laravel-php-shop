<?php

use App\Cart;

if(!Session::has('cart')) {

}

$oldCart = Session::get('cart');
$cart = new Cart($oldCart);

$cartitems = $cart->items;
$totalPrice = $cart->totalPrice;

?>


<div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
  <div class="card" style="width: 20rem;">
    <div class="card-block">
      <h4 class="card-title">Cart information</h4>
      @if (!Session::has('cart'))

        <ul class="list-group">
          <li class="list-group-item justify-content-between">
            The cart is empty
          </li>
        </ul><br/>

      @else
      <ul class="list-group">
      @foreach($cartitems as $cartitem)
        <li class="list-group-item justify-content-between">
          {{$cartitem['item']['title']}}
          <span class="badge badge-default badge-pill">{{$cartitem['qty']}}</span>
        </li>
      @endforeach
      </ul><br/>
      @endif
      @if(Auth::check())
        @if(Session::has('cart'))
        <a href="/cart/checkout" class="btn btn-outline-primary">Checkout</a>
        <a href="/cart/destroy" class="btn btn-outline-primary">Empty cart</a>
        @endif
      @else
        <a href="/cart/destroy" class="btn btn-outline-primary">Empty cart</a>
        <br>
        <b>Please <a href="/login"><u>Login</u></a> to checkout</b>
      @endif
    </div>
  </div>
</div><!--/span-->
</div><!--/row-->
