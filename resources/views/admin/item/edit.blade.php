@extends('layouts.admin.app')

@section('title','Item')

@push('css')
    
@endpush

@section('content')
  

   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Item</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Item</li>
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
                  <h3 class="card-title">Edit Item</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('item.update',$item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Item Code</label>
                    <input type="text" name="code" value="{{$item->code}}" class="form-control" id="code" placeholder="Enter Item Code">
                    </div>   
                    <div class="form-group">
                      <label for="name">Item Name</label>
                    <input type="text" name="name" value="{{$item->name}}" class="form-control" id="name" placeholder="Enter Name">
                    </div>                  

                    <div class="form-group">
                      <label for="name">Item Price (BDT)</label>&nbsp; <span class="text-danger" id="errmsg"></span>
                      <input type="text" name="price" value={{$item->price}} class="form-control" id="price" placeholder="Enter Price">
                    </div>                    
                    
                    <div class="form-group">
                      <label for="name">Time (Min)</label> &nbsp;<span class="text-danger" id="errmsg1"></span>
                      <input type="text" name="time" value={{$item->time}} class="form-control" id="time" placeholder="Enter Time">
                    </div>
                    <div class="form-group pad">
                      <label for="name">Description</label>
                      <textarea class="textarea" name="description" placeholder="Enter Description here"
                      style="width: 100%; height: 120px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; color:black; ">{{$item->description}}</textarea>
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
<script>
    // $(function () {
    //   // Summernote
    //   $('.textarea').summernote()
    // })
  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/caret/1.0.0/jquery.caret.min.js"></script>
<script>
    // $(function () {
    //   // Summernote
    //   $('.textarea').summernote()
    // })
   
    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#price").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if ((event.which != 46 || $(this).val().indexOf('.') != -1) && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   }); 
   
   //called when key is pressed in textbox
  $("#time").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if ((event.which != 46 || $(this).val().indexOf('.') != -1) && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg1").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
  </script>
@endpush