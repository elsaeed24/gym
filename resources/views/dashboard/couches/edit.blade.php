@extends('layouts.app')

@section('title','Update Gym')

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Couches</li>
    <li class="breadcrumb-item active">Edit Couch</li>
    @endsection

@section('content')


<form action="{{ route('couches.update',$couch->id) }}" method="post" enctype="multipart/form-data" >
    {{ method_field('put') }}
    {{ csrf_field() }}
    <div class="modal-body">


       <div class="form-group">
           <label for="exampleInputEmail1">couch name</label>
           <input type="text" class="form-control" id="name" name="name" value="{{ $couch->name }}" required>
       </div>

       <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Type</label>
       <select name="gender" id="gender" class="form-control" required>
               <option value="male" @selected($couch->gender == "male")>Male</option>
               <option value="female"@selected($couch->gender == "female")>Female</option>
       </select>
       <br>
       <label class="my-1 mr-2" for="inlineFormCustomSelectPref">gym Name</label>
       <select name="gym_id" id="gym_id" class="form-control" required>
           @foreach ($gyms as $gym)
               <option value="{{ $gym->id }}" @selected($couch->gym_id == $gym->id)>{{ $gym->name }}</option>
           @endforeach
       </select>
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
