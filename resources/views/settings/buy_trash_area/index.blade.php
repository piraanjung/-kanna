@extends('layouts.app')
@section('title')
จัดการตารางรับซื้อขยะ
@endsection

@section('sidebar')
@include('trash/trash_sidebar',['index' => 6])
@endsection
@section('content')

@if (session('message'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info alert-with-icon" data-notify="container">
            <i class="material-icons" data-notify="icon">notifications</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
            <span data-notify="message">{{session('message')}}</span>
        </div>

    </div>
</div>

@endif


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">table</i>
                    </div>
                    <h4 class="card-title">ตารางพื้นที่รับซื้อขยะ</h4>
                    <a href="{{ url('settings/buy-trash-area/create')}}" class="btn btn-primary">สร้าง
                        พื้นที่รับซื้อขยะ</a>

                </div>
                <div class="card-body">
                    <?php $i=1; ?>
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
                                <td>{{$i++}}</td>
                                <td>{{$area->area_name}}</td>
                                <td>{{$area->tambon->tambon_name}}</td>
                                <td>{{$area->district->amphur_name}}</td>
                                <td>{{$area->province->province_name}}</td>
                                <td>{{$area->status}}</td>
                                <td>
                                    <a href="{{url('settings/buy_trash_area/edit/'.$area->id)}}" class="btn btn-warning">แก้ไข</a>
                                    <a href="{{url('settings/buy_trash_area/delete/'.$area->id)}}" class="btn btn-danger">ลบ</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--c0rd-body -->
            </div>

        </div><!-- col-md-12 -->
    </div>
    <!--row -->

</div><!-- /.container-fluid -->

@endsection
