@extends('layouts.app')

@section('title')
Users

    <a href="{{ route('users.create') }}" class="btn btn-lg btn-primary mr-2">Create</a>

@endsection

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Users</li>
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
              <th>Email</th>
              <th>Image</th>
              <th>Gender</th>
              <th>Birth Date</th>
              <th>Action</th>

            </tr>
            </thead>
            <tbody>
                @if($count_of_users)
                    @foreach ($users->all() as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('users.edit', $user->id)}}">{{ $user->name }}</a></td>
                            <td>{{$user->email}}</td>
                            <td><img style="width: 100px; height: 100px;" src="{{ $user->avater }}" class="rounded mx-auto d-block alt="ahmed"></td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->birth_date }}</td>
                            <td>
                                <form action="{{ route('users.destroy',$user->id)}}" method="post">
                                    @csrf

                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
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
