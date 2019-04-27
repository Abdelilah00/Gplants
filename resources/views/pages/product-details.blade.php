@extends('layouts.app')

@section('main-content')
    <!-- Product Details Area Start -->
    <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">
            <div class="row">
                @if(!empty($product))
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(/storage/img-products/{{$product->images[0]->ImageLink}});">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(/storage/img-products/{{$product->images[1]->ImageLink}});">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(/storage/img-products/{{$product->images[2]->ImageLink}});">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(/storage/img-products/{{$product->images[3]->ImageLink}});">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">

                                            <img class="d-block w-100" src="/storage/img-products/{{$product->images[0]->ImageLink}}" alt="First slide">

                                    </div>
                                    <div class="carousel-item">

                                            <img class="d-block w-100" src="/storage/img-products/{{$product->images[1]->ImageLink}}" alt="Second slide">

                                    </div>
                                    <div class="carousel-item">
                                            <img class="d-block w-100" src="/storage/img-products/{{$product->images[2]->ImageLink}}" alt="Third slide">

                                    </div>
                                    <div class="carousel-item">

                                            <img class="d-block w-100" src="/storage/img-products/{{$product->images[3]->ImageLink}}" alt="Fourth slide">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">{{$product->Prix}} DH</p>
                                <a href="product-details.blade.php">
                                    <h6>{{$product->ProductName}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        @for($i=0; $i <= $product->review->Stars; $i++)
                                            @if($product->review->Stars - $i == 0)
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                @break;
                                            @elseif($product->review->Stars - $i == 0.5)
                                                <i class="fa fa-star-half" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="review">
                                        <a href="#">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock ({{$product->Qte}})</p>
                            </div>

                            <div class="short_overview my-5">
                                <p>{{$product->Description}}</p>
                            </div>

                            <!-- Add to Cart Form -->
                            {!! Form::open(['action' => 'CartController@store',  'class' => 'cart clearfix']) !!}
                            <div class="cart-btn d-flex mb-50">
                                <p>Qty</p>
                                <div class="quantity">
                                        <span class="qty-minus"
                                              onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                                    class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    {{Form::number('qty', '1', ['class' => 'qty-text', 'id' => 'qty', 'min' => "1", 'max' => "300"])}}
                                    <span class="qty-plus"
                                          onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                class="fa fa-caret-up" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            {{Form::hidden('productId', $product->ProductId)}}
                            {{Form::hidden('productName', $product->ProductName)}}
                            {{Form::hidden('prix', $product->Prix)}}
                            {{Form::submit('Add To Cart',['class' => 'btn amado-btn'])}}
                            {!! Form::close() !!}

                        </div>
                    </div>
                @else
                    No Product
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-50">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                            <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">white modern chair</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
@endsection