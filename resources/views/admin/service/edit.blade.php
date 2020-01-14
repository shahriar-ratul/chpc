@extends('layouts.admin.app')

@section('title','Service')

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
                  <h3 class="card-title">Add New Service</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('service.store') }}" method="POST" id="service">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Customer</label>
                          <select class="form-control select2bs4" name="customer_id" style="width: 100%;">
                            <option selected="selected" disabled>Select Customer</option>
                            @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">Name -{{$customer->name}} Phone-{{$customer->phone}} Email-{{$customer->email}}</option>
                            @endforeach
                          </select>

                        </div>
                        <!-- /.form-group -->
                      
                      </div>
                      <!-- /.col -->

                    </div>
                    <div class="row">

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Doc No</label>
                          <input type="text" class="form-control" name="doc_no" placeholder="Enter Id">
                        </div>
                      </div> 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Date</label>
                          <input type="text" class="form-control" name="date" placeholder="Date"  id="datepicker" width="276" autocomplete="off">
                        </div>
                      
                      </div> 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>From</label>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="inhouse" name="from" checked>
                            <label for="inhouse" class="custom-control-label" >In House</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="walkin" name="from" >
                            <label for="walkin" class="custom-control-label">Walk In</label>
                          </div>

                        </div>
                      
                      </div>
                     
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <div class="col-md-12">
                        
                        <div class="card card-outline card-info">
                          <div class="card-header">
                            <h3 class="card-title">Service Details</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <table class="table table-striped">
                              <thead>
                                
                                <tr>
                                  <th style="width:30%">Item Code</th>
                                  <th style="width: 10%">Qty</th>
                                  <th style="width: 15%">Rate(BDT)</th>
                                  <th style="width: 15%">Discount(%)</th>
                                  {{-- <th style="width: 12%">Service Charge(%)</th> --}}
                                  <th style="width: 15%">Tax(%)</th>
                                  <th style="width: 15%">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <select class="form-control select2bs4" id="item"  name="item" style="width: 100%;">
                                      <option selected="selected" disabled>Select Item</option>
                                      @foreach ($items as $item)
                                      <option value="{{$item->id}}" data-price="{{$item->price}}">{{$item->code}}--{{$item->name}}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                
                                  <td>
                                    <div class="form-group">
                                      <input type="number" name="qty" id="qty" class="form-control" value="1">
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group">
                                      <input type="text" id="rate"  value="0" name="rate" class="form-control rate"  readonly>
                                    </div>
                                  </td>
                                  <td>                     
                                  <div class="form-group">
                                    <input type="text" name="discount" id="discount" class="form-control" value="0">&nbsp; <span class="text-danger" id="errmsg"></span>
                                  </div>
                                </td>
                                {{-- <td>
                                  <div class="form-group">
                                    <input type="text" name="service_charge" id="service_charge" class="form-control" value="0">&nbsp; <span class="text-danger" id="errmsg"></span>
                                  </div>
                                </td> --}}
                                  <td>

                                    <div class="form-group">
                                      <input type="text" name="tax" id="tax" class="form-control" value="15">&nbsp; <span class="text-danger" id="errmsg"></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group">
                                      <input type="text" class="form-control" value="0" name="total" id="total" readonly>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>


                            <div class="row justify-content-end">


                              <div class="col-md-2">
                                <div class="form-group">
                                  <label>Discount Price</label>
                                  <input type="text" class="form-control" value="0" name="total_discount" id="total_discount" readonly>
                                </div>
                              </div> 
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label>Total Without Tax</label>
                                  <input type="text" class="form-control" value="0" name="total_without_tax" id="total_without_tax" readonly>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group mx-auto">
                                  <label class="">Total Tax</label>
                                  <input type="text" class="form-control" value="0" name="total_tax" id="total_tax" readonly>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label>Total with Tax</label>
                                  <input type="text" class="form-control" value="0" name="total_with_tax" id="total_with_tax"  readonly>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div> 
                   </div>
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

  
</script>


<script>
  // $("#datepicker").datepicker({ dateFormat: "yy-mm-dd"}).datepicker("setDate", new Date());
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>


