@extends('layouts.admin.app')

@section('title','Customer')

@push('css')
    
@endpush

@section('content')
  

   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Customer</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-info">
              {{-- <div class="card  card-outline card-info"> --}}
                <div class="card-header">
                  <h3 class="card-title">Add New Customer</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('customer.update',$customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Customer Name*</label>
                      <input type="text" name="name" value="{{$customer->name}}" class="form-control" id="name" placeholder="Enter Name">
                    </div>                  

                    <div class="form-group">
                      <label for="name">Customer Email</label>&nbsp; <span class="text-danger" id="errmsg"></span>
                      <input type="text" name="email"  value="{{$customer->email}}"  class="form-control" id="email" placeholder="Enter Price">
                    </div>                    
                    
                    <div class="form-group">
                      <label for="name">Customer Phone</label> &nbsp;<span class="text-danger" id="errmsg1"></span>
                      <input type="text" name="phone"  value="{{$customer->phone}}"  class="form-control" id="phone" placeholder="Enter Time">
                    </div>                    
                    <div class="form-group">
                      <label for="name">Country</label> &nbsp;<span class="text-danger" id="errmsg1"></span>
                      <input type="text" name="country"  value="{{$customer->country}}"  class="form-control" id="country" placeholder="Enter Time">
                    </div>
                    <div class="form-group pad">
                      <label for="name">Address</label>
                      <textarea class="textarea" name="address"  id="address" placeholder="Enter Address here"
                      style="width: 100%; height: 120px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; color:black; "> {{$customer->address}} </textarea>
                    </div>
                    
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                      <div class="text-center">
                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                <a href="{{route('customer.index')}}" class="btn btn-danger btn-block">Back</a>
                                </div> 
                                
                                <div class="col-md-4 mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </div>
                        
                      </div>

                   
                  </div>
                </form>
              </div>
              <!-- /.card -->
  
            </div>
            <!--/.col (left) -->

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection

@push('js')
@endpush