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
        .txt {
            padding-left: 20px !important;
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
                        <div class="col-sm-6 animated bounceInRight">
                            <h1 class="m-0"><span class="fa fa-user-plus"></span> Add Senior</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Senior</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <div class="card card-outline card-info">
                            @if (session()->has('alert-success'))
                                <div class="alert alert-success">
                                    {{ session()->get('alert-success') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.addSeniorCitizen') }}" method="POST">
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
                                                        <input type="text" class="form-control" placeholder="SNR-123"
                                                            name="seniorID">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="first name" name="firstName">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Middle Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="middle name" name="middleName">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="last name" name="lastName">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="gender">
                                                            <option selected disabled>&larr; Select Gender &rarr;
                                                            </option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Birthday</label>
                                                        <input type="date" class="form-control" name="birthday">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="number" name="age" class="form-control"
                                                            placeholder="age">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Birth Place</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Birth Place" name="birthPlace">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea class="form-control" name="address"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="card-header">
                                                        <span class="fa fa-phone"> Contact Information</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Contact Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Contact Number" name="contactNumber">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>With Pension</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="With Pension" name="pensionstatus">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Monthly Pension</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Monthly Pension" name="monthlyPension">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Active" value="Active" name="status">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Emergency Contact Person</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Emergency Contact Person"
                                                            name="emergencyContactPerson">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Emergency Contact Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Emergency Contact Number"
                                                            name="emergencyContactPersonNumber">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Emergency Contact Address</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Emergency Contact Address"
                                                            name="emergencyContactPersonAddress">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/adminlte.js') }}"></script>

</body>

</html>
