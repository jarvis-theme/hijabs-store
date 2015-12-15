@if(count(best_seller()) > 0)
<div id="popular">
    <section>
        <h2>Top <span>Produk</span></h2>
        <div class="more">
            <a href="{{url('produk')}}"><i class="fi-list-bullet"></i> Lihat</a>
        </div>
        <ul class="products">
            @foreach(best_seller() as $home)
            <li class="product">
                <div class="post-image">
                    <a href="{{product_url($home)}}"><img width="300" height="365" src="{{url(product_image_url($home->gambar1, 'medium'))}}" alt="{{$home->nama}}"></a>
                </div>
                <div class="product-detail">
                    <h4 class="post-title"><a href="{{product_url($home)}}">{{short_description($home->nama, 21)}}</a></h4>
                    <span class="price">
                        @if($home->hargaCoret != "")
                        <del><span class="amount">{{price($home->hargaCoret)}}</span></del>
                        @endif
                        <ins><span class="amount">{{price($home->hargaJual)}}</span></ins>
                    </span>
                    <a href="{{product_url($home)}}" class="add_to_cart"><i class="fi-shopping-cart"></i></a>
                </div>
            </li>
            @endforeach
        </ul>
    </section>
</div>
@endif
<div id="newproduct">
    <section>
        <h2>Koleksi <span>Produk</span></h2>
        <div class="more">
            <a href="{{url('produk')}}"><i class="fi-list-bullet"></i> Lihat</a>
        </div>
        <ul>
            @foreach(home_product() as $latest)
            <li class="product">
                <div class="post-image">
                    <a href="{{product_url($latest)}}"><img width="300" height="365" src="{{url(product_image_url($latest->gambar1,'medium'))}}" alt="{{$latest->nama}}"></a>
                </div>
                @if(is_outstok($latest))
                <span class="sold">Kosong</span>
                @elseif(is_terlaris($latest))
                <span class="hot">Terlaris</span>
                @elseif(is_produkbaru($latest))
                <span class="new">Terbaru</span>
                @endif
                <div class="product-detail">
                    <h4 class="post-title"><a href="{{product_url($latest)}}">{{short_description($latest->nama, 21)}}</a></h4>
                    <span class="price"><span class="amount">{{price($latest->hargaJual)}}</span></span>
                    <a href="{{product_url($latest)}}" class="add_to_cart"><i class="fi-shopping-cart"></i></a>          
                </div>
            </li>
            @endforeach
        </ul>
    </section>
</div>
<div class="banner">
    <section>
        @foreach(horizontal_banner() as $banners)
        <a href="{{URL::to($banners->url)}}">
            {{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('class'=>'img-responsive'))}}
        </a>
        @endforeach
    </section>
</div>