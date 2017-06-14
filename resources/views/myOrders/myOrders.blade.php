@extends ('layout')

@section ('content')

<h2>Cart Information</h2>
<table class="table col-6 col-lg-4">
  <thead class="thead-inverse">
    <tr>
      <th>Order Id</th>
      <th>Price</th>
      <th>Status</th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
  </thead>
  <tbody>

  @foreach($myOrders as $myOrder)
    <tr>
    <td>{{$myOrder->id}}</td>
    <td>{{$myOrder->total_price}} $</td>
    <td>{{$myOrder->status}}</td>
    <td>{{$myOrder->created_at->diffForHumans()}}</td>
    <td>{{$myOrder->updated_at->diffForHumans()}}</td>
    </tr>

  @endforeach

</tbody>
</table>

@endsection
