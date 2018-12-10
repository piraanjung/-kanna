@extends('layouts.app')
@section('title')
    ฝากเงิน
@endsection
@section('sidebar')
     @parent
     @include('trashbank.trashbank_sidebar',['index'=>2])
@endsection

@section('content')
@if(session()->get('session'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">ข้อมูลการฝากเงิน</h4>
                    <a href="{{url('deposit/create')}}" class="btn btn-primary btn-round" style="float:right">ฝากเงิน</a>

                </div>
                <div class="card-body">
                    <?php $i=1;?>
                    <table class="table dataTable" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ-สกุล</th>
                                <th>รหัสการฝาก</th>
                                <th>จำนวนเงิน</th>
                                <th>วันที่บันทึก</th>
                                <th>สถานะ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deposit_trans as $deposit)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$deposit->users->name}}  {{$deposit->users->last_name}}</td>
                                <td>{{$deposit->purchase_items->invoice}}</td>
                                <td>{{number_format($deposit->amount, 2)}}</td>
                                <td>{{$deposit->updated_at}}</td>
                                <td>{{$deposit->status}}</td>
                                <td class="td-actions text-right">
                                    <a href="{{url('deposit/pay_money',$deposit->id)}}" rel="tooltip" class="btn btn-primary" data-original-title="" title="">
                                        <i class="material-icons">money</i>
                                    </a>
                                    <a href="{{url('deposit/edit',$deposit->id)}}" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="{{url('deposit/delete',$deposit->id)}}" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                        <i class="material-icons">close</i>
                                    </a>
                                </td>
                        
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!--c0rd-body -->
            </div>
           
        </div><!-- col-md-12 -->
    </div><!--row -->

</div><!-- /.container-fluid -->

@endsection
