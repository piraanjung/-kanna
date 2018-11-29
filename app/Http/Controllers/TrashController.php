<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trash;
use App\ItemCategories;
use App\Unit;
use App\Http\Requests\TrashRequest;
use Image;

class TrashController extends Controller
{
    public function index(){
        return view('trash.dashboard');
    }

    public function trash_lists(){
        $trashs = Trash::where('status', 1)->get();
        return view('trash.trash_lists', compact('trashs'));
    }

    public function create(){
        $categories = ItemCategories::where('status', 1)->get(['id', 'name']);
        $units = Unit::all();
        return view('trash.create', compact('categories', 'units') );
    }

    public function store(TrashRequest $request){
        $new_item = new Trash;
        if($request->hasFile('file')){
            //resize image
            $imgwidth = 300;
            //folder upload (public/imgpics)
            $folderupload = 'images';

            $file = $request->file('file');
            $filename = time() . '-trash-cat-'.$request->item_cate_id; // prepend the time (integer) to the original file name
            $path = public_path($folderupload.'/' . $filename);

            // create instance of Intervention Image
            $img = Image::make($file->getRealPath());

            if($img->width()>$imgwidth){
                // See the docs - http://image.intervention.io/api/resize
                // resize the image to a width of 300 and constrain aspect ratio (auto height)
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $img->save($path);
            //
            $new_item->image = $filename;
        }
        $new_item->name = $request->name;      
        $new_item->item_cate_id = $request->item_cate_id;       
        $new_item->price = $request->price; 
        $new_item->unit_id = $request->unit_id; 
        $new_item->favorite = 0;
        $new_item->status = 1;
        $new_item->created_at = date('Y-m-d H:i:s');
        $new_item->updated_at = date('Y-m-d H:i:s');
        $new_item->save();
        // dd($request);
        return redirect('trash/trash_lists')->with('message', 'ทำการบันทึกข้อมูลเรียบร้อย');
    }

    public function edit($id){
        $trash = Trash::findOrFail($id);
        $categories = ItemCategories::where('status', 1)->get(['name', 'id']);
        $units = Unit::all();
        // dd($trash);
        return view('trash.edit', compact('trash', 'categories', 'units'));
    }

    public function update(Request $request, $id){
        // dd($request);
        $trash = Trash::findOrFail($id);
        if($request->hasFile('file')){
            //resize image
            $imgwidth = 300;
            //folder upload (public/imgpics)
            $folderupload = 'images';
            $file = $request->file('file');
            if($trash->image != $file->getClientOriginalName()){
                $new_image = true;
                $type = explode('.',$file->getClientOriginalName());
                // มีการเปลี่ยนรูป ให้ทำการ
                //1.ลบรูปเดิม
                if($trash->image != ""){
                    unlink($folderupload."/".$trash->image);
                }
                //2.saveรูปใหม่
                $filename = time() . '_trash_cat_'.$request->item_cate_id.".".$type[1]; // prepend the time (integer) to the original file name
                $path = public_path($folderupload.'/' . $filename);

                // create instance of Intervention Image
                $img = Image::make($file->getRealPath());

                if($img->width()>$imgwidth){
                    // See the docs - http://image.intervention.io/api/resize
                    // resize the image to a width of 300 and constrain aspect ratio (auto height)
                    $img->resize($imgwidth, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $img->save($path);
                //
                $trash->image = $filename;
            }
        }
        $trash->name = $request->name;
        $trash->item_cate_id = $request->item_cate_id;
        $trash->price = $request->price;
        $trash->unit_id = $request->unit_id;
        $trash->updated_at = date('Y-m-d H:i:s');
        $trash->save();
        return redirect('trash/trash_lists')->with('message', 'ทำการบันทึกการแก้ไขข้อมูลขยะ เรียบร้อยแล้ว');
    }

    public function trashprice(){
        $all_items = Trash::where(['status' => 1])->get(['id', 'name', 'item_cate_id', 'price', 'unit_id', 'image']);
        $recycle = Trash::where(['item_cate_id' => 1, 'status' => 1])->get(['id', 'name', 'item_cate_id', 'price', 'unit_id', 'image']);
        $wet = Trash::where(['item_cate_id' => 2, 'status' => 1])->get(['id', 'name', 'item_cate_id', 'price', 'unit_id', 'image']);
        $hazard = Trash::where(['item_cate_id' => 3, 'status' => 1])->get(['id', 'name', 'item_cate_id', 'price', 'unit_id', 'image']);


        return view('trash.trashprice', compact('all_items', 'wet', 'recycle', 'hazard'));
    }

    public function update_trashprice(Request $request){
        foreach($request->id as $key => $req){
            $item = Trash::findOrFail($key);
            $item->price = $req;
            $item->updated_at = date('Y-m-d H:i:s');
            $item->save();
        }

        return redirect('trash/trashprice')->with('message', 'อัพเดทราคาขยะเรียบร้อยแล้ว');
    }

}
