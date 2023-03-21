@extends('layouts.app')

@section('title')
Managers

    <a href="{{ route('manager.create') }}" class="btn btn-lg btn-primary mr-2">Create</a>

@endsection

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Managers</li>
    @endsection

@section('content')


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
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>National Id</th>
              <th>Gender</th>
              <th>Birth Date</th>
              <th>Action</th>

            </tr>
            </thead>
            <tbody>
              @if($managers->count())
              @foreach ($managers as $manager)
            <tr>
              <td>{{$manager->id}}</td>
              <td><a href="{{ route('manager.edit', $manager->id)}}">{{$manager->name}}</a></td>
              <td>{{$manager->email}}</td>
              <td>{{$manager->national_id	}}</td>
              <td>{{$manager->gender}}</td>
              <td>{{$manager->birth_date}}</td>
              <td>
                  <form action="{{ route('manager.destroy',$manager->id)}}" method="post">
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


@endsection
