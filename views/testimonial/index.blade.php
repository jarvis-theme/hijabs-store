<style type="text/css">@media screen and (min-width: 53.75em){.testi{width: 67% !important}.create-testi{width: 30% !important}.create-testi article{width: 100%}}.line{border-top: solid 1px #eee;margin-bottom: 15px}</style>
<div id="tagline" class="title tleft"><section><h2>Testimonial</h2></section></div>
    
<section class="blog">
    <article class="testi">
        @foreach (list_testimonial() as $items)  
        <section>
            <h2><a>{{$items->nama}}</a></h2>                   
            <div class="line"></div>
            <p>{{$items->isi}}</p>
        </section>
        @endforeach
        {{list_testimonial()->links()}}
    </article>
    <aside class="create-testi">
        <article>
            <div class="respond">
                <div class="title"><h2>Kirim Testimonial</h2></div>
                <form action="{{url('testimoni')}}" method="post" role="form">
                    <ul>
                        <li class="field">
                            <label for="nama">Nama</label>
                            <input class="email input" type="text" name="nama" required>
                        </li>
                        <li class="field">
                            <label for="testimonial">Testimonial</label>
                            <textarea name="testimonial" class="form-control" rows="3" required></textarea>
                        </li>
                    </ul>
                    <div class="block"><button type="submit" class="main">Kirim</button><button type="reset" class="normal">Reset</button>
                    </div>
                </form>
            </div>
        </article>
    </aside>
</section>