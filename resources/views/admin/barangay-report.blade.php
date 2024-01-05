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
            padding: 1.1rem !important;
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
                            <h1 class="m-0"><span class="fa fa-hotel"></span> Barangay Reports</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Reports</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="chart-title">
                                        <h4>Report By Barangay </h4>
                                    </div>
                                    <table class="table table-bordered mytable">
                                        <thead>
                                            <td>
                                                <h6>Barangay</h6>
                                            </td>
                                            <td>
                                                <h6>Number</h6>
                                            </td>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Barangay 1</td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <td>Barangay 2</td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td>Barangay 3</td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <td>Barangay 4</td>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <td>Barangay 5</td>
                                                <td>10</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="chart-title">
                                        <h4>Graphical Representaion of Age Report</h4><br>
                                    </div>
                                    <canvas id="bargraph"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/adminlte.js') }}"></script>
    <script src="{{ asset('asset/js/chart.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar Chart
            var barChartData = {
                labels: ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"],
                datasets: [{
                    label: 'Total Senior',
                    backgroundColor: 'rgb(79,129,189)',
                    borderColor: 'rgba(0, 158, 251, 1)',
                    borderWidth: 1,
                    data: [10, 5, 10, 4, 10]
                }]
            };

            var ctx = document.getElementById('bargraph').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    }
                }
            });

        });
    </script>
</body>

</html>
