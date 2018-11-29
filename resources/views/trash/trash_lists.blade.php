@extends('layouts.app')
@section('title')
    รายการขยะ
@endsection
@section('sidebar')
     @parent
     @include('trash.trash_sidebar',['index'=>2])
@endsection

@section('content')
@if(session()->get('session'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif

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
                    <h4 class="card-title">ตารางรายการขยะ</h4>
                    <a href="{{url('trash/create')}}" class="btn btn-primary btn-round" style="float:right">เพิ่มรายการขยะ</a>

                </div>
                <div class="card-body">
                        <?php $i=1; ?>
                    <table class="table dataTable" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อขยะ</th>
                                <th>หมวดหมู่</th>
                                <th>ราคา:หน่วย</th>
                                <th>หน่วยนับ</th>
                                <th>รูปภาพ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trashs as $trash)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$trash->name}}</td>
                                <td>{{$trash->item_categories->name}}</td>
                                <td>{{$trash->price}}</td>
                                <td>{{$trash->unit->un_name}}</td>
                                <td>
                                    <div class="photo">
                                        @if ($trash->image != "")
                                            <img src="{{ asset('images/'.$trash->image)}}" alt="...">
                                        @else
                                            <img src="{{asset('assets/img/placeholder.jpg')}}" alt="...">
                                        @endif
                                    </div>    
                                </td>
                                <td class="td-actions text-right">
                                    <a href="{{url('trash/pay_money',$trash->id)}}" rel="tooltip" class="btn btn-primary" data-original-title="" title="">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    <a href="{{url('trash/edit',$trash->id)}}" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="{{url('trash/delete',$trash->id)}}" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
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
