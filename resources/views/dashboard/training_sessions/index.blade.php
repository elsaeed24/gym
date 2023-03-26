@extends('layouts.app')

@section('title')
Training Sessions

    <a class="btn btn-lg btn-primary mr-2"  href="{{ route('sessions.create') }}">Create</a>

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
              <th>Starts At</th>
              <th>Finishes At</th>
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
              <td>{{$session->starts_at}}</td>
              <td>{{$session->finishes_at}}</td>
              <td>
                @if($session->manager !== null)
                    {{ $session->manager->name }}
                @else
                    <p>no manager found</p>
                @endif
              </td>
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
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Gym</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('sessions.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gym name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Type</label>
                            <select name="type" id="type" class="form-control" required>

                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="both">Both</option>

                            </select>
                            <br>
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Manger Name</label>
                            <select name="manager_id" id="manager_id" class="form-control" required>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                            <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Cover image</label>
                                <input type="file" class="form-control-file" id="avatar" name="avatar">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>--}}



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
