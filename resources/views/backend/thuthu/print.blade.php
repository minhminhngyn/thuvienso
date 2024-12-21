@extends('print.layout.paper')

@section('title')
In danh sách Thủ thư
@endsection

@section('paper-size')
A4
@endsection

@section('paper-class')
A4
@endsection

@section('content')
<section class="sheet padding-10mm">
    <article>
        <table border="0" width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="text-align: left;vertical-align: middle;">
                <span style="font-weight: bold;font-size: 1.2em;">Thư viện Học viện Ngân Hàng</span> </br>
                    <span style="font-size: 0.9em;"><b>Địa Chỉ</b>:  12 chùa Bộc, Đống Đa, Hà Nội</span> </br>
                    <span style="font-size: 0.9em;"><b>Hotline</b>:   (04)3.8528587- (04)3.8528700</span> </br>
                    <span style="font-size: 0.9em;"><b>Email</b>:     tttttv@hvnh.edu.vn</span> </br>
                    <span style="font-size: 0.9em;">-----------------------------</span> </br>
                </td>
                <td style="text-align: right;vertical-align: middle;">
                    <span style="font-weight: bold;font-size: 1em;">Cộng Hòa Xã Hội Chủ Nghĩa Việt Nam</span> </br>
                    <span style="font-size: 1em;padding-right: 30px;">Độc lập - Tự do - Hạnh phúc</span> </br></br>
                    <span style=" font-size: 1em;"></span> </br>
                    <span style=" padding-right: 70px;">-------------------</span> </br>
                </td>
            </tr>
        </table>

        <table border="0" width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="text-align: center;">
                    <span style="font-weight: bold;font-size: 1.2em;">DANH SÁCH THÔNG TIN THỦ THƯ</span>
                </td>
            </tr>
        </table>

        <table border="1" width="100%" style="border-collapse: collapse;">
            <tr>
                <th>Mã Thủ thư</th>
                <th>Tên Thủ thư</th>
                <th>Giới Tính</th>
                <th>Năm Sinh</th>
                <th>Địa Chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Quê Quán</th>
                <th>Khoa</th>
                <th>Ngành</th>
            </tr>
            @foreach($listThuthu as $thuthu)
            <tr>
                <td>{{$thuthu->mathuthu}}</td>
                <td>{{$thuthu->tenthuthu}}</td>
                <td>{{$thuthu->gioitinh}}</td>
                <td>{{$thuthu->namsinh}}</td>
                <td>{{$thuthu->diachi}}</td>
                <td>{{$thuthu->sdt}}</td>
                <td>{{$thuthu->email}}</td>
                <td>{{$thuthu->quequan}}</td>
                <td>{{$thuthu->khoa->tenkhoa}}</td>
                <td>{{$thuthu->nganh->tennganh}}</td>
            </tr>
            @endforeach
        </table>
    </article>
</section>
@endsection