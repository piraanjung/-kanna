{{-- {{dd($profile->name)}} --}}
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-icon card-header-rose">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">ฟอร์มสร้างข้อมูล Staff
                    -
                    <small class="category">Complete your profile</small>
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">ชื่อ</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">นามสกุล</label>
                            <input type="text" name="lastname" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">เลขบัตรประชาชน</label>
                            <input type="text" name="id_card" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">เบอร์โทรศัพท์</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                            <div class="row">
                                <div class="col-md-2"><label class="label-control">เพศ</label></div>
                                <div class="col-md-8">
                                    <select class="select2 form-control" name="gender">
                                        <option> เลือก</option>
                                        <option value="m">ชาย</option>
                                        <option value="w">หญิง</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
                            <label for="province" class="label-control">จังหวัด</label>
                            <select class="select2 form-control province" name="province" id="province">
                                <option>เลือก...</option>
                                {{-- <option>เลือก...</option> --}}
                                @foreach ($provinces as $province)
                                <option value="{{$province->province_code}}">{{$province->province_name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('province', '<p class="help-block">:message</p>') !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label-control">อำเภอ</label>
                            <select name="distric" class="select2 form-control district"></select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label-control">ตำบล</label>
                            <select name="tambon" class="select2 form-control tambon"></select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">ที่อยู่</label>
                            <input type="text" class="form-control" name="address" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123/123 บ้านรักสะอาด">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="card-avatar empty_img" id="empty_img">
                    <img src="../../assets/img/placeholder.jpg" alt="...">
                </div>

                <div class="card-avatar fileinput-preview fileinput-exists">
                </div>

                {{-- <div class="fileinput-preview fileinput-exists"></div> --}}
                <div>
                    <span class="btn btn-round btn-rose btn-file">
                        <span class="fileinput-new">Add Photo</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="file" id="file">
                    </span>
                    <br>
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
                            class="fa fa-times"></i> Remove</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="label-floating">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="label-floating">Password</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>