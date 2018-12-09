<div class="form-group">
    <label for="area_name" class="control-label">ชื่อจุดรับซื้อขยะ</label>
    <input type="text" name="point_name" value="{{isset($buy_trash_point) ? $buy_trash_point->point_name : ''}}" class="form-control">
</div>
<div class="form-group">
        <label for="buy_trash_area" class="control-label">พื้นที่</label>
        <select name="setting_buy_trash_area" id="setting_buy_trash_area" class="form-control select2">
            <option value="">เลือกพื้นที่...</option>
            @foreach ($buy_trash_area as $area)
                @if (isset($buy_trash_point))
                    @if ($buy_trash_point->id == $area->id)
                    <option value="{{$area->id}}" selected>{{$area->area_name}}</option> 
                    @endif
                @endif
                <option value="{{$area->id}}">{{$area->area_name}}</option> 
                
            @endforeach
        </select>
    </div>
    <div class="form-group">
            <label for="status" class="control-label">สถานะ</label>
            <select name="setting_status" id="setting_status" class="form-control select2">
                <option value="active">active</option>
                <option value="inactive">inactive</option>
            </select>
        </div>

    <div class="form-group">
        {{-- <input type="text" name="buy_trash_point_id" id="buy_trash_point_id" value="{{isset($buy_trash_point) ? $buy_trash_point->id : ''}}"> --}}
        <button type="submit" class="btn {{$formMode == 'create' ? 'btn-success' : 'btn-warning'}}">
                {{$formMode == 'create' ? 'บันทึก' : 'บันทึกการแก้ไข'}}
        </button>
    </div>

    

