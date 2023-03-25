@extends('layouts.app')

@section('title')
Couches

    <a class="modal-effect btn btn-lg btn-primary mr-2" data-effect="effect-scale"
                                data-toggle="modal" href="#exampleModal">Create</a>

@endsection

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">couches</li>
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
              <th>gender</th>
              <th>Gym</th>
              <th>Manager</th>
              <th>Action</th>


            </tr>
            </thead>
            <tbody>
              @if($couches->count())
              @foreach ($couches as $couch)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td><a href="{{ route('couches.edit',$couch->id) }}">{{$couch->name}}</a></td>
              <td>{{$couch->gender}}</td>
              <td>{{$couch->gym->name}}</td>
              <td>{{$couch->gym->manager->name}}</td>
              <td>
                  <form action="{{ route('couches.destroy',$couch->id)}}" method="post">
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
                        <h5 class="modal-title" id="exampleModalLabel">Add couch</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('couches.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">couch name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Type</label>
                            <select name="gender" id="gender" class="form-control" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                            </select>
                            <br>
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">gym Name</label>
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

         <!-- edit -->
         <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Update Couch</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
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
                                <option value="male" @selected($gym->gender == "male")>Male</option>
                                <option value="female"@selected($gym->gender == "female")>Female</option>
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
                     <div class="modal-footer">
                         <button type="submit" class="btn btn-primary">Update </button>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- edit closed -->



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
