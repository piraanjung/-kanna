@extends('layouts.app')
@section('title')
     จัดการตารางรับซื้อขยะ
@endsection

@section('sidebar')
 @include('trash/trash_sidebar',['index' => 6])
@endsection
@section('content')
    <div>
        <a href="{{ url('settings/buy-trash-area/create')}}" class="btn btn-primary">สร้าง พื้นที่รับซื้อขยะ</a>
    </div>
    <table class="table dataTable" id="buy-trash-area">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อพิ้นที่</th>
                <th>ตำบล</th>
                <th>อำเภอ</th>
                <th>จังหวัด</th>
                <th>สถานะ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buy_trash_area as $area )
                <tr>
                    <td>#</td>
                    <td>{{$area->area_name}}</td>
                    <td>{{$area->tambon_code}}</td>
                    <td>{{$area->district_code}}</td>
                    <td>{{$area->province_code}}</td>
                    <td>{{$area->status}}</td>
                    <td>
                        <a href="{{url('/settings-buy-trash-area/edit/'.$area->id)}}" class="btn btn-warning">แก้ไข</a>
                        <a href="{{url('/settings-buy-trash-area/delete/'.$area->id)}}" class="btn btn-danger">ลบ</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection