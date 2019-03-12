<html lang="en">

<head>

    <!--    ajax lib-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MUR SCM</title>
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/iconfonts/font-awesome/css/font-awesome.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.png" />

    <!--Datatable lib-->
    <!--    <link href="--><?php //echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?><!--" rel="stylesheet">-->
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>

    <!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" type="text/css" rel="stylesheet"/>-->
    <link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap4.min.css" type="text/css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" type="text/css" rel="stylesheet"/>

    <link href="<?php echo base_url(); ?>assets/wizard/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />

    <!-- Optional SmartWizard theme -->
    <link href="<?php echo base_url(); ?>assets/wizard/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/wizard/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/wizard/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-upload/css/jquery.fileupload.css">

</head>

<body>

<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a>
                <img src="<?php echo base_url()?>assets/images/Logo Border.jpg"  height="60px"/>
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="<?php echo base_url()?>assets/images/logo-mini.svg" alt="logo" />
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">
                <li href="#" onclick="Logout()" >
                    <i class="fa fa-power-off"></i>
                    <span class="hidden-xs">Logout</span>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <script>
            function Logout() {
                $.ajax({
                    url: "<?php echo site_url('Login/Logout'); ?>",
                    type: "post",
                    cache: false,
                    success: function (response) {
                        // alert(response);
                        if(response !== 0){
                            alert("Logout Berhasil");
                            window.location.href = "<?php echo base_url(); ?>Login";
                        }else{
                            alert("terjadi kesalahan");
                        }
                    }
                });
            }

        </script>
