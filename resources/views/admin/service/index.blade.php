@extends('layouts.admin.app')

@section('title','Service')

@push('css')
      <!-- DataTables -->
<link rel="stylesheet" href="{{asset('/admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">


@endpush

@section('content')


<div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title mr-5">All Services</h3>

          <a href="{{route('card.create')}}" class="btn btn-success mr-5 ">
            <i class="fas fa-plus"></i> Add New Card

          </a>          <a href="{{route('customer.create')}}" class="btn btn-info mr-5 ">
            <i class="fas fa-plus"></i> Add New Customer
          </a>
        

          <a href="{{route('item.create')}}" class="btn btn-warning mr-5">
            <i class="fas fa-plus"></i> Add New Item
          </a>          
          <a href="{{route('service.create')}}" class="btn btn-primary mr-5">
            <i class="fas fa-plus"></i> Add New Service
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sl</th>
              <th>Doc No</th>
              <th>Date</th>
              <th>Total</th>
              <th>Payment</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach($services as $key =>$service)
            <tr>


              <td>{{ ++$key }}</td>
              <td >{{ $service->doc_id }}</td>
              <td >{{ $service->date }}</td>
              <td >{{ $service->total }}</td>
              <td > 
                @if($service->payment_method == null)
                <span class="badge badge-danger">Pending</span>
                @else
                <span class="badge badge-success">Done</span>
                @endif
              
              </td>
              <td>
                <a class="btn btn-info btn-sm" href="{{ route('service.edit',$service->id) }}">
                  <i class="fas fa-edit"></i> Edit
                </a> 
                <a class="btn btn-danger text-light btn-sm" onclick="deleteTag({{ $service->id }})">
                  <i class="fas fa-trash-alt"></i> Delete
                </a> 
                <form id="delete-form-{{ $service->id }}" action="{{ route('service.destroy',$service->id) }}" method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
              </form>
                <a class="btn btn-success text-light btn-sm" data-toggle="modal" data-target="#modal-Item">
                  <i class="fas fa-money-check-alt"></i> payment
                </a>
              </td>
            </tr>

          


            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>Sl</th>
              <th>Doc No</th>
              <th>Date</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="modal fade" id="modal-Item">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Item </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Item Details
              </h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Name</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Price</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Time</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Description</a>
                </li>
              </ul>
              <div class="tab-content" id="custom-content-below-tabContent">
                <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                  
                </div>
                <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab"> 
                </div>
                <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                </div>
                <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                </div>
              </div>
              {{-- <div class="tab-custom-content">
                <p class="lead mb-0">Custom Content goes here</p>
              </div> --}}




            </div>
            <!-- /.card -->
          </div>
          <!-- /.card -->
      
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


@endsection

@push('js')
<!-- DataTables -->
<script src="{{asset('/admin/')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('/admin/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>





<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it! ',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>

<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
      });
    });
  </script>

<script>
  $("#modal-Item").on('show.bs.modal', function(e){
   var getName = $(e.relatedTarget).data('name');
   var getPrice = $(e.relatedTarget).data('price');
   var getTime = $(e.relatedTarget).data('time');
   var getDescription = $(e.relatedTarget).data('description');
   $("#custom-content-below-home").text(getName);
   $("#custom-content-below-profile").text(getPrice);
   $("#custom-content-below-messages").text(getTime);
   $("#custom-content-below-settings").text(getDescription);
 });



</script>
   
@endpush