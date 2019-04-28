<!-- Product Catagories Area Start -->
<div class="shop_sidebar_area">

    <!-- ##### Single Widget ##### -->
    <div class="widget catagory mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Catagories</h6>

        <!--  Catagories  -->
        <div class="catagories-menu">
            <ul>
                @php
                    $categories = \App\Catégorie::all();
                @endphp
                <li class="active" id="all-products"><a href="/products">All</a></li>
                @foreach($categories as $cat)
                    <li class="categories" value="{{$cat->CatégorieId}}"><a
                                style="cursor: pointer">{{$cat->CategorieName}}</a></li>
                @endforeach

            </ul>
        </div>
    </div>


    <!-- ##### Single Widget ##### -->
    <div class="widget color mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Color</h6>

        <div class="widget-desc">
            <ul class="d-flex" multiple="3">
                @php
                    $colors = \App\Color::all();
                @endphp
                @foreach($colors as $color)
                    <li class="colors" value="{{$color->ColorId}}"><a style="background-color: {{$color->Color}}"></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- ##### Single Widget ##### -->
    <div class="widget price mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Price MAD</h6>

        <div class="widget-desc">
            <div class="slider-range">
                <div data-min="5" data-max="200" data-unit="DH " data-step='5'
                     class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                     data-value-min="5" data-value-max="200" data-label-result="">

                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                </div>
                <div class="range-price">5DH - 200DH</div>
                <input type="hidden" id="maxPrice" value="" class="prices">
                <input type="hidden" id="minPrice" value="" class="prices">

            </div>
        </div>

    </div>
</div>
<script>


    $(document).ready(function () {
        let categories = [0];
        let colors = [0];
        //get min and max price from data base
        let minPrice = 5;
        let maxPrice = 200;
        let sortedBy = 'Prix';

        $(".slider-range").mouseup(function(){
            minPrice = $('#minPrice').val();
            maxPrice = $('#maxPrice').val();
            getProducts();
        });
        $('.categories').on('click', function () {
            $(this).toggleClass('active', null);
            $('#all-products').removeClass('active');

            let newFilter = $(this).val();
            let found = $.inArray(newFilter, categories);
            if (found >= 0) {
                // Element was found, remove it.
                categories.splice(found, 1);
            } else {
                // Element was not found, add it.
                categories.push(newFilter);
            }

            getProducts();
        });
        $('.colors').on('click', function () {
            $(this).toggleClass('active', null);

            let newFilter = $(this).val();
            let found = $.inArray(newFilter, colors);
            if (found >= 0) {
                // Element was found, remove it.
                colors.splice(found, 1);
            } else {
                // Element was not found, add it.
                colors.push(newFilter);
            }
            getProducts();
        });
        $('#sortedBy').on('change', function () {
            sortedBy = $(this).val();
            getProducts();
        });

        function getProducts() {
            $('#result').html(null);
            $.ajax({
                type: 'GET',
                url: '{{URL::to('filters')}}',
                data: {
                    'categories': categories,
                    'colors': colors,
                    'minPrice': minPrice,
                    'maxPrice': maxPrice,
                    'sortedBy': sortedBy
                },
                success: function (data) {
                    $('#result').html(data);
                }
            });
        }

    });

</script>
<!-- Product Catagories Area End -->
