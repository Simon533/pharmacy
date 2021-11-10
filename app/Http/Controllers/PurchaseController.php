<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\add-purchased medicine ;
use App\Models\Supplier;
use Illuminate\Http\Request;

class add-purchased medicine Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "add-purchased medicine s";
        $add-purchased medicine s = add-purchased medicine ::with('category')->get();
        return view('add-add-purchased medicine d medicine',compact(
            'title','add-purchased medicine s'
        ));
    }

    /**
     * Display a create page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "add Purhase";
        $categories = Category::get();
        $suppliers = Supplier::get();
        return view('add-add-purchased medicine ',compact(
            'title','categories','suppliers'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:200',
            'category'=>'required',
            'price'=>'required|min:1',
            'quantity'=>'required|min:1',
            'expiry_date'=>'required',
            'supplier'=>'required',
            'image'=>'file|image|mimes:jpg,jpeg,png,gif',
        ]);
        $imageName = null;
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/add-purchased medicine s'), $imageName);
        }
        add-purchased medicine ::create([
            'name'=>$request->name,
            'category_id'=>$request->category,
            'supplier_id'=>$request->supplier,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'expiry_date'=>$request->expiry_date,
            'image'=>$imageName,
        ]);
        $notifications = array(
            'message'=>"add-purchased medicine   added",
            'alert-type'=>'success',
        );
        return redirect()->route('add-purchased medicine s')->with($notifications);
    }

    /**
     * Display the specified resource.
     *@param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $title = "Edit add-purchased medicine ";
        $add-purchased medicine  = add-purchased medicine ::find($id);
        $categories = Category::get();
        $suppliers = Supplier::get();
        return view('edit-add-purchased medicine ',compact(
            'title','add-purchased medicine ','categories','suppliers'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\add-purchased medicine  $add-purchased medicine 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, add-purchased medicine  $add-purchased medicine )
    {
        $this->validate($request,[
            'name'=>'required|max:200',
            'category'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'expiry_date'=>'required',
            'supplier'=>'required',
            'image'=>'file|image|mimes:jpg,jpeg,png,gif',
        ]);
        $imageName = null;
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/add-purchased medicine s'), $imageName);
        }
        
        $add-purchased medicine ->update([
            'name'=>$request->name,
            'category_id'=>$request->category,
            'supplier_id'=>$request->supplier,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'expiry_date'=>$request->expiry_date,
            'image'=>$imageName,
        ]);
        $notifications = array(
            'message'=>"add-purchased medicine updated",
            'alert-type'=>'success',
        );
        return redirect()->route('add-purchased medicine s')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $add-purchased medicine  = add-purchased medicine ::find($request->id);
        $add-purchased medicine ->delete();
        $notification =array(
            'message'=>"add-purchased medicine  has been deleted",
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
