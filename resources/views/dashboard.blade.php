<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mini Market</title>

    <!-- Custom fonts for this template -->
    <link href="/template-admin-paw-main/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/template-admin-paw-main/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/template-admin-paw-main/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            font-family: 'Arial', sans-serif;
        }

        /* Sidebar Styling */
        .bg-gradient-success {
            background-color: #71b7e6 !important;
            background-image: linear-gradient(180deg, #71b7e6 10%, #9b59b6 100%);
            background-size: cover;
        }

        /* Table Styling */
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e3e6f0;
        }

        .card-header .font-weight-bold {
            color: #4e73df;
        }

        .card-body {
            padding: 1.25rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #858796;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #e3e6f0;
        }

        .table-bordered {
            border: 1px solid #e3e6f0;
            border-radius: 10px;
        }

        .table-bordered th,
        .table-bordered td {
            border-bottom-width: 2px;
        }

        /* .btn {
            border-radius: 20px;
        } */

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.5);
        }

        /* Welcome message styling */
        .welcome-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            margin-top: 2rem;
        }

        .welcome-card h1 {
            font-size: 2.5rem;
            color: #4e73df;
        }

        .welcome-card p {
            font-size: 1.25rem;
            color: #5a5c69;
        }

        .welcome-card .icon {
            font-size: 4rem;
            color: #71b7e6;
            margin-bottom: 1rem;
        }

        .welcome-card .btn {
            margin-top: 1rem;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-star"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ $nama }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            @if($role=='admin')
            <li class="nav-item active">
                <a class="nav-link" href="/rekaptulasi/{{ $role }}/{{ $nama }}">
                    <i class="fas fa-chart-line"></i>
                    <span>Rekaptulasi</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/produk/{{ $role }}/{{ $nama }}">
                    <i class="fas fa-box"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/indexPegawai/{{ $role }}/{{ $nama }}">
                    <i class="fas fa-user"></i>
                    <span>Pegawai</span>
                </a>
            <li class="nav-item active">
                <a class="nav-link" href="/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            @else
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="transaksi/{{ $role }}/{{ $nama }}">
                    <i class="fas fa-exchange-alt"></i>
                    <span>Transaksi</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Welcome Message -->
                    <div class="welcome-card">
                        <div class="icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h1>Welcome, {{ $role }} {{ $nama }}!</h1>
                        <p>We're glad to have you back. Manage your tasks efficiently and have a productive day!</p>
                        <a href="rekaptulasi/{{ $role }}" class="btn btn-primary">Go to Rekaptulasi</a>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/template-admin-paw-main/vendor/jquery/jquery.min.js"></script>
    <script src="/template-admin-paw-main/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/template-admin-paw-main/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/template-admin-paw-main/js/sb-admin-2.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/template-admin-paw-main/js/demo/datatables-demo.js"></script>

</body>

</html>