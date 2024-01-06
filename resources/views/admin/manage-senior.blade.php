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

        table tr td p {
            margin-top: -0.8rem !important;
            margin-bottom: -0.8rem !important;
            font-size: 0.9rem;
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
                            <h1 class="m-0"><span class="fa fa-blind"></span> Manage Senior Citizens</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Operator</li>
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
                                        <th>ID No.</th>
                                        <th>Profile Info</th>
                                        <th>Contact Info</th>
                                        <th>Address</th>
                                        <th>Monthly Pension</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($senior as $row)
                                        <tr>
                                            <td>{{ $row->seniorID }}</td>
                                            <td>
                                                <p class="info"><small class="text-danger">Name:</small><span
                                                        id="lastName">{{ $row->lastName }}</span> <span
                                                        id="firstName">{{ $row->firstName }}</span><span
                                                        id="middleName">{{ $row->middleName }}
                                                    </span></p>
                                                <p class="info"><small class="text-danger">Gender:</small><span
                                                        id="gender">{{ $row->gender }}</span></p>
                                                <p class="info"><small class="text-danger">Birthday:</small><span
                                                        id="bday">{{ $row->birthday }}</span>
                                                </p>
                                                <p class="info"><small class="text-danger">Age:</small><span
                                                        id="age">{{ $row->age }}</span></p>
                                            </td>
                                            <td>
                                                <p class="info"><small class="text-danger">Contact Person:
                                                    </small><span
                                                        id="contactPerson">{{ $row->emergencyContactPerson }}</span>
                                                </p>
                                                <p class="info"><small class="text-danger">Contact Number:
                                                    </small><span
                                                        id="ContactPersonNumber">{{ $row->emergencyContactPersonNumber }}</span>
                                                </p>
                                                <p class="info"><small class="text-danger">Contact Address:
                                                    </small><span
                                                        id="ContactPersonAddress">{{ $row->emergencyContactPersonAddress }}</span>
                                                </p>
                                            </td>
                                            <td>{{ $row->address }}</td>
                                            <td class=" text-center"><span
                                                    class="badge bg-warning">{{ $row->monthlyPension }}</span></td>
                                            <td class=" text-center"><span
                                                    class="badge bg-success">{{ $row->status }}</span></td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-success btn-edit" href="#"
                                                    data-toggle="modal" data-target="#edit"
                                                    data-id="{{ $row->id }}"><i class="fa fa-user-edit"></i>
                                                    update</a>
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
                    <h3>Are you sure want to delete this Senior?</h3>
                    <div class="m-t-20">
                        <form>
                            @csrf
                            <input type="hidden" id="senior-id">
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
                                        <span class="fa fa-user"> Profile Information</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Senior ID</label>
                                                <input type="hidden" id="edit-id">
                                                <input type="text" id="srID" class="form-control"
                                                    placeholder="SNR-123">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" id="fname" class="form-control"
                                                    placeholder="first name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type="text" id="mname" class="form-control"
                                                    placeholder="middle name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" id="lname" class="form-control"
                                                    placeholder="last name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" id="gendermake">
                                                    <option selected disabled>&larr; Select Gender
                                                        &rarr;</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <input type="date" id="birthday" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="number" id="ageedit" class="form-control"
                                                    placeholder="Age">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Birth Place</label>
                                                <input type="text" id="bplace" class="form-control"
                                                    placeholder="Birth Place">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea id="addressplace" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <span class="fa fa-phone"> Contact Information</span>
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Contact Number" id="contactNumber">
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>With Pension</label>
                                                <input type="text" class="form-control"
                                                    placeholder="With Pension" id="c">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Monthly Pension</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Monthly Pension" id="mpen">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="text" class="form-control" placeholder="Active"
                                                    id="status">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Emergency Contact Person</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Emergency Contact Person" id="contactPersonel">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Emergency Contact Number</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Emergency Contact Number" id="contactNumber">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Emergency Contact Address</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Emergency Contact Address" id="contactAddress">
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

                $('#senior-id').val(id);
                console.log(id)
                $('#delete').show();
            });

            $('#delete .btn-white').click(function() {
                $('#delete').hide();
            });

        });

        $('#delete').submit(function(event) {
            event.preventDefault();
            var id = $('#senior-id').val();

            $.ajax({
                type: 'DELETE',
                url: '/admin/delete/senior/' + id,
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
                var srID = $(this).closest('tr').find('td:eq(0)').text();
                var address = $(this).closest('tr').find('td:eq(3)').text();
                var monthlyPension = $(this).closest('tr').find('td:eq(4)').text();
                var status = $(this).closest('tr').find('td:eq(5)').text();

                var lastName = $('#lastName').text();
                var firstName = $('#firstName').text();
                var middleName = $('#middleName').text();
                var gender = $('#gender').text().trim();
                var bday = $('#bday').text();
                var age = $('#age').text();
                var contactPerson = $('#contactPerson').text();
                var contactPersonNumber = $('#ContactPersonNumber').text();
                var contactPersonAddress = $('#ContactPersonAddress').text();
                // const gender = $('#edit_gender option:selected').val();
                $('#edit-id').val(id);
                $('#srID').val(srID);
                $('#fname').val(firstName);
                $('#mname').val(middleName);
                $('#lname').val(lastName);
                $('#gendermake').val(gender);
                $('#birthday').val(bday);
                $('#ageedit').val(age);
                $('#addressplace').val(address);
                $('#status').val(status);
                $('#mpen').val(monthlyPension);
                $('#contactNumber').val(contactPersonNumber);
                $('#contactPersonel').val(contactPerson);
                $('#contactAddress').val(contactPersonAddress)

                $('#edit').show();
            });
            $('#edit .btn-secondary').click(function() {
                $('#edit').hide();
            });

            $('#update-form').submit(function(event) {
                event.preventDefault();


                var id = $('#edit-id').val();
                var srId = $('#srID').val();
                var lastName = $('#lname').val();
                var firstName = $('#fname').val();
                var middleName = $('#mname').val();
                var age = $('#ageedit').val();
                var gender = $('#gendermake').val();
                var bday = $('#birthday').val();
                var address = $('#addressplace').val();
                var status = $('#status').val();
                var monthlypension = $('#mpen').val();
                var contactNumber = $('#contactNumber').val();
                var contactPerson = $('#contactPersonel').val();
                var contactAddress = $('#contactAddress').val();

                $.ajax({
                    type: 'PUT',
                    url: '/admin/update/senior/' + id,
                    data: {
                        srID: srId,
                        lastName: lastName,
                        firstName: firstName,
                        middleName: middleName,
                        age: age,
                        gender: gender,
                        bday: bday,
                        address: address,
                        status: status,
                        monthlyPension: monthlypension,
                        contactNumber: contactNumber,
                        contactPerson: contactPerson,
                        contactAddress: contactAddress,

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