<script>
  $('select.select2bs4').change(function() {
   $('input.rate').val($(this.options[this.selectedIndex]).attr('data-price'));
});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/caret/1.0.0/jquery.caret.min.js"></script>
<script>
    // $(function () {
    //   // Summernote
    //   $('.textarea').summernote()
    // })
   
    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#tax").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if ((event.which != 46 || $(this).val().indexOf('.') != -1) && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   }); 
   
   //called when key is pressed in textbox
  $("#discount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if ((event.which != 46 || $(this).val().indexOf('.') != -1) && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg1").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
      //called when key is pressed in textbox
  $("#service_charge").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if ((event.which != 46 || $(this).val().indexOf('.') != -1) && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg1").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
  </script>


<script>

function discount() {

  var rate = $('#rate').val();
  var discount = $('#discount').val();
  // console.log(rate);


  discount = discount/100;
  // console.log(discount);
  productdiscount = rate * discount;
  // console.log(productdiscount);
  productPrice = rate - productdiscount;

  return productPrice;
}


function subTotal() {
  var discount = $('#discount').val();
  var tax = $('#tax').val();

  var productTax =0;
  var productPrice =0;
  var productdiscount =0;
  var price_without_tax =0;
  // console.log(tax);
   if(discount == 0  && tax == 0){
      var rate = $('#rate').val();
      var quantity =$('#qty').val();
      // console.log(rate);
      // console.log(quantity);
      productPrice = rate * quantity;
      // console.log(productPrice)

      $('#total').val(productPrice);
      $('#total_tax').val(productTax);
      $('#total_discount').val(productdiscount);
      $('#total_without_tax').val(productPrice);
      $('#total_with_tax').val(productPrice);
      // return productPrice;
  }
  else if(tax != 0 && discount == 0){
    var rate = $('#rate').val();
    var quantity =$('#qty').val();



     // console.log(rate);
      // console.log(quantity);
    productPrice = rate * quantity;

    price_without_tax = productPrice;
    tax =tax/100;
    productTax = productPrice * tax ;
    productPrice =productPrice + productTax;
    // console.log(productTax);
    // $('#total').val(productPrice);
    // $('#total_tax').val(productTax);

      $('#total').val(productPrice);
      $('#total_tax').val(productTax);
      $('#total_discount').val(productdiscount);
      $('#total_without_tax').val(price_without_tax);
      $('#total_with_tax').val(productPrice);
    


    }
  else if(tax == 0 && discount != 0){

      discount =discount/100;
      var rate = $('#rate').val();
      var quantity =$('#qty').val();
      // console.log(rate);
      // console.log(quantity);
      productPrice = rate * quantity;
      productdiscount = rate * quantity *discount;
      productPrice = productPrice - productdiscount;
      // console.log(productPrice)


           
      $('#total').val(productPrice);
      $('#total_tax').val(productTax);
      $('#total_discount').val(productdiscount);
      $('#total_without_tax').val(price_without_tax);
      $('#total_with_tax').val(productPrice);
      
      // return productPrice;
  }else{
    var rate = $('#rate').val();
    var quantity =$('#qty').val();
    discount =discount/100;
    tax =tax/100;
    productPrice = rate * quantity;
    productdiscount = rate * quantity *discount;
    productPrice = productPrice - productdiscount;
    price_without_tax =productPrice;
    productTax = productPrice * tax ;
    productPrice =productPrice + productTax;
    // console.log(productTax);
    // $('#total').val(productPrice);
    // $('#total_tax').val(productTax);
    // $('#total_discount').val(productdiscount);
    // $('#total_without_tax').val(price_without_tax);
    $('#total').val(productPrice);
    $('#total_tax').val(productTax);
    $('#total_discount').val(productdiscount);
    $('#total_without_tax').val(price_without_tax);
    $('#total_with_tax').val(productPrice);

  }


 
}
//calculateTax() takes result of subTotal function but has to refer to the result to move forward as opposed to the previous function
//.toFixed() is the decimal points
// function calculateTax() {
//   //var subTotal = document.orderform.subtotal.value; OR for dryer code:
//   var subtotal = subTotal();
//   // var stax = 0.03;
//   // tax = subtotal * stax;
//   // document.orderform.tax.value = tax.toFixed(3);
//   // return tax;
// }
//takes the HTML output results from the previous two functions and adds them together. 
// function grandTotal() {
//   var subtotal = subTotal();
//   var tax = calculateTax();
//   document.orderform.total.value = subtotal.toFixed(2);
//   document.orderform.total_tax.value = tax.toFixed(2);
//   var gtotal = subtotal + tax;
//   document.orderform.total_with_tax.value = gtotal.toFixed(2);
// }

$(document).ready(function () {   

    $('select.select2bs4').change(function() {
      // var subtotal = subTotal();
      // var tax = calculateTax();
      // console.log(subTotal,tax)
   
      subTotal();
  });

    $("#qty").change(function () {
          subTotal();
    
    });
    
   
   $("#discount").change(function () {
          // discount();
          subTotal();
      })
      
      $("#tax").change(function () {
          // discount();
          subTotal();
      })
   });

</script>




   
@endpush