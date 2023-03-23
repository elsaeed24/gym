@extends('layouts.app')

@section('title','Update Gym')

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Gyms</li>
    <li class="breadcrumb-item active">Edit Gym</li>
    @endsection

@section('content')


<form action="{{ route('gyms.update', $gym->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="modal-body">
        <div class="form-group">

            <input type="hidden" name="old_photo" value="{{ $gym->avater }}">

            <label for="">Gym name</label>
            <input type="text" class="form-control" name="name" value="{{ $gym->name }}" required>
        </div>

        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Type</label>
        <select name="type" id="type" class="form-control" required>

                <option value="male" @selected($gym->type == "male")>Male</option>
                <option value="female" @selected($gym->type == "female")>Female</option>
                <option value="both" @selected($gym->type == "both")>Both</option>

        </select>
        <br>

        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Manger Name</label>
        <select name="manager_id" id="manager_id" class="form-control" required>
            @foreach ($managers as $manager)
                <option value="{{ $manager->id }}" @selected($gym->manager_id == $manager->id)>{{ $manager->name }}</option>
            @endforeach
        </select>
        <br>

        <div class="form-group">
            <label for="">Cover image</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
        </div>
        <div class="form-group">
            <img id="showImage" src="{{$gym->avater }}" style="width: 100px; height: 100px;">
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
