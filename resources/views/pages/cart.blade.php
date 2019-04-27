@extends('layouts.app')

@section('main-content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>{{count(\Cart::getContent())}} Products In Your Cart</h2>
                    </div>

                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity ({{\Cart::getTotalQuantity()}})</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count(\Cart::getContent()) > 0)
                                @foreach(\Cart::getContent() as $product)
                                    @php
                                        $prod = \App\Product::find($product->id)
                                    @endphp
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="/storage/img-products/{{$prod->images[0]->ImageLink}}"
                                                             alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{$product->name}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>{{$product->price}} DH</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                            <span class="qty-minus"
                                                  onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                                        class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1"
                                                           max="300"
                                                           name="quantity" value="{{$product->quantity}}">
                                                    <span class="qty-plus"
                                                          onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                                class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        No Product
                                    </td>
                                </tr>
                            @endif


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Cart Total</h5>
                        <ul class="summary-table">
                            <li><span>subtotal:</span> <span>{{\Cart::getSubTotal()}} DH</span></li>
                            <li><span>delivery:</span> <span>Free</span></li>
                            <li><span>total:</span> <span>{{\Cart::getSubTotal()}} DH</span></li>
                        </ul>
                        <div class="cart-btn mt-100">
                            <a href="/checkOut" class="btn amado-btn w-100">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection