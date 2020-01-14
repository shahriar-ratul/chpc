<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Item;
use Brian2694\Toastr\Facades\Toastr;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Item::latest()->get();
        return view('admin.item.index',compact('items'));
        // return view('admin.item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.item.create');
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
            'code' => 'required',
            'name' => 'required',
            'price' => 'required',
            'time' => 'required',
            'description' => 'required'
        ]);
        $item = new Item();
        $item->code = $request->code;
        $item->name = $request->name;
        $item->slug = Str::slug($request->name);
        $item->price = $request->price;
        $item->time = $request->time;
        $item->remarks = $request->remarks;
        $item->description = $request->description;

        $item->save();
        Toastr::success('Item Successfully Saved.' ,'Success');
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('admin.item.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'code' => 'required',
            'name' => 'required',
            'price' => 'required',
            'time' => 'required',
            'description' => 'required'
        ]);
        $item = Item::find($id);
        $item->code = $request->code;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->time = $request->time;
        $item->description = $request->description;
        $item->slug =  Str::slug($request->name);
        $item->save();
        Toastr::success('item Successfully Updated.','Success');
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        Toastr::success('Item Successfully Deleted. ','Success');
        return redirect()->back();
    }
}
