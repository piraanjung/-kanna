<div class="card ">
    <div class="card-header card-header-rose card-header-icon">
        <div class="card-icon">
            <i class="material-icons">contacts</i>
        </div>
        <h4 class="card-title">สร้างตารางรับซื้อขยะ</h4>
    </div>
    <div class="card-body ">
        <form class="form-horizontal">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-3 col-form-label">วันที่</label>
                        <div class="col-md-9">
                            <div class="form-group has-default bmd-form-group">
                                <input type="text" class="form-control datepicker" name="operate_date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-3 col-form-label">เวลา</label>
                        <div class="col-md-9">
                            <div class="form-group has-default bmd-form-group">
                                <input type="text" class="form-control timepicker" name="operate_time">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-3 col-form-label">เขตรับซื้อ</label>
                        <div class="col-md-9">
                            <div class="form-group bmd-form-group">
                                <select class="select2 form-control" name="buy_trash_area_id" id="buy_trash_area_id">
                                    <option value="">เลือก...</option>
                                    {{-- <option>เลือก...</option> --}}
                                    @foreach ($areas as $area)
                                    <option value="{{$area->id}}">{{$area->area_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-3 col-form-label">จุดรับซื้อ</label>
                        <div class="col-md-9">
                            <div class="form-group bmd-form-group">
                                <select class="select2 form-control" name="buy_trash_point" id="buy_trash_point">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <H3>เลือก Staff</H3>
            <div class="row">
                    @foreach ($during_staff as $staff)
                    
                    <div class="col-md-4">
                        <div class="card card-profile">
                          <div class="card-avatar">
                            <a href="#pablo">
                              <img class="img" src="{{asset('assets/img/faces/marc.jpg')}}">
                            </a>
                          </div>
                          <div class="card-body">
                            <h6 class="card-category text-gray">{{$staff->id_card}}</h6>
                            <h4 class="card-title">{{$staff->name}} {{$staff->lastname}}</h4>
                                <div class="card-footer">
                                    <div class="price">
                                      <h4>{{$staff->phone}}</h4>
                                    </div>
                                    <div class="stats">
                                      <p class="card-category"><i class="material-icons">phone</i> เบอร์โทร</p>
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                      <div class="price">
                                        <h4>{{$staff->status}}</h4>
                                      </div>
                                      <div class="stats">
                                        <p class="card-category"><i class="material-icons">people</i> สถานะ</p>
                                      </div>
                                    </div>

                                    <div class="row">
                                            <label class="col-sm-2 col-form-label label-checkbox"></label>
                                            <div class="col-sm-10 checkbox-radios">
                                              <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" name="staff_choosed[]" type="checkbox" value="{{$staff->id}}"> เลือก
                                                  <span class="form-check-sign">
                                                    <span class="check"></span>
                                                  </span>
                                                </label>
                                              </div>
                                             
                                            </div>
                                          </div>
                    
                          </div>
                        </div>
                      </div>
                      
                       
                    @endforeach 
                  </div> 

                 
        </form>
    </div>
    <div class="card-footer ">
        <div class="row">
            <div class="col-md-9">
                    <input class="btn btn-fill btn-rose" type="submit" value="{{ $formMode === 'edit' ? 'อัพเดท' : 'บันทึก' }}">

            </div>
        </div>
    </div>
</div>


