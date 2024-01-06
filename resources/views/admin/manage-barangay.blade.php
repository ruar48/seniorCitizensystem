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
                            <h1 class="m-0"><span class="fa fa-hotel"></span> Manage Barangay</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Manage Barangay</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info elevation-2">
                        <br>
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered">
                                <thead class="btn-cancel">
                                    <tr>
                                        <th>Barangay Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Contact Person</th>
                                        <th>Contact Person No.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangay as $row)
                                        <tr>
                                            <td>{{ $row->barangayName }}</td>
                                            <td>{{ $row->contactNumber }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->contactPerson }}</td>
                                            <td>{{ $row->contactPersonNumber }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-success btn-edit" href="#"
                                                    data-toggle="modal" data-target="#edit"
                                                    data-id="{{ $row->id }}"><i class="fa fa-edit"></i> update</a>
                                                <a class="btn btn-sm btn-danger btn-delete" href="#"
                                                    data-toggle="modal" data-target="#delete"
                                                    data-id="{{ $row->id }}"><i class="fa fa-trash-alt"></i>
                                                    delete</a>
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
                    <h3>Are you sure want to delete this Baranagy?</h3>
                    <div class="m-t-20">
                        <form action="">
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <span class="fa fa-hotel"> Barangay Information</span>
                                        <input type="hidden" id="edit-id">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Barangay Name</label>
                                                <input type="text" id="brgy" class="form-control"
                                                    placeholder="Barangay Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" id="contact" class="form-control"
                                                    placeholder="Contact Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" id="email" class="form-control"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Person</label>
                                                <input type="text" id="contactPerson" class="form-control"
                                                    placeholder="Contact Person">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Person Number</label>
                                                <input type="text" id="contactPersonNumber" class="form-control"
                                                    placeholder="Contact Person Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
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

        $('#delete').submit(function(event) {
            event.preventDefault();
            var id = $('#id').val();

            $.ajax({
                type: 'DELETE',
                url: '/admin/delete/' + id,
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

    {{-- edit fetched data start --}}
    <script>
        $(document).ready(function() {
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var brgy = $(this).closest('tr').find('td:eq(0)').text();
                var contact = $(this).closest('tr').find('td:eq(1)').text();
                var email = $(this).closest('tr').find('td:eq(2)').text();
                var contactPerson = $(this).closest('tr').find('td:eq(3)').text();
                var contactPersonNumber = $(this).closest('tr').find('td:eq(4)').text();


                $('#edit-id').val(id);
                $('#brgy').val(brgy);
                $('#contact').val(contact);
                $('#email').val(email);
                $('#contactPerson').val(contactPerson);
                $('#contactPersonNumber').val(contactPersonNumber);
                console.log(id);
                console.log(brgy);
                console.log(contact);
                console.log(email);
                console.log(contactPerson);
                console.log(contactPersonNumber);

                $('#edit').show();
            });
            $('#edit .btn-secondary').click(function() {
                $('#edit').hide();
            });

            $('#update-form').submit(function(event) {
                event.preventDefault();
                var id = $('#edit-id').val();
                var brgy = $('#brgy').val();
                var contact = $('#contact').val();
                var email = $('#email').val();
                var contactPerson = $('#contactPerson').val();
                var contactPersonNumber = $('#contactPersonNumber').val();


                $.ajax({
                    type: 'PUT',
                    url: '/admin/update/' + id,
                    data: {
                        id: id,
                        brgy: brgy,
                        contact: contact,
                        email: email,
                        contactPerson: contactPerson,
                        contactPersonNumber: contactPersonNumber,
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
