<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senior Citizen Information System </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/adminlte.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.aside')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><span class="fa fa-tachometer-alt"></span> Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fas fa-house-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>Barangay</h5>
                                    </span>
                                    <span class="info-box-number">
                                        <h2>{{ $brgyCount }}</h2>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fas fa-blind"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>Senior Citizens</h5>
                                    </span>
                                    <span class="info-box-number">
                                        <h2>{{ $seniorCount }}</h2>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-user-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>With Pensions</h5>
                                    </span>
                                    <span class="info-box-number">
                                        <h2>{{ $withPensionCount }}</h2>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-user-times"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>Without Pensions</h5>
                                    </span>
                                    <span class="info-box-number">
                                        <h2>{{ $withoutPensionCount }}</h2>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary"><i class="fas fa-male"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>Male</h5>
                                    </span>
                                    <span class="info-box-number">
                                        <h2>{{ $maleCount }}</h2>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-indigo"><i class="fas fa-female"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>Female</h5>
                                    </span>
                                    <span class="info-box-number">
                                        <h2>{{ $femaleCount }}</h2>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../asset/jquery/jquery.min.js"></script>
    <script src="../asset/js/adminlte.js"></script>
</body>

</html>
