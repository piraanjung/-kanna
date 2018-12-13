<div class="form-group">
    <label for="area_name" class="control-label">ชื่อพื้นที่รับซื้อขยะ</label>
    <input type="text" name="area_name" value="{{isset($buy_trash_area) ? $buy_trash_area->area_name : ''}}" class="form-control">
</div>
<div class="form-group">
        <label for="province_id" class="control-label">จังหวัด</label>
        <select name="setting_province_id" id="setting_province_id" class="form-control province select2">
            <option value="">เลือกจังหวัด...</option>
            @foreach ($provinces as $province)
                @if (isset($buy_trash_area))
                    @if ($buy_trash_area->province_code == $province->province_code)
                    <option value="{{$province->province_code}}" selected>{{$province->province_name}}</option> 
                    @endif
                @endif
                <option value="{{$province->province_code}}">{{$province->province_name}}</option> 
                
            @endforeach
        </select>
    </div>
    <div class="form-group">
            <label for="amphur_id" class="control-label">อำเภอ</label>
            <select name="setting_amphur_id" id="setting_amphur_id" class="form-control district select2">
                {{-- <option value="{{$buy_trash_area->district_code}}" selected>{{$buy_trash_area->district->amphur_name}}</option>  --}}
            </select>
        </div>
    <div class="form-group">
        <label for="tambon_id" class="control-label">ตำบล</label>
        <select name="tambon_id" id="setting_tambon" class="form-control tambon select2">
            {{-- <option value="{{$buy_trash_area->tambon_code}}" selected>{{$buy_trash_area->tambon->tambon_name}}</option>  --}}
        </select>
    </div>
    <div class="form-group">
        {{-- <input type="hidden" name="buy_trash_area_id" id="buy_trash_area_id" value="{{isset($buy_trash_area) ? $buy_trash_area->id : ''}}">
        <input type="hidden" name="province_code" id="province_code" value="{{isset($buy_trash_area) ? $buy_trash_area->province_code : 0}}">
        <input type="hidden" name="district_code" id="district_code" value="{{isset($buy_trash_area) ? $buy_trash_area->district_code : ''}}">
        <input type="hidden" name="tambon_code" id="tambon_code" value="{{isset($buy_trash_area) ? $buy_trash_area->tambon_code : ''}}"> --}}

        <button type="submit" class="btn {{$formMode == 'create' ? 'btn-success' : 'btn-warning'}}">
                {{$formMode == 'create' ? 'บันทึก' : 'บันทึกการแก้ไข'}}
        </button>
    </div>

    

