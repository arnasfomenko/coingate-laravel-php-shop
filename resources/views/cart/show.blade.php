@extends ('layout')

@section ('content')

<div class="col-12 col-md-9">
  <p class="float-right hidden-md-up">
    <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
  </p>
  <div class="row">
    @if(!Session::has('cart'))

      <div class="col-6 col-lg-4">
      <h2>Cart Information</h2>
      <p>The cart is empty</p>
      </div><!--/span-->

    @else

    <h2>Cart Information</h2>
      <table class="table col-6 col-lg-4">
        <thead class="thead-inverse">
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
          </tr>
        </thead>
        <tbody>

@include ('cart.items')

  </div><!--/span-->

      @endif

    </div><!--/row-->
</div><!--/span-->

@endsection
