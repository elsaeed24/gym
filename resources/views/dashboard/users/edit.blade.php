@extends('layouts.app')

@section('title','Update User')

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Users</li>
    <li class="breadcrumb-item active">Update User</li>
    @endsection

@section('content')


<form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
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
    <label for="">user name</label>
    <input type="text" @class([ 'form-control','is-invalid' => $errors->has('name')]) name="name" required value={{ $user->name }}  >
     @if($errors->has('name'))
    <div class="text-danger">
        {{ $errors->first('name') }}
    </div>
    @endif
</div>

<div class="form-group">
    <label for="">email</label>
    <input type="email" @class([ 'form-control','is-invalid' => $errors->has('email')]) name="email" required value={{ $user->email }}  >
     @if($errors->has('email'))
    <div class="text-danger">
        {{ $errors->first('email') }}
    </div>
    @endif
</div>

<div class="form-group">
    <label for="">password</label>
    <input type="password" @class([ 'form-control','is-invalid' => $errors->has('password')]) name="password" required >
     @if($errors->has('password'))
    <div class="text-danger">
        {{ $errors->first('password') }}
    </div>
    @endif
</div>

<div class="form-group">
    <label for="">phone</label>
    <input type="number" @class([ 'form-control','is-invalid' => $errors->has('phone')]) name="phone" value={{ $user->phone }} required >
     @if($errors->has('phone'))
    <div class="text-danger">
        {{ $errors->first('phone') }}
    </div>
    @endif
</div>

<div class="form-group">
    <label for="">city</label>
    <input type="text" @class([ 'form-control','is-invalid' => $errors->has('city')]) name="city" value='{{ $user->city }}' required >
     @if($errors->has('city'))
    <div class="text-danger">
        {{ $errors->first('city') }}
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
        <input type="date" @class([ 'form-control','is-invalid' => $errors->has('birth_date')]) name="birth_date" value={{ $user->birth_date}}>
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
