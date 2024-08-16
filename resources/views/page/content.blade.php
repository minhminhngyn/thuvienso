@section('content')
<div id="content">
    <h2 class="title_pd"><a href="" class="title">Sách mới</a><span class="css"></span><a href="" class="more"></a></h2>
    <div class="list_pd">
        @php
        $dem=1;
        $sbc=1;
        $sgg=1;
        @endphp
        @foreach($sach as $sachmoi)
        @if(($sachmoi->theloai_id==2)&&($dem<=5)) @php $dem=$dem+1; @endphp <div class="product">
            <div class="image">
                <div style="position: relative;">
                    <a href="{{ route('chitietsanpham',$sachmoi->id) }}"><img
                            src="{{ asset('storage/uploads').'/'.$sachmoi->anh}}" alt="" class=""></a>
                </div>
                <a href="{{ route('chitietsanpham',$sachmoi->id) }}">
                    <div class="product_name" title="{{ $sachmoi->tensach }}">{{ $sachmoi->tensach }}</div>
                </a>
                <div class="product_composer"> Tác Giả: <span style="color:red">{{ $sachmoi->tentacgia }}<span>
                </div>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="comment">(30 nhận xét)</span>
                </div>
            </div>
    </div>
    @endif
    @endforeach()
</div>

<h2 class="title_pd"><a href="" class="title">Sách nổi bật </a><span class="css"></span><a href="" class="more"></a></h2>
<div class="list_pd">
    @foreach($sach as $sachnoibat)
    @if(($sachnoibat->theloai_id==1)&&($sbc<=5)) @php $sbc=$sbc+1; @endphp <div class="product">
        <div class="image">
            <div style="position: relative;">
            <a href="{{ route('chitietsanpham',$sachnoibat->id) }}"><img
                        src="{{ asset('storage/uploads').'/'.$sachnoibat->anh}}" alt="" class=""></a>
              
            </div>
            <a href="{{ route('chitietsanpham',$sachnoibat->id) }}">
                <div class="product_name" title="{{ $sachnoibat->tensach }}">{{ $sachnoibat->tensach }}</div>
            </a>
            <div class="product_composer"><a href="">Tác Giả: <span
                        style="color:red">{{ $sachnoibat->tentacgia }}</a></div>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="comment">(30 nhận xét)</span>
            </div>
        </div>
</div>
@endif
@endforeach
</div>

<h2 class="title_pd"><a href="" class="title">Sách khuyên đọc </a><span class="css"></span><a href="" class="more"></a></h2>
<div class="list_pd">
    @foreach($sach as $khuyendoc)
    @if(($khuyendoc->theloai_id==2)&&($sbc<=5)) @php $sbc=$sbc+1; @endphp <div class="product">
        <div class="image">
            <div style="position: relative;">
                <a href="{{ route('chitietsanpham',$khuyendoc->id) }}"><img
                        src="{{ asset('storage/uploads').'/'.$khuyendoc->anh}}" alt="" class=""></a>
            </div>
            <a href="{{ route('chitietsanpham',$khuyendoc->id) }}">
                <div class="product_name" title="{{ $khuyendoc->tensach }}">{{ $khuyendoc->tensach }}</div>
            </a>
            <div class="product_composer"><a href="">Tác Giả: <span
                        style="color:red">{{ $khuyendoc->tentacgia }}</a></div>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="comment">(30 nhận xét)</span>
            </div>
        </div>
</div>
@endif
@endforeach
</div>

<h2 class="title_pd"><a href="" class="title">Thể loại</a><span class="css"></span><a href="" class="more"></a></h2>
<div class="list_pd">

	@foreach($sach as $sach1)
	<div class="product">
        <div class="image"><img
                    src="{{ asset('storage/uploads').'/'.$sach1->anh }}" alt="" class=""></a>
        </div>
        <div class="category"></a>
        </div>
    </div>
	@endforeach
</div>
</div>
@endsection