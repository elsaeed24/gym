@extends('layouts.app')

@section('title','Update Training Session')

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Training Sessions</li>
    <li class="breadcrumb-item active">Edit Training Session</li>
    @endsection

@section('content')


<form action="{{ route('sessions.update', $session->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="modal-body">
        <div class="form-group">
            <label for="">session Name</label>
            <input type="text" @class([ 'form-control','is-invalid' => $errors->has('name')]) name="name" required value={{ $session->name }}  >
             @if($errors->has('name'))
            <div class="text-danger">
                {{ $errors->first('name') }}
            </div>
            @endif
        </div>

        {{-- <div class="form-group">
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
        </div> --}}

        <div class="form-group">
            <label for="">Starts At</label>
            <input type="time" @class([ 'form-control','is-invalid' => $errors->has('starts_at')]) name="starts_at" required value={{ $session->starts_at }}  >
             @if($errors->has('starts_at'))
            <div class="text-danger">
                {{ $errors->first('starts_at') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label for="">Finishes At</label>
            <input type="time" @class([ 'form-control','is-invalid' => $errors->has('finishes_at')]) name="finishes_at" required value={{ $session->finishes_at }}  >
             @if($errors->has('finishes_at'))
            <div class="text-danger">
                {{ $errors->first('finishes_at') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label for="">Gym Name</label>
            <select class="form-control form-control-md" name="gym_id">
                @foreach ($gyms as $gym)


                    <option value="{{ $gym->id }}" @selected($session->gym->id == $gym->id)>{{ $gym->name }}</option>

                @endforeach
            </select>
            @if($errors->has('gym_id'))
                <div class="text-danger">
                    {{ $errors->first('gym_id') }}
                </div>
            @endif
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#photo').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


@endsection
