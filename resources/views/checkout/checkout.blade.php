@extends('layout')

@section('content')

  <div class="col-12 col-md-9">
    <p class="float-right hidden-md-up">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
    </p>
    <div class="row">
        <div class="col-6 col-lg-4">
          <br><br><br>
          <h2>Checkout details: </h2>
          <form action="/cart/checkout" method="post">
              <p>Your name : {{ Auth::user()->name }}</p>
              <hr>
              <p>Your email : {{ Auth::user()->email }}</p>
              <hr>
              <p>Your total : {{$total}} $</p>
              <input type="hidden" name='total' value='<?php echo $total;?>'>

              {{ csrf_field() }}
              <button type="submit" class="btn btn-success">Proceed to CoinGate</button>
          </form>
        </div><!--/span-->
      </div>
    </div>

@endsection
