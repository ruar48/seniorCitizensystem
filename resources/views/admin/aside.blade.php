<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<nav class="main-header navbar navbar-expand navbar-light" style="background-color: rgb(131,219,214)">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#" role="button">
                <img src="../asset/img/avatar.png" class="img-circle" alt="User Image" width="30">
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="../index.html">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-light-primary">
    <a href=" index.html" class="brand-link">
        <img src="{{ asset('asset/img/logo.png') }}" alt="DSMS Logo" width="200">
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-hotel"></i>
                        <p>
                            Barangay
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.add-barangay') }}" class="nav-link">
                                <i class="nav-icon fa fa-plus-square"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.manage-barangay') }}" class="nav-link">
                                <i class="nav-icon fa fa-list"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-blind"></i>
                        <p>
                            Senior Citizen
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.add-senior') }}" class="nav-link">
                                <i class="nav-icon fa fa-user-plus"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.manage-senior') }}" class="nav-link">
                                <i class="nav-icon fa fa-user-edit"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user-tie"></i>
                        <p>
                            Users
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.barangay') }}" class="nav-link">
                                <i class="nav-icon fa fa-house-user"></i>
                                <p>Barangay</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin') }}" class="nav-link">
                                <i class="nav-icon fa fa-user-shield"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-chart-pie"></i>
                        <p>
                            Reports
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.age-report') }}" class="nav-link">
                                <i class="nav-icon fa fa-sort-numeric-up-alt"></i>
                                <p>Age Bracket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.gender-report') }}" class="nav-link">
                                <i class="nav-icon fa fa-venus-mars"></i>
                                <p>Gender</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.barangay-report') }}" class="nav-link">
                                <i class="nav-icon fa fa-hotel"></i>
                                <p>Barangay</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="sms.html" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Sms Settings
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
