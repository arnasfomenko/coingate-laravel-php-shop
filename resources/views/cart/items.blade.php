@foreach($cartitems as $cartitem)
          <tr>
            <td>{{$cartitem['item']['title']}}</td>
            <td>{{$cartitem['item']['description']}}</td>
            <td>{{$cartitem['item']['price']}}$</td>
            <td>{{$cartitem['qty']}}</td>
          </tr>
    @endforeach

</tbody>
</table>
  <a href="/cart/destroy/" class="btn btn-outline-primary"> Empty cart </a> &nbsp;
@if(Auth::check())
  <a href="/cart/checkout/" class="btn btn-outline-primary"> Checkout </a>
@else
  <i>Please <a href="/login"><u>Login</u></a> to checkout</i>
@endif
  <p class="ml-auto"><b>Total price :  {{$totalPrice}} $</b></p>
