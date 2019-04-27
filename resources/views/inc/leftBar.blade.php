<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav">
    <!-- Navbar Brand -->
    <div class="amado-navbar-brand">
        <a href="/"><img src="/img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
    </div>
</div>


<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="/"><img src="/img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li id="hr0"><a href="/">Home</a></li>
            <li id="hr1"><a href="/products">Shop</a></li>
            <li id="hr3"><a href="/cart">Cart</a></li>
            <li id="hr4"><a href="/checkOut">Checkout</a></li>
        </ul>
    </nav>
    <!-- Button Group -->
    <div class="amado-btn-group mt-30 mb-100">
        <a href="#" class="btn amado-btn mb-15">%Discount%</a>
        <a href="#" class="btn amado-btn active">New this week</a>
    </div>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <a href="cart" class="cart-nav"><img src="/img/core-img/cart.png" alt=""> Cart <span>({{count(\Cart::getContent())}})</span></a>
        <a href="#" class="search-nav"><img src="/img/core-img/search.png" alt=""> Search</a>
    </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
</header>
<!-- Header Area End -->

<script>
    if (window.location.href.indexOf("products") > -1){
        let e = document.getElementById('hr1');
        if(! e.classList.contains('active'))
            e.classList.add('active');
    }else if (window.location.href.indexOf("cart") > -1){
        let e = document.getElementById('hr3');
        if(! e.classList.contains('active'))
            e.classList.add('active');
    }else if (window.location.href.indexOf("checkOut") > -1){
        let e = document.getElementById('hr4');
        if(! e.classList.contains('active'))
            e.classList.add('active');
    }else if (window.location.href === 'http://127.0.0.1:8000/') {
        let e = document.getElementById('hr0');
        if(! e.classList.contains('active'))
            e.classList.add('active');
    }
</script>

