<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Service;
use App\Card;
use App\Item;
use App\Customer;
use Brian2694\Toastr\Facades\Toastr;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.service.index',compact('services'));
        // return view('admin.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::latest()->get();
        $items = Item::latest()->get();
        return view('admin.service.create',compact('customers','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);die;
        $this->validate($request,[
            'customer_id' => 'required',
            'doc_no' => 'required',
            'date' => 'required',
            'from' => 'required',
            'item' => 'required',
            'qty' => 'required',
            'total_discount' => 'required',
            'total_without_tax' => 'required',
            'tax' => 'required',
            'total_with_tax' => 'required',
        ]);
        $service = new Service();
        $service->doc_id = $request->doc_no;
        $service->date = $request->date;
        $service->from = $request->from;
        $service->customer_id = $request->customer_id;
        $service->service = $request->service;
        $service->item_id = $request->item;
        $service->qty = $request->qty;
        $service->discount = $request->total_discount;
        $service->subtotal = $request->total_without_tax;
        $service->service_charge = $request->service_charge;
        $service->tax = $request->total_tax;
        $service->s_tax = $request->s_tax;
        $service->total = $request->total_with_tax;
        $service->save();
        Toastr::success('Service Successfully Saved.' ,'Success');
        return redirect()->route('service.index');
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
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));
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
        $service = Service::find($id);
        $service->doc_id = $request->doc_id;
        $service->from = $request->from;
        $service->customer_id = $request->customer_id;
        $service->service = $request->service;
        $service->item_id = $request->item_id;
        $service->qty = $request->qty;
        $service->discount = $request->discount;
        $service->subtotal = $request->subtotal;
        $service->service_charge = $request->service_charge;
        $service->tax = $request->tax;
        $service->s_tax = $request->s_tax;
        $service->total = $request->total;
        $service->save();
        Toastr::success('Service Successfully Updated.','Success');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        Toastr::success('Service Successfully Deleted. ','Success');
        return redirect()->back();
    } 
    
    public function customer_payment()
    {
        $services = Service::latest()->get();
        // $items = Item::latest()->get();
        $cards = Card::latest()->get();
        return view('admin.service.payment',compact('services','cards'));
    }


    public function customer_payment_index()
    {
        $services = Service::latest()->get();
        return view('admin.service.view_payment',compact('services'));
    }
    public function customer_payment_store(Request $request)
    {
       

        $service = Service::find($request->id);

        $service->payment_method = $request->card;
        $service->reference = $request->reference;
        $service->remark = $request->remarks;
        $service->save();
        Toastr::success('Payment Successfully Updated.' ,'Success');
        return redirect()->route('service.index');
    }

}
