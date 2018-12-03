<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\StaffOperateSchedule;
use App\TrashStaffs;
use App\BuyTrashArea;
use App\Profiles;
use App\Http\Controllers\DateTimeController;


class StaffOperateScheduleController extends Controller
{
    protected $dateTime;
    public function __construct(DateTimeController $dateTime){
        $this->dateTime = $dateTime;
    }
    
    public function index(){
        $during_staff_schedule = StaffOperateSchedule::where('status','sending')
            ->orWhere('status','accepted')->orWhere('status','operating')
            ->get()->groupBy('operation_date');
            // dd($during_staff_schedule);

        $past_staff_schedule = StaffOperateSchedule::where('status', 'complete')->where('status','cancel')->get();
        return view('staff_operate_schedule.index', compact('during_staff_schedule', 'past_staff_schedule'));

    }

    public function create(){
        $staffs = TrashStaffs::where('status', 'active')->get();
        $during_staff = DB::table('trash_staffs')
            ->rightJoin('staff_operation_schedule', 'trash_staffs.id', '=', 'staff_operation_schedule.staff_id')
            ->select('trash_staffs.id','staff_operation_schedule.staff_id', 'staff_operation_schedule.operation_date')
            ->where('staff_operation_schedule.status', '==', 'cancel')
            ->where('staff_operation_schedule.status', '==', 'complete')
            ->where('staff_operation_schedule.operation_date','>=', date('Y-m-d'))
            ->get();
            dd($during_staff);
            $staff_count = TrashStaffs::where('status', 'active')->count();
        $areas = BuyTrashArea::where('status', 'active')->get(['area_name', 'id']);
        return view('staff_operate_schedule.create',compact('staffs' ,'areas', 'staff_count', 'during_staff' ));
    }

    public function store(Request $request){
        $date = $this->dateTime->_date_format($request->operate_date);
        $time = $this->dateTime->time_format($request->operate_time);
        foreach($request->staff_choosed as $staff){
            $operdate = DB::table('staff_operation_schedule')->insert([
                'staff_id' => $staff,
                'area_id'  => $request->buy_trash_area_id,
                'point_id' => $request->buy_trash_point,
                'operation_date' => $date,
                'operation_time' => $time.':00',
                'status' => 'sending',
                'comment' => isset($request->comment) ? $request->comment : '',
                'created_at' => date('Y-m-d H:i:s'),	
                'updated_at' => date('Y-m-d H:i:s')

            ]);
        }
           return redirect('staff_operate_schedule/index')->with('message', 'ทำการสร้างกำหนดการรับซื้อขยะเรียบร้อยแล้ว');
        
    }


    public function get_trash_operate_points(Request $request){
        $points = DB::table('buy_trash_point')->where([
            'area_id' => $request->area_id,
            'status' => 'active'
            ])->select('point_name', 'id')->get();
        $str = '';
        if(count($points) > 0){
            $str .= '<option>เลือก</option>';
            foreach($points as $point){
                $str .= '<option value="'.$point->id.'">'.$point->point_name.'</option>';
            }
        }
        return response()->json($str); 
    }
}
