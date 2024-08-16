@extends('page.danhmucsanpham.danhmucsach_mater')
@section('tendanhmuc')
{{ $danhmuc_id->tendanhmuc }}
@endsection
@section('danhmuc_tieude')
	@if(count($sach_danhmuc_id)>0)
	{{ $danhmuc_id->tendanhmuc }}
	@else
	{{ $error }}
	@endif
@endsection

@section('sanpham')
@if(count( $sach_danhmuc_id)>0)
@foreach($sach_danhmuc_id as $sach_danhmuc_ids)
	<div class="product">
		<div class="image">
			<div style="position: relative;">
			<a href="{{ route('chitietsanpham',$sach_danhmuc_ids->id) }}"><img src="{{ asset('storage/uploads').'/'.$sach_danhmuc_ids->anh}}" alt="" class=""></a>
			@if($sach_danhmuc_ids->khuyenmai>0)
			<span class="saleprice" style="background:url({{ url('image/saleprice.png') }}) no-repeat;">{{ $sach_danhmuc_ids->khuyenmai }}%</span>
			@endif
			</div>
			<a href="{{ route('chitietsanpham',$sach_danhmuc_ids->id) }}"><div class="product_name" title="{{ $sach_danhmuc_ids->tensach }}">{{ $sach_danhmuc_ids->tensach }}</div></a>
			<div class="product_composer">{{ $sach_danhmuc_ids->tentacgia }}</div>
			<div class="prices">{{ number_format($sach_danhmuc_ids->dongia-$sach_danhmuc_ids->dongia*$sach_danhmuc_ids->khuyenmai/100,0,",",".")}}₫</div>
			<div class="rootprices">{{ number_format($sach_danhmuc_ids->dongia,0,",",".") }}₫</div>
			<div class="rating">
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="comment">(30 nhận xét)</span></div>
		</div>
	</div>
	@endforeach
	@else
	@endif
@endsection
@section('nhaxuatban')
@if(count($sach_danhmuc_id)<1)
@else

@endif
@endsection

