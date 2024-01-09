@extends('frontend.layout.app')
    @section('title', 'Cart')
        @section('content')
        @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif


  <table class="table">
  <caption>Cart items</caption>
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $total = 0; $total_qty = 0;
  ?>

    @foreach((array) session('cart') as $id => $items)
    <?php $total += $items['price'] * $items['qty']; $total_qty += $items['qty'] ?>
    @endforeach

  @if(session('cart'))
	@foreach(session('cart') as $id => $items)
    <tr>
      <td class="cart_name">{{$items['name']}}</td>
      <td><img src="/images/backend/categories/{{$items['image']}}" alt="{{$items['image']}}" width="90px" height="90px"/></td>
      <td>{{$items['price']}}</td>
      <td>
        <div class="qty-label">
            Qty
            <div class="input-number" style="width: 9rem;">
                <input class="qty" type="number" min="1" value="{{$items['qty']}}">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
        </div>
      </td>
      <td >{{$items['price'] * $items['qty']}}</td>
      <td>
        <button class="btn btn-info update-cart" data-id="{{ $id }}">Update</button>
        <button class="btn btn-danger remove-from-cart" data-id="{{ $id }}">Remove</button>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>

@endsection
