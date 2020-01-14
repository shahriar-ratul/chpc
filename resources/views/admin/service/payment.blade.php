@extends('layouts.admin.app')

@section('title','Payment')

@push('css')
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

      <!-- Select2 -->
<link rel="stylesheet" href="{{asset('/admin')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('/admin')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

<style>

</style>

@section('content')
  

   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Service</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Service</li>
          </ol>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card  card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title">Service Payment</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('service.payment.store') }}" method="POST" id="service">
                  @csrf

                  <input type="hidden" name="id" id="id">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Bill No</label>
                          <select class="form-control select2bs4 bill" name="doc_id" style="width: 100%;">
                            <option selected="selected" disabled>Select</option>
                            @foreach ($services as $service)
                            <option value="{{$service->doc_id}}" data-price="{{$service->total}}" data-id="{{$service->id}}">{{$service->doc_id}}</option>
                            @endforeach
                          </select>

                        </div>
                        <!-- /.form-group -->
                      
                      </div>
                      <!-- /.col -->

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Card </label>
                            <select class="form-control select2bs4" name="card" style="width: 100%;">
                              <option selected="selected" disabled>Select Card</option>
                              @foreach ($cards as $card)
                              <option value="{{$card->id}}">{{$card->name}}</option>
                              @endforeach
                            </select>
  
                          </div>
                      
                      </div> 

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Total Payment</label>
                            <input type="text" class="form-control" name="payment" id="payment" value="" placeholder="Enter" readonly>
                        </div>
                    </div> 

                     
                    </div>
                    <!-- /.row --> 
                <div class="row">
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" class="form-control" name="remarks" value="" placeholder="Enter Remarks">
                        </div>
                    </div>  
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Reference</label>
                            <input type="text" class="form-control" name="reference" value="" placeholder="Enter Reference">
                        </div>
                    </div> 

                </div>
                    <!-- /.row -->



                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                      <div class="text-center">
                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                <a href="{{route('service.index')}}" class="btn btn-danger btn-block">cancel</a>
                                </div> 
                                <div class="col-md-4 mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
<!-- Select2 -->
    <script src="{{asset('/admin')}}/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
  });
  
  $('select.bill').change(function() {
   $('#payment').val($(this.options[this.selectedIndex]).attr('data-price'));
   $('#id').val($(this.options[this.selectedIndex]).attr('data-id'));
});  


  
</script>





   
@endpush