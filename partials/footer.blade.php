<footer class="footer" role="contentinfo">
    <div id="logo">
        <a href="#">
            {{ short_description(Theme::place('title'),30) }}
        </a>
    </div>
    <div class="footer-links">
        @foreach(all_menu() as $key=>$menu)
            @if($key == '1' || $key == '2')
            <ul>
                <li>
                    <h3>{{$menu->nama}}</h3>
                    @foreach($menu->link as $link_menu)
                        @if($menu->id == $link_menu->tautanId)
                        <li><a href="{{menu_url($link_menu)}}">{{$link_menu->nama}}</a></li>
                        @endif
                    @endforeach
                </li>
            </ul>
            @endif
        @endforeach
        
        <ul>
            <li><h3>Pembayaran</h3></li>
            @foreach(list_banks() as $value)
                <li><img src="{{bank_logo($value)}}" alt="{{$value->bankdefault->nama}}" title="Payment" /></li>
            @endforeach
            @foreach(list_payments() as $pay)
                @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                <li><img src="{{url('img/bank/ipaymu.jpg')}}" alt="ipaymu" title="Payment" /></li>
                @endif
                @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                <li><img src="{{url('img/bitcoin.png')}}" alt="bitcoin" title="Payment" /></li>
                @endif
                @if($pay->nama == 'paypal' && $pay->aktif == 1)
                <li><img src="{{url('img/bank/paypal.png')}}" alt="paypal" title="Payment" /></li>
                @endif
            @endforeach
            @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
            <li><img src="{{url('img/bank/doku.jpg')}}" alt="doku myshortcart" title="Payment" /></li>
            @endif
        </ul>
        <ul>
            <li>{{ Theme::partial('subscribe') }}</li>
        </ul>
    </div>

    <hr>
    <p>&copy; {{ Theme::place('title') }} {{date('Y')}} All Right Reserved. Powered by <a href="http://jarvis-store.com" target="_blank">Jarvis Store</a></p>
</footer>
{{pluginPowerup()}}