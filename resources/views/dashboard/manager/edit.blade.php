@extends('layouts.app')

@section('title','Update Manager')

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Managers</li>
    <li class="breadcrumb-item active">Update Manager</li>
    @endsection

@section('content')


<form action="{{ route('manager.update', $manager->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}


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
        <label for="">Manager Name</label>
        <input type="text" @class([ 'form-control','is-invalid' => $errors->has('name')]) name="name"  value={{ $manager->name }}  >
         @if($errors->has('name'))
        <div class="text-danger">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="email" @class([ 'form-control','is-invalid' => $errors->has('email')]) name="email" value={{ $manager->email }}  >
         @if($errors->has('email'))
        <div class="text-danger">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="password" @class([ 'form-control','is-invalid' => $errors->has('password')]) name="password" required >
         @if($errors->has('password'))
        <div class="text-danger">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="">National Id</label>
        <input type="number" @class([ 'form-control','is-invalid' => $errors->has('national_id')]) name="national_id" value={{ $manager->national_id }} >
         @if($errors->has('national_id'))
        <div class="text-danger">
            {{ $errors->first('national_id') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="">Gender</label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="male" >
                <label class="form-check-label" for="">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="female" >
                <label class="form-check-label" for="">
                    Female
                </label>
            </div>
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="name">Birth Date</label>
        <div>
            <input type="date" @class([ 'form-control','is-invalid' => $errors->has('birth_date')]) name="birth_date" value={{ $manager->birth_date }}>
            @if($errors->has('birth_date'))
            <div class="text-danger">
                {{ $errors->first('birth_date') }}
            </div>
            @endif
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="">Avatar Image</label>
        <div>
            <input type="file" name="avatar" @class([ 'form-control','is-invalid' => $errors->has('avatar')]) >
            @if($errors->has('avatar'))
            <div class="text-danger">
                {{ $errors->first('avatar') }}
            </div>
            @endif
        </div>
    </div>








<div class="form-group">
<button type="submit" class="btn btn-primary">Update</button>

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
