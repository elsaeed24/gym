@extends('layouts.app')

@section('title','Update Attendances')

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Attendances</li>
    <li class="breadcrumb-item active">Edit Attendance</li>
    @endsection

@section('content')


<form action="{{ route('attendances.update',$attendance->id) }}" method="post" enctype="multipart/form-data" >
    {{ method_field('put') }}
    {{ csrf_field() }}
    <div class="modal-body">

       <label class="my-1 mr-2" for="inlineFormCustomSelectPref">User Name</label>
       <select name="user_id" id="user_id" class="form-control" required>
           @foreach ($users as $user)
               <option value="{{ $user->id }}" @selected($attendance->user_id == $user->id)>{{ $user->name }}</option>
           @endforeach
       </select>
       <br>
       <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Session Name</label>
       <select name="session_id" id="session_id" class="form-control" required>
           @foreach ($training_sessions as $training_session)
               <option value="{{ $training_session->id }}" @selected($attendance->session_id == $training_session->id)>{{ $training_session->name }}</option>
           @endforeach
       </select>
       <br>
       <div class="form-group">
        <label for="exampleInputEmail1">Attendance Time</label>
        <input type="time" class="form-control" id="attendance_time" name="attendance_time" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Attendance Date</label>
        <input type="date" class="form-control" id="attendance_date" name="attendance_date" required>
    </div>

       <br>
       <label class="my-1 mr-2" for="inlineFormCustomSelectPref">gym Name</label>
       <select name="gym_id" id="gym_id" class="form-control" required>
           @foreach ($gyms as $gym)
               <option value="{{ $gym->id }}" @selected($attendance->gym_id == $gym->id)>{{ $gym->name }}</option>
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
