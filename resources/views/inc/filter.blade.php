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

                <label for="rangePrimary">Your Price :</label>
                <input type="text" id="rangePrimary" name="rangePrimary" value="" />
                <p id="priceRangeSelected"></P>

            </div>
        </div>
    </div>
</div>
<script>
    $("#rangePrimary").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: "£"
    });

    $(document).ready(function () {
        let categories = [0];
        let colors = [0];
        let minPrice;
        let maxPrice;
        let sortedBy;

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

            getMethodFilter();
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

            getMethodFilter();
        });
        $("#rangePrimary").on("change", function () {
            let $this = $(this),
                value = $this.prop("value").split(";");
            minPrice = value[0];
            maxPrice = value[1];
            $("#priceRangeSelected").text("Lower Price Range = £" + minPrice + " , Upper Price Range = £" + maxPrice);
        });

        function getMethodFilter() {
            let filters = [categories, colors];
            console.log('filters ====>' + filters);
            $('#result').html(null);

            $.ajax({
                type: 'GET',
                url: '{{URL::to('filters')}}',
                data: {'filters': filters},
                success: function (data) {
                    $('#result').html(data);
                }
            })
        }

    });

</script>
<!-- Product Catagories Area End -->
