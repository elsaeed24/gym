@extends('layouts.app')

@section('title')
Packages

    <a class="modal-effect btn btn-lg btn-primary mr-2" data-effect="effect-scale"
                                data-toggle="modal" href="#exampleModal">Create</a>

@endsection

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">packages</li>
    @endsection

@section('content')

<x-alert-type type="success"/>
<x-alert-type type="info"/>
<x-alert-type type="danger"/>


<div class="row">
    <div class="col-12">

      <div class="card">

        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Price</th>
              <th>Session Number</th>
              <th>Action</th>


            </tr>
            </thead>
            <tbody>
              @if($packages->count())
              @foreach ($packages as $package)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td><a href="{{ route('packages.edit',$package->id) }}">{{$package->name}}</a></td>
              <td>{{$package->price}}</td>
              <td>{{$package->sessions_number}}</td>

              <td>
                  <form action="{{ route('packages.destroy',$package->id)}}" method="post">
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
                        <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('packages.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Package Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Session Number</label>
                                <input type="number" class="form-control" id="sessions_number" name="sessions_number" required>
                            </div>
                            <br>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
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

<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var name = button.data('name')
        var gym_name = button.data('gym_name')
        var gender = button.data('gender')
        var modal = $(this)
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #gym_name').val(gym_name);
        modal.find('.modal-body #gender').val(gender);

    })



</script>
@endsection
