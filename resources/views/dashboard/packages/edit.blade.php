@extends('layouts.app')

@section('title','Update Gym')

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Packages</li>
    <li class="breadcrumb-item active">Edit Package</li>
    @endsection

@section('content')


<form action="{{ route('packages.update',$package->id) }}" method="post" enctype="multipart/form-data" >
    {{ method_field('put') }}
    {{ csrf_field() }}
    <div class="modal-body">


       <div class="form-group">
           <label for="exampleInputEmail1">Package Name</label>
           <input type="text" class="form-control" id="name" name="name" value="{{ $package->name }}" required>
       </div>

       <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $package->price }}" required>
    </div>
    <br>

    <div class="form-group">
        <label for="exampleInputEmail1">Session Number</label>
        <input type="number" class="form-control" id="sessions_number" name="sessions_number" value="{{ $package->sessions_number }}" required>
    </div>
    <br>

    </div>

        <button type="submit" class="btn btn-primary">Update </button>


</form>


@push('scripts')
<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>


@endpush


@endsection
