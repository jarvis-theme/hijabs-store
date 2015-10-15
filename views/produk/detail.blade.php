<div id="tagline" class="title tleft"><section><h2>{{short_description($produk->nama, 50)}}</h2></section></div>

<section>
    <section class="page">
        <aside>
            <ul class="accordion">
            @foreach(list_category() as $side_menu)
                @if($side_menu->parent == '0')
                <li>
                    @if($side_menu->anak->count() != 0)
                    <a href="{{category_url($side_menu)}}" class="js-accordion-trigger">{{$side_menu->nama}}</a>
                    <ul class="submenu">
                        @foreach($side_menu->anak as $submenu)
                        @if($submenu->parent == $side_menu->id)
                        <li>
                            @if($submenu->anak->count() != 0)
                            <a href="{{category_url($submenu)}}" class="js-accordion-trigger2">{{$submenu->nama}}</a>
                            <ul class="submenu2">
                                @foreach($submenu->anak as $submenu2)
                                @if($submenu2->parent == $submenu->id)
                                <li>
                                    <a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            @else
                            <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                            @endif
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    @else
                    <a href="{{category_url($side_menu)}}">{{$side_menu->nama}}</a>
                    @endif
                </li>
                @endif
            @endforeach
            </ul>
        </aside>
        <article>
            <div class="breadcrumb">
                <!-- <a href="{{url('home')}}">Home</a> -->
                {{breadcrumbProduk(null,';',';', true, $produk)}}
            </div>
            <div class="single-item middle">
                <article>
                    <ul>
                        <li class="product">
                            <div class="post-image">
                                <a href="#"><img width="300" height="365" src="{{product_image_url($produk->gambar1)}}"></a>
                            </div>
                        </li>
                    </ul>
                </article>
                <article>
                    <div class="title">
                      <h4>{{$produk->nama}}</h4>
                    </div>
                    <p class="price">
                        @if(!empty($produk->hargaCoret))
                        <del><span class="amount">{{price($produk->hargaCoret)}}</span></del>
                        @endif
                        <ins><span class="amount">{{price($produk->hargaJual)}}</span></ins>
                    </p>
                    <div class="desc">
                        <p>{{short_description($produk->deskripsi, 200)}}</p>
                    </div>
                    <form class="cart" method="post" enctype="multipart/form-data" action="#" id="addorder">
                        @if($opsiproduk->count() > 0)
                        <label class="col-sm-4 control-label">Opsi :</label>
                        <div class="picker">
                            <select class="form-control">
                                <option value="">-- Pilih Opsi --</option>
                                @foreach ($opsiproduk as $key => $opsi)
                                <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}}>{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <li class="append field">
                            <input class="narrow text input" type="number" min="1" value="1" name="qty">
                            <!-- <div class="medium primary btn icon-left icon-basket"><a href="#">Add to cart</a></div> -->
                            <button class="main" type="submit">Add to cart</button>
                        </li>
                    </form>
                </article>
            </div>
            <ul class="accordion-tabs-minimal">
                <li class="tab-header-and-content">
                    <a href="#" class="tab-link is-active">Deskripsi</a>
                    <div class="tab-content"><p>{{$produk->deskripsi}}</p></div>
                </li>
                <li class="tab-header-and-content">
                    <a href="#" class="tab-link">Spec</a>
                    <div class="tab-content">
                        <ul>
                            <li>Berat: {{$produk->berat}} gram</li>
                            <li>Stock: {{$produk->stok}}</li>
                            <li>Vendor: {{$produk->vendor}}</li>
                        </ul>
                    </div>
                </li>
                <li class="tab-header-and-content">
                    <a href="#" class="tab-link">Review</a>
                    <div class="tab-content">{{pluginTrustklik()}}</div>
                </li>
            </ul>
            @if(count(other_product($produk)) > 0)
            <div id="newproduct">
                <h2>Produk <span>Lainnya</span></h2>
                <hr>
                <ul>
                    @foreach(other_product($produk) as $other)
                    <li class="product">
                        <div class="post-image">
                            <a href="{{product_url($other)}}"><img width="300" height="365" src="{{product_image_url($other->gambar1, 'medium')}}" alt="{{short_description($other->nama,10)}}"></a> 
                        </div>
                        <div class="product-detail">
                            <h4 class="post-title"><a href="{{product_url($other)}}">{{$other->nama}}</a></h4>
                            <span class="price"><span class="amount">{{price($other->hargaJual)}}</span></span>         
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </article>
    </section>
</section>