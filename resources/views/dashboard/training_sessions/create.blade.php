@extends('layouts.app')

@section('title','Create Trainining Session')

    @section('breadcrumb')
    @parent
        <li class="breadcrumb-item active">Trainining Session</li>
        <li class="breadcrumb-item active">Create Trainining Session</li>
    @endsection

@section('content')


<form action="{{ route('sessions.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="">session Name</label>
        <input type="text" @class([ 'form-control','is-invalid' => $errors->has('name')]) name="name" required value={{ old('name') }}  >
         @if($errors->has('name'))
        <div class="text-danger">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="">Day</label>
        @php
            $days = ['sat', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri'];
        @endphp
        <select class="form-control form-control-md" id="day">
            @for($i=0; $i<count($days); $i++)

                <option>{{ $days[$i] }}</option>

            @endfor
        </select>
        @if($errors->has('day'))
        <div class="text-danger">
            {{ $errors->first('day') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="">Starts At</label>
        <input type="time" @class([ 'form-control','is-invalid' => $errors->has('starts_at')]) name="starts_at" required value={{ old('starts_at') }}  >
         @if($errors->has('starts_at'))
        <div class="text-danger">
            {{ $errors->first('starts_at') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="">Finishes At</label>
        <input type="time" @class([ 'form-control','is-invalid' => $errors->has('finishes_at')]) name="finishes_at" required value={{ old('finishes_at') }}  >
         @if($errors->has('finishes_at'))
        <div class="text-danger">
            {{ $errors->first('finishes_at') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="">Manager</label>
        <select class="form-control form-control-md" name="manager_id">
            @foreach ($managers as $manager)


                <option value="{{ $manager->id }}">{{ $manager->name }}</option>

            @endforeach
        </select>
        @if($errors->has('manager_id'))
            <div class="text-danger">
                {{ $errors->first('manager_id') }}
            </div>
        @endif
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

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
