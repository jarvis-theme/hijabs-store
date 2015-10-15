<footer class="footer" role="contentinfo">
    <div id="logo">
        <a href="#">
            {{ short_description(Theme::place('title'),30) }}
        </a>
    </div>
    <div class="footer-links">
        @foreach($tautan as $key=>$menu)
        <ul>
            @if($key == '1' || $key == '2')
            <li><h3>{{$menu->nama}}</h4>
                @foreach($quickLink as $link_menu)
                    @if($menu->id == $link_menu->tautanId)
                    <li><a href="{{menu_url($link_menu)}}">{{$link_menu->nama}}</a></li>
                    @endif
                @endforeach
            </li>
            @endif
        </ul>
        @endforeach
        
        <ul>
            <li><h3>Pembayaran</h3></li>
            @foreach(list_banks() as $value)
                <li><img src="{{bank_logo($value)}}" alt="payment" /></li>
            @endforeach
            @foreach(list_payments() as $pay)
                @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                <li><img src="{{url('img/bank/ipaymu.jpg')}}" alt="ipaymu" /></li>
                @endif
            @endforeach
            @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
            <li><img src="{{url('img/bank/doku.jpg')}}" alt="doku myshortcart" /></li>
            @endif
        </ul>
    </div>

    <hr>
    <p>&copy; {{ Theme::place('title') }} {{date('Y')}} All Right Reserved. Powered by <a href="http://jarvis-store.com" target="_blank">Jarvis Store</a></p>
</footer>
{{pluginPowerup()}}