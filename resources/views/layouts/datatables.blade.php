@extends('layouts.app')

@section('content')

<div class="container">
    @yield('page-start')
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="card-header"
                    style="position: -webkit-sticky; position: sticky; top: 0; z-index: 1020; backdrop-filter: blur(10px);">
                    <div class="d-flex justify-content-between">
                        <div class="h5 align-self-center my-2">@yield('table_header')</div>
                        <div class="d-flex">
                            <div id="controlsPanel" style="display: none;">
                                <div class="d-flex">
                                    <button id="toggleBanButton" class="btn btn-info mr-2"><i
                                            class="fa fa-trash pr-md-2 m-auto"></i>Ban</button>
                                            <button id="editButton" class="btn btn-primary mr-2"><i
                                                class="fa fa-pen pr-md-2 m-auto"></i>Edit</button>
                                            <button id="deleteButton" class="btn btn-danger mr-2"><i
                                                    class="fa fa-trash pr-md-2 m-auto"></i>Delete</button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a class="modal-effect btn btn-success btn-block" id="addButton" data-effect="effect-scale"
                            data-toggle="modal" href="#modal1">Add</a>
                            </div>
                            {{-- <button id="addButton" class="btn btn-sm btn-success mr-3"><i class="fa fa-plus pr-md-2 m-auto"></i>Add</button> --}}
                            {{-- <button id="addButton" class="btn btn-sm btn-primary mr-3"><i class="fa fa-plus pr-md-2 m-auto"></i>Edit</button>
                            <button id="addButton" class="btn btn-sm btn-danger"><i class="fa fa-trash pr-md-2 m-auto"></i>Delete</button> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="w-100">
                        {{$dataTable->table()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="toast shadow-lg m-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3500"
    style="position: fixed; right: 1.2rem; top: 0; margin-top: 1.2rem !important; z-index: 99999;">
    <div class="toast-header">
        <strong id="toastTitle" class="mr-auto w-100" style="min-width: 200px; width: 100%;"></strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        <p id="toastMessage"></p>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addEditForm" enctype="multipart/form-data"></form>
                <div id="alertsDiv"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="formConfirmBtn" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmTitle">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="confirmMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="confirmDeleteBtn" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

{{-- Add Moadal --}}

<div class="modal fade"  id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ِAdd Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('managers.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label >name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label >email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label >password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label >gender</label><br>
                            <select name="gender" id="gender" class="w-100 p-3">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label >birth date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                        </div>

                        <div class="form-group">
                            <label >address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="form-group">
                            <label >phone</label>
                            <input type="number" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label >national ID</label>
                            <input type="number" class="form-control" id="national_id" name="national_id" required>
                        </div>

                        <div class="form-group">
                            <label >city</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>

                        <div class="form-group">
                            <label >avatar</label>
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
</div>

<script>
    const ajaxUrl = @yield('table_route', 'null');
    const formDataEndpoint = @yield('form_data_endpoint', 'null');
    const addEndpoint = @yield('add_endpoint', 'null');
    const updateEndpoint = @yield('update_endpoint', 'null');
    const destroyEndpoint = @yield('destroy_endpoint', 'null');
    const toggleBanEndpoint = @yield('toggle_ban_endpoint', 'null');

    const tableColumns = [@yield('table_columns')];

    const csrfToken = "{{ csrf_token() }}";

    window.useAppDatatablesScript = true;
</script>

{{-- @push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@endpush

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

@endpush --}}
@endsection


