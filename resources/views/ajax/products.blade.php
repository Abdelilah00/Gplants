@if($products instanceof Countable && count($products) > 0)
    @foreach($products as $product)
        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-md-12 col-xl-6">
            <div class="single-product-wrapper">
                <!-- Product Image -->
                <div class="product-img">

                    <img src="/storage/img-products/{{$product->images[0]->ImageLink}}" alt="">

                    <a href="/products/{{$product->ProductId}}"><!-- Hover Thumb -->
                        <img class="hover-img"
                             src="/storage/img-products/{{$product->images[1]->ImageLink}}" alt="">
                    </a>
                </div>

                <!-- Product Description -->
                <div class="product-description d-flex align-items-center justify-content-between">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price">{{$product->Prix}} DH</p>
                        <a href="product-details.blade.php">
                            <h6>{{$product->ProductName}}</h6>
                        </a>
                    </div>
                    <!-- Ratings & Cart -->
                    <div class="ratings-cart text-right">
                        <div class="ratings">
                            @for($i=0; $i <= $product->review->Stars; $i++)
                                @if($product->review->Stars - $i == 0)
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    @break;
                                @elseif($product->review->Stars - $i == 0.5)
                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                    @break;
                                @else
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @endif
                            @endfor
                        </div>
                        <div class="cart">
                            <a href="/" data-toggle="tooltip" data-placement="left"
                               title="Add to Cart"><img src="/img/core-img/cart.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    No Product
@endif
