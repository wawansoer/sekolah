<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/iconly/bold.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simple-datatables/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
    <!-- jQuery -->
    <script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
    <link href="<?= base_url('assets/vendors/select2/select2.min.css'); ?>" rel="stylesheet" />
    <script src="<?= base_url('assets/vendors/select2/select2.min.js'); ?>"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper">
                <div class="container pt-3 text-center">
                    <img class="img-thumbnail" src="<?= base_url('assets/images/logo/logo.png'); ?>" />
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item <?= ($keuangan == 1 ? "active" : ""); ?>">
                            <a href="<?= base_url('keuangan/'); ?>" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($keuangan == 2 ? "active" : ""); ?>">
                            <a href="<?= base_url('keuangan/periodespp'); ?>" class="sidebar-link">
                                <i class="fas fa-money-check-alt"></i>
                                <span>Periode SPP</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($keuangan == 3 ? "active" : ""); ?>">
                            <a href="<?= base_url('keuangan/bayarspp'); ?>" class="sidebar-link">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Pembayaran SPP</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($keuangan == 4 ? "active" : ""); ?>">
                            <a href="<?= base_url('keuangan/transaksi'); ?>" class="sidebar-link">
                                <i class="fas fa-money-check"></i>
                                <span>Transaksi</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($keuangan == 5 ? "active" : ""); ?>">
                            <a href="<?= base_url('keuangan/pengumuman'); ?>" class="sidebar-link">
                                <i class="fas fa-bullhorn"></i>
                                <span>Pengumuman</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?= base_url('logout'); ?>" class="sidebar-link">
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class="layout-navbar">
            <header class="mb-1">
                <nav class="navbar navbar-expand navbar-light">
                    <div class="container-fluid">
                        <a href="<?= base_url('keuangan/'); ?>">
                            <img src="<?= base_url('assets/images/logo/logo.png'); ?>" alt="Logo" srcset="" height="50em" />
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-3">
                                    <a href="#" class="burger-btn d-block">
                                        <i class="bi bi-justify fs-2"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">

                    </div>
                    <section class="section">
                        <div class="container">
                            <?= $this->renderSection('content') ?>
                        </div>
                    </section>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted" align="center">
                        <p>2021 &copy; SMAS Muhammadiyah Kendari</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/fontawesome/all.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/mazer.js'); ?>"></script>
</body>

</html>