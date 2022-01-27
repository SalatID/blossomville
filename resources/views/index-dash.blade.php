<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/assets/img/favicon.ico">

    <title>@yield('webTittle')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/dashboard/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="{{asset('/dashboard/assets/css/sb-admin-2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" id="fontawesome-css-css" href="/guest/assets/fontawesome/css/font-awesome.css?ver=1.0.2" media="all">
    
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/dashboard/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/vendor/ckeditor4/ckeditor.js')}}"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <style>
        *{
            font-size:13px;
            font-family: sans-serif;
        }
        .sidebar.toggled .nav-item .nav-link span{
            font-size : 1rem !important;
        }
        .icon-2-5vw{
            font-size: 2.5vw !important;
        }
        .icon-1-5vw{
            font-size: 1.5vw !important;
        }
        .table-tecnisian th, .table-tecnisian td {
            padding : 2vh !important;
        }
        .popup-box{
            box-shadow: 0px 4px 5px 5px rgba(0,0,0,0.38);
            -webkit-box-shadow: 0px 4px 5px 5px rgba(0,0,0,0.38);
            -moz-box-shadow: 0px 4px 5px 5px rgba(0,0,0,0.38);
            height: 100px;
            position: absolute;
            background: #fff;
            z-index: 99;
            border-radius: 5px;
            overflow: auto;
        }
        .bg-sixtydb{
            background-color: #fe5000 !important;
        }
        .bg-default{
            background: #273641 !important;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('inc.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('inc.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @if(Session::has('error'))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-{{Session::get('error')?'danger':'success'}} alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> {{Session::get('error')?'Failed':'Succes'}}!</h5>
                            {{Session::get('message')}}
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Page Heading -->
                    @if(request()->getPathInfo()!='/greeting')
                        @include('inc.pageHeading')
                    @endif

                    <!-- Content Row -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Blossom Ville Citra Raya</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete User Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-12 text-center">
                            <h5>Kehilangan Data Permanen & Tidak Dapat Dipulihkan di Depan</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left">
                            <p>
                                Menghapus pengguna akan menghapus akses dari seua layanan SixtyDB<br>
                                - Untuk mengkonfirmasi dan melanjutkan penghapusan tekan tombol "Hapus" dibawah ini<br>
                                - Untuk membatalkan tekan cancel
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-del" href="">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Request Modal-->
    <div class="modal fade" id="deleteRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-12 text-center">
                            <h5>Kehilangan Data Permanen & Tidak Dapat Dipulihkan di Depan</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left">
                            <p>
                                Data Akan Dihapus Secara Pemanen<br>
                                - Untuk mengkonfirmasi dan melanjutkan penghapusan tekan tombol "Hapus" dibawah ini<br>
                                - Untuk membatalkan tekan cancel
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-del" href="">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Password Modal-->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/user/changePass" method="post" id="changPassForm">
                        @csrf
                        <input type="hidden" name="userId" >
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">New Password</label>
                            <div class="col-sm-8">
                              <input type="password" name="password" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Re-Type Password</label>
                            <div class="col-sm-8">
                              <input type="password" name="reType" class="form-control form-control-sm" >
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="button" onClick="$('#changPassForm').submit()" class="btn btn-primary" href="login.html">Change</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Core plugin JavaScript-->
    <script src="{{asset('/dashboard/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/dashboard/assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('/dashboard/assets/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('/dashboard/assets/js/demo/chart-bar-demo.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
