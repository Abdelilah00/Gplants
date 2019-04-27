@extends('layouts.app')

@section('main-content')
    <!-- Product Catagories Area Start -->
    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">
            @foreach($categories as $categorie)
                <!-- Single Catagory -->
                    <div class="single-products-catagory clearfix">
                        <a href="/products/{{$categorie->CatégorieId}}/having">
                            <img src="/storage/img-categories/{{$categorie->image->ImageLink}}" alt="">
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <div class="line"></div>
                                <p>From {{$categorie->products()->min('Prix') ? $categorie->products()->min('Prix'):0}} DH</p>
                                <h4>{{$categorie->CategorieName}}</h4>
                            </div>
                        </a>
                    </div>
            @endforeach
        </div>
    </div>
    <!-- Product Catagories Area End -->
@endsection