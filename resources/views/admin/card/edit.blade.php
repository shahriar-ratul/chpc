@extends('layouts.admin.app')

@section('title','Card')

@push('css')
    
@endpush

@section('content')
  

   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Card</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Card</li>
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
                <div class="card-header">
                  <h3 class="card-title">Edit Card</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('card.update',$card->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Card Name</label>
                    <input type="text" name="name" value="{{$card->name}}" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                      <div class="text-center">
                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                    <a class="btn btn-danger btn-block" href="{{ route('item.index') }}">Back</a>
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