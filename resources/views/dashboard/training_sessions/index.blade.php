@extends('layouts.app')

@section('title')
Training Sessions

    <a class="modal-effect btn btn-lg btn-primary mr-2" data-effect="effect-scale"
    data-toggle="modal" href="#exampleModal">Create</a>

@endsection

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">training sessions</li>
    @endsection

@section('content')

<x-alert-type type="success"/>
<x-alert-type type="info"/>
<x-alert-type type="danger"/>


<div class="row">
    <div class="col-12">

      <div class="card">
        {{-- <div class="card-header">
          <h3 class="card-title">DataTable with default features</h3>
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              {{-- <th>Day</th> --}}
              <th>Starts At</th>
              <th>Finishes At</th>
              <th>Gym</th>
              <th>Manager</th>
              <th>Action</th>


            </tr>
            </thead>
            <tbody>
              {{-- @if($gyms->count()) --}}
              @foreach ($training_sessions as $session)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td><a href="{{ route('sessions.edit',$session->id) }}">{{$session->name}}</a></td>
              {{-- <td>{{$session->day}}</td> --}}
              <td>{{$session->starts_at}}</td>
              <td>{{$session->finishes_at}}</td>
              <td>{{$session->gym->name}}</td>
              <td>{{$session->gym->manager->name}}</td>
              <td>
                  <form action="{{ route('sessions.destroy', $session->id)}}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach
            {{-- @endif --}}
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Session</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('sessions.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">session Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            {{-- <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Day</label>
                            @php
                            $days = ['sat', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri'];
                        @endphp
                        <select class="form-control form-control-md" id="day" name="day">
                            @for($i=0; $i<count($days); $i++)

                                <option>{{ $days[$i] }}</option>

                            @endfor
                        </select> --}}
                            <br>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Starts At</label>
                                <input type="time" class="form-control" id="starts_at" name="starts_at" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Finishes At</label>
                                <input type="time" class="form-control" id="finishes_at" name="finishes_at" required>
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Gym Name</label>
                            <select name="gym_id" id="gym_id" class="form-control" required>
                                @foreach ($gyms as $gym)
                                    <option value="{{ $gym->id }}">{{ $gym->name }}</option>
                                @endforeach
                            </select>
                            <br>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

  </div>
  <!-- /.row -->
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
<script src="//unpkg.com/alpinejs" defer></script>
@endsection
