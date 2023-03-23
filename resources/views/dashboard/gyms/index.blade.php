@extends('layouts.app')

@section('title')
Gyms

    <a class="modal-effect btn btn-lg btn-primary mr-2" data-effect="effect-scale"
                                data-toggle="modal" href="#exampleModal">Create</a>

@endsection

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">gyms</li>
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
              <th>#</th>
              <th>Name</th>
              <th>Created_at</th>
              <th>Cover Image</th>
              <th>City Manager Name</th>


            </tr>
            </thead>
            <tbody>
              @if($gyms->count())
              @foreach ($gyms as $gym)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td><a href="{{ route('gyms.edit', $gym->id)}}">{{$gym->name}}</a></td>
              <td>{{$gym->created_at}}</td>
              <td><img style="width: 100px; height: 100px;" src="{{ $gym->image }}" class="rounded mx-auto d-block alt="ahmed"></td>
              <td>{{$gym->manager->city}}</td>
              <td>
                  <form action="{{ route('gyms.destroy',$gym->id)}}" method="post">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Gym</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('gyms.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gym name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Cover image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">city</label>
                            <select name="city" id="city" class="form-control" required>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->city }}</option>
                                @endforeach
                            </select>



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


@endsection
