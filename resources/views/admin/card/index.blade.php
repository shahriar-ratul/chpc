@extends('layouts.admin.app')

@section('title','Customer')

@push('css')
      <!-- DataTables -->
<link rel="stylesheet" href="{{asset('/admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('content')


<div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Cards</h3>

          <a href="{{route('card.create')}}" class="btn btn-primary float-right">
            <i class="fas fa-plus"></i> Add New Card
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sl</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach($cards as $key =>$card)
            <tr>


              <td>{{ ++$key }}</td>
              <td >{{ $card->name }}</td>
              <td>
                <a class="btn btn-info" href="{{ route('card.edit',$card->id) }}">
                  <i class="fas fa-edit"></i> Edit
                </a> 
                <a class="btn btn-danger text-light" onclick="deleteTag({{ $card->id }})">
                  <i class="fas fa-trash-alt"></i> Delete
                </a> 
                <form id="delete-form-{{ $card->id }}" action="{{ route('card.destroy',$card->id) }}" method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
              </form>
              </td>
            </tr>

          


            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>Sl</th>
              <th>Name</th>
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

   
@endpush