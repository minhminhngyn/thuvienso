@section('mainmenu')
		<div id="mainmenu">
		 	<div id="menucontact" style="width:1140px;margin: auto;position: relative;">
			<div style="width: 220px;"><p style="height:32px;background: white;width: 220px;cursor:default;">&nbsp;<span><img src="{{ asset('image/tảixuống.png') }}" alt=""style="height: 20px;width: 20px;line-height: 32px;"></span>&nbsp;<b style="line-height: 32px;">DANH MỤC SẢN PHẨM</b></p>
			<div style="position: relative;float: left;z-index: 10;bottom: 16px;" id="div_dropmenu">
		<ul id="ulmenu">

			     @foreach($theloai as $loaisach)
			    	<li class="child"><a href="" class="first">
                      {{ $loaisach->tentheloai }}</a>
                     </li>
			     @endforeach
		</ul>
	</div>
			</div>
			<div style="float:right;height: 32px;position: absolute;right: 1px;top: 5px;">
				<span><img src="{{ asset('image/').'/'.'552489.png' }}" style="width: 25px;height: 20px;padding-right: 5px;"></span><b>Hotline:<span style="font-weight: bold;color:#00cc66;">0243.552.6714</span></b>
			</div>
			</div>
		</div>
@endsection()