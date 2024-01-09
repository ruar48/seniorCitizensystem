<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senior Citizen Information System </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <style type="text/css">
        table tr td {
            padding: 0.3rem !important;
        }

        td a.btn {
            font-size: 0.7rem;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.aside')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><span class="fa fa-house-user"></span> Barangay Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Barangay Users</li>
                            </ol>
                        </div>
                        <a class="btn btn-sm elevation-2" href="#" data-toggle="modal" data-target="#add"
                            style="margin-top: 20px;margin-left: 10px;background-color: #e4c79f;"><i
                                class="fa fa-user-plus"></i>
                            Add New</a>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info elevation-2">
                        @if (session()->has('alert-success'))
                            <div class="alert alert-success">
                                {{ session()->get('alert-success') }}
                            </div>
                        @endif
                        <br>
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered">
                                <thead class="btn-cancel">
                                    <tr>
                                        <th>Barangay</th>
                                        <th>Full Name</th>
                                        <th>Contact Number</th>
                                        <th>Username</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brgyUsers as $row)
                                        <tr>
                                            <td>{{ $row->barangayID }}</td>
                                            <td>{{ $row->fullName }}</td>
                                            <td>{{ $row->contactNumber }}</td>
                                            <td>{{ $row->userName }}</td>

                                            <td class="text-center">
                                                <a class="btn btn-sm btn-success btn-edit" href="#"
                                                    data-toggle="modal" data-target="#edit"
                                                    data-id="{{ $row->id }}"><i class="fa fa-user-edit"></i>
                                                    update</a>
                                                <a class="btn btn-sm btn-danger btn-delete" href="#"
                                                    data-toggle="modal" data-id="{{ $row->id }}"
                                                    data-target="#delete"><i class="fa fa-trash-alt"></i> delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset('asset/img/sent.png') }}" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Barangay User?</h3>
                    <div class="m-t-20">
                        <form id="delete-form">
                            @csrf
                            <input type="hidden" id="id">
                            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form id="update-form">
                        @csrf
                        <input type="hidden" id="edit-id">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <span class="fa fa-user"> Profile Information</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Barangay</label>
                                                <select class="form-control" id="brgy">
                                                    <option value="" selected disabled>&larr; Select Barangay
                                                        &rarr;</option>
                                                    @foreach ($brgy as $rowbrgy)
                                                        <option value="{{ $rowbrgy->barangayName }}">
                                                            {{ $rowbrgy->barangayName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" id="fname" class="form-control"
                                                    placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Contact Number" id="num">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" id="uname"
                                                    placeholder="Username">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control"
                                                    placeholder="************">
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form action="{{ route('admin.addBrgyUSer') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <span class="fa fa-user"> Profile Information</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Barangay</label>
                                                <select class="form-control" name="barangayID">
                                                    <option value="" selected disabled>&larr; Select Barangay
                                                        &rarr;</option>
                                                    @foreach ($brgy as $rowbrgy)
                                                        <option value="{{ $rowbrgy->barangayName }}">
                                                            {{ $rowbrgy->barangayName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" placeholder="Full Name"
                                                    name="fullName">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Contact Number" name="contactNumber">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username"
                                                    name="userName">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control"
                                                    placeholder="************" name="password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                var id = $(this).data('id');

                $('#id').val(id);
                console.log(id)
                $('#delete').show();
            });

            $('#delete .btn-white').click(function() {
                $('#delete').hide();
            });

        });

        $('#delete-form').submit(function(event) {
            event.preventDefault();
            var id = $('#id').val();

            $.ajax({
                type: 'DELETE',
                url: '/admin/delete/barangay/user/' + id,
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    $('#delete').hide();
                    alert(data.message);
                    location.reload();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var brgy = $(this).closest('tr').find('td:eq(0)').text();
                var fname = $(this).closest('tr').find('td:eq(1)').text();
                var number = $(this).closest('tr').find('td:eq(2)').text();
                var uname = $(this).closest('tr').find('td:eq(3)').text();


                $('#edit-id').val(id);
                $('#brgy').val(brgy);
                $('#fname').val(fname);
                $('#num').val(number);
                $('#uname').val(uname);

                $('#edit').show();
            });
            $('#edit .btn-secondary').click(function() {
                $('#edit').hide();
            });

            $('#update-form').submit(function(event) {
                event.preventDefault();
                var id = $('#edit-id').val();
                var brgy = $('#brgy').val();
                var fname = $('#fname').val();
                var number = $('#num').val();
                var uname = $('#uname').val();


                $.ajax({
                    type: 'PUT',
                    url: '/admin/update/barangay/user/' + id,
                    data: {
                        id: id,
                        brgy: brgy,
                        fname: fname,
                        num: number,
                        uname: uname,
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT',
                    },
                    success: function(data) {
                        $('#edit').hide();
                        alert(data.message);
                        location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });

            });
        });
    </script>
    <!-- jQuery -->
    <script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/js/adminlte.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('asset/tables/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>

</body>

</html>
