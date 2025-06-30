<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <!-- <link rel="icon" href="<?= base_url(); ?>/assets/images/favicon-32x32.png" type="image/png" /> -->
    <link rel="icon" href="<?= base_url(); ?>/assets/images/logo-gi/icon.PNG" type="image/png" />
    <!--plugins-->
    <link href="<?= base_url(); ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- Datatable old -->
    <!-- <link href="<?= base_url(); ?>/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" /> -->

    <link href="https://cdn.datatables.net/1.13.10/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css"> -->
    <!-- <link href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css" rel="stylesheet"> -->

    <!-- Datatable -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css"> -->

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.0/css/select.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.bootstrap5.css"> -->


    <!-- loader-->
    <link href="<?= base_url(); ?>/assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?= base_url(); ?>/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/app.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/dark-theme.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/semi-dark.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/header-colors.css" />

    <!-- Select2 -->
    <!-- <link href="<?= base_url(); ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" /> -->

    <link href="<?= base_url(); ?>assets/plugins/select2-bs5/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" /> -->
    <link href="<?= base_url(); ?>assets/plugins/select2-bs5/css/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> -->

    <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->

    <!-- Select2 -->
    <!-- <script src="</?= base_url(); ?>/assets/plugins/select2/js/select2.min.js"></script> -->
    <script src="<?= base_url(); ?>/assets/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <script src="<?= base_url(); ?>/assets/plugins/select2-bs5/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <title><?= $title; ?></title>

    <style>
        .swal-wide {
            font-size: .85rem;
        }

        .sweet_loader {
            width: 140px;
            height: 140px;
            margin: 0 auto;
            animation-duration: 0.5s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            animation-name: ro;
            transform-origin: 50% 50%;
            transform: rotate(0) translate(0, 0);
        }

        @keyframes ro {
            100% {
                transform: rotate(-360deg) translate(0, 0);
            }
        }
    </style>

</head>

<body>