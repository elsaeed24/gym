@extends('layouts.app')

@section('title','Create Gym')

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Gyms</li>
    <li class="breadcrumb-item active">Create Gym</li>
    @endsection

@section('content')


<form action="{{ route('gym.store') }}" method="post" enctype="multipart/form-data">
    @csrf


{{-- @if($errors->any())
<div class="alert alert-danger">
    <h3>Error Occured!</h3>
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --}}


    <div class="form-group">
        <label for="">Gym Name</label>
        <input type="text" @class([ 'form-control','is-invalid' => $errors->has('name')]) name="name" required value={{ old('name') }}  >
         @if($errors->has('name'))
        <div class="text-danger">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="email" @class([ 'form-control','is-invalid' => $errors->has('email')]) name="email" required value={{ old('email') }}  >
         @if($errors->has('email'))
        <div class="text-danger">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>









    <div class="form-group mb-3">
        <label for="">Cover Image</label>
        <div>
            <input type="file" name="image" @class([ 'form-control','is-invalid' => $errors->has('image')]) >
            @if($errors->has('image'))
            <div class="text-danger">
                {{ $errors->first('image') }}
            </div>
            @endif
        </div>
    </div>








<div class="form-group">
<button type="submit" class="btn btn-primary">Save</button>






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
