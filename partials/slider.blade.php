    <div id="slider">
        <section class="slider-wrap">
            <ul>
                @foreach(slideshow() as $slide)
                <li>
                    <div class="slider-image">
                        @if(!empty($slide->url))
                        <a href="{{filter_link_url($slide->url)}}" target="_blank">
                        @else
                        <a href="#">
                        @endif
                            <img src="{{slide_image_url($slide->gambar)}}" alt="{{$slide->title}}">
                        </a>
                        <!-- <div class="slider-content">
                            <div class="slider-desc">
                                <h2 class="title">Made in Indonesia</h2>
                                <p>A beautifully designed big store theme built for Jarvis Store</p>
                                <button>View Collections</button>
                            </div>
                        </div> -->
                    </div>
                </li>
                @endforeach
            </ul>
        </section>
    </div>