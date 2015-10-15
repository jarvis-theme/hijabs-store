<!-- <div id="tagline"><section><h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</h2></section></div> -->

<div id="popular">
    <section>
        <h2>Top <span>Produk</span></h2>
        <div class="more">
            <a href="{{url('produk')}}"><i class="fi-list-bullet"></i> Lihat</a>
        </div>
        <ul class="products">
            @foreach(home_product() as $home)
            <li class="product">
                <div class="post-image">
                    <a href="{{product_url($home)}}"><img width="300" height="365" src="{{url(product_image_url($home->gambar1, 'medium'))}}" alt="{{short_description($home->nama, 10)}}"></a>
                </div>
                @if(is_outstok($home))
                <span class="sold">Kosong</span>
                @elseif(is_terlaris($home))
                <span class="hot">Terlaris</span>
                @elseif(is_produkbaru($home))
                <span class="new">Terbaru</span>
                @endif
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

<div id="newproduct">
    <section>
        <h2>Produk <span>Terbaru</span></h2>
        <div class="more">
            <a href="{{url('produk')}}"><i class="fi-list-bullet"></i> Lihat</a>
        </div>
        <ul>
            @foreach(latest_product() as $latest)
            <li class="product">
                <div class="post-image">
                    <a href="{{product_url($latest)}}"><img width="300" height="365" src="{{url(product_image_url($latest->gambar1,'medium'))}}" alt="{{short_description($latest->nama, 10)}}"></a>
                </div>
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