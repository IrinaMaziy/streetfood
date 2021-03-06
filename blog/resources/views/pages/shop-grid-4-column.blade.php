@extends('layout')
@section('body-classes', 'full-width grid-view columns-4 archive woocommerce-page')
@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="pizzaro-sorting">
            <div class="food-type-filter">
                <div class="clear-food-type-filter chosen"><a href="#">Show All</a>
                </div>
                <div class="widget woocommerce widget_layered_nav">
                    <ul>
                        <li class="wc-layered-nav-term "><a href="#">Meat</a> <span class="food-type-icon"><i class="fa fa-cutlery"></i></span></li>
                        <li class="wc-layered-nav-term "><a href="#">Spicy</a> <span class="food-type-icon"><i class="fa fa-fire"></i></span></li>
                        <li class="wc-layered-nav-term "><a href="#">Veg</a> <span class="food-type-icon"><i class="po po-veggie-icon"></i></span></li>
                    </ul>
                </div>
                <div class="create-your-own"><a href="single-product-v3.html">Create your own</a></div>
            </div>
        </div>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" >
                <div class="columns-4">
                    <ul class="products">
                        @forelse($products->chunk(4) as $chunk)
                            @foreach($chunk as $product)
                                <li class="product @if($loop->first) first @endif  @if($loop->last) last @endif">
                                    <div class="product-outer">
                                        <div class="product-inner">
                                            <div class="product-image-wrapper">
                                                <a href="#" class="woocommerce-LoopProduct-link">
                                                    <img src="{{$product->image}}" class="img-responsive" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrapper">
                                                <a href="#" class="woocommerce-LoopProduct-link">
                                                    <h3>{{$product->name}}</h3>
                                                    <div itemprop="description">
                                                        <p style="max-height: none;">{{$product->description}}</p>
                                                    </div>
                                                    <div  class="yith_wapo_groups_container">
                                                        <div  class="ywapo_group_container ywapo_group_container_radio form-row form-row-wide " data-requested="1" data-type="radio" data-id="1" data-condition="">
                                                            <h3><span>Pick Size</span></h3>
                                                            @foreach($product->items as $item)
                                                                <a href="{{route('add-to-cart', $item->id)}}">
                                                                <div class="ywapo_input_container ywapo_input_container_radio">

                                                                    <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">{{$item->size}} {{$item->dimension}}</span></span>
                                                                    <span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$item->price}}</span></span>
                                                                </div></a>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="hover-area">
                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.product-outer -->
                                </li>
                                @endforeach
                            @empty
                                <p>No product</p>
                            @endforelse

                        <!-- /.products -->

                        <!-- /.products -->
                    </ul>
                </div>

                <nav class="woocommerce-pagination">
                    <ul class="page-numbers">
                        @if($products->currentPage() != 1)
                        <li><a class="next page-numbers" href="?page=1">First Page </a></li>
                        <li><a class="next page-numbers" href="{{$products->previousPageUrl()}}">Prev Page </a></li>
                        @endif
                        @if($products->count() > 0)
                        @for($count = 1; $count <= $products->lastPage(); $count++)
                            <li><a class="page-numbers" @if($count == $products->currentPage()) current @endif href="?page={{$count}}">{{$count}}</a></li>
                        @endfor
                        @endif

                        @if($products->currentPage() != $products->lastPage())
                        <li><a class="next page-numbers" href="{{$products->nextPageUrl()}}">Next Page </a></li>
                        <li><a class="next page-numbers" href="?page={{$products->lastPage()}}">Last Page </a></li>
                            @endif
                        {{--<li><span class="page-numbers current">1</span></li>--}}
                        {{--<li><a class="page-numbers" href="#">2</a></li>--}}
                        {{--<li><a class="page-numbers" href="#">3</a></li>--}}
                        {{--<li><a class="next page-numbers" href="#">Next Page &nbsp;&nbsp;&nbsp;→</a></li>--}}
                    </ul>
                </nav>
            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div>
    <!-- .col-full -->
</div>

@endsection