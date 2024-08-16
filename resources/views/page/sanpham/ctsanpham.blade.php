@extends('index.index')
@section('title')
	Chi tiết sản phẩm
@endsection
@section('style')
	<link rel="stylesheet" href="{{ url('css/list_product.css') }}">
	<link href="{{ url('css/chitietsanphams.css') }}" type="text/css" rel="stylesheet"/>
	<style>
	#ulmenu{
		position: absolute;
		display: none;
		z-index: 10;
		background: white;
		box-sizing: border-box;
		border-left: 2px solid lavender;
		border-bottom: 2px solid lavender;
		border-right: 2px solid lavender;
	}
	#mainmenu #menucontact div:hover #ulmenu{
		display: block;
	}
	#content{
		z-index: 9.5;
	}
	.products {
    width: 155px;
    background: #FFFFFF;
    padding: 0 5px;
    margin: 10px auto;
    position: relative;
	}
	.products .image .saleprice{
	background:url({{ url('public/image/saleprice.png') }}) no-repeat;
    font-weight: bold;
    text-align: center;
    color: #FFF;
    font-size: 13px;
    line-height: 23px;
    width: 46px;
    height: 37px;
    position: absolute;
    top: 0;
    right: 54px;
	</style>
@endsection
@section('header')
	@include('page.header')
	@include('page.mainmenu')
@endsection
@section('content')
	<div id="container">
        <div class="sortable" id="layoutGroup1">
            <div class="product_view_contener">
	<div class="showleft">
		<div class="image_contenner">
        <div class="mainimage">
		<img src="{{ asset('storage/uploads').'/'.$sach->anh }}" id="mainimage" width="250"/>
        
        </div>
    </div>
        <div class="product_info">
            <h1>{{ $sach->tensach }}</h1>
            <div class="groups">
                <div class="viewfields">
                     <span>Tác giả: <a href="" title="{{ $sach->tentacgia }}">{{ $sach->tentacgia }}</a></span> <span>Phát hành: <a href="" title=""></a></span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="groups">
               
                <div class="clear"></div>
            </div>        
            <div class="prices_contener">
               
                 <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="intro">
                <div class="block " id="content_ViewProducts"><div class="blockcontent"><p>
	<i class="fa fa-check"></i><span style="font-size:14px;">Bọc Plastic miễn ph&iacute;&nbsp;</span></p>
<p>
	
</div></div>
            </div>
            <div class="clear"></div>
            {{-- <div class="fb-like" data-href="http://nobita.vn/2896/yeu-anh-tu-cai-nhin-dau-tien-bo-2-tap-.html" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div> --}}
        </div>
        
    </div>
    <div class="clear" style="clear: both;"></div>
</div>
         
            <div class="block" id="module_ProductDetail">
	<h3>Giới thiệu sách</h3>
    	<div class="intro" id="contentid">
	    	<p>
	<span style="color:#ff0000;"><span style="font-size:16px;">
          {{ $sach->tensach }}
        </span></span></p>
        @php 
        echo($chitietsanpham[0]->noidung);
        @endphp
        

        </div>
        {{-- <div class="viewmore" id="viewmore"><span>Xem thêm nội dung <i class="fa fa-sort-desc"></i></span></div> --}}
</div>
            <div class="block" id="module_ProductFieds">
	<a name="fieldlist"></a>
    <h3>Thông tin chi tiết</h3>
    <table class="fields" cellpadding="0" cellspacing="0" width="100%">
        <tr class="field_view_contenner row0">
	<td class="title">
		<a href="" title="Tác giả">Tác giả</a>
	</td>
	<td class="values">
		<a href="" title="{{ $sach->tentacgia }}">{{ $sach->tentacgia }}</a>
	</td>
</tr>{{-- <tr class="field_view_contenner row1">
	<td class="title">
		<a href="" title="Phát hành">Phát hành</a>
	</td>
	<td class="values">
		<a href="" title="TiHabooks">TiHabooks</a>
	</td>
</tr> --}}<tr class="field_view_contenner row0">
</tr><tr class="field_view_contenner row1">
	<td class="title">
		Kích thước
	</td>
	<td class="values">
		{{ $chitietsanpham[0]->kichthuoc }}
	</td>
</tr><tr class="field_view_contenner row0">
	<td class="title">
		Trọng lượng
	</td>
	<td class="values">
		{{ $chitietsanpham[0]->trongluong }}g
	</td>
</tr><tr class="field_view_contenner row1">
	<td class="title">
		Lượt xem
	</td>
	<td class="values">
		51
	</td>
</tr><tr class="field_view_contenner row0">
	<td class="title">
		Ngày phát hành
	</td>
	<td class="values">
		{{ \Carbon\Carbon::parse($chitietsanpham[0]->ngayphathanh)->format('d/m/Y') }}
	</td>
</tr><tr class="field_view_contenner row1">

</tr>
    </table>

</div>
    <br style="clear: both;">
       
	</div>
</div>
    </div>
@endsection
@section('footer')
@include('page.footer')
@endsection