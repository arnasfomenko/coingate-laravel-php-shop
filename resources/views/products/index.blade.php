@extends ('layout')

@section ('content')

  <div class="col-12 col-md-9">
    <p class="float-right hidden-md-up">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
    </p>
    <div class="jumbotron">
      <h1>Welcome to Simple Shop</h1>
      <hr>
      <p>Coingate Shop with Bitcoin Checkout Integration</p>
    </div>
    <div class="row">
      @foreach ($products as $product)

        <div class="col-6 col-lg-4">
          <h2>{{ $product->title }}</h2>
          <img src="images/{{$product->image}}" class="productimage">
          <p>{{$product->description}}</p>
          <p><b>Price : {{$product->price}} $</b></p>
          <p><a class="btn btn-outline-primary" href="/cart/{{$product->id}}/add" role="button">Add to Cart &raquo;</a></p>
        </div><!--/span-->

      @endforeach
    </div><!--/row-->
  </div><!--/span-->

  @include('partials.sidebar')

@endsection
