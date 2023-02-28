<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <!-- <link href="img/favicon.ico" rel="icon"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/home/lib/animate/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/home/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/home/lib/lightbox/css/lightbox.min.css'); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/home/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/home/css/style.css'); ?>" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <!-- <div class="container-fluid bg-dark p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>123 Street, New York, USA</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+012 345 6789</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square btn-link rounded-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="<?= base_url(''); ?>" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <img class="rounded mx-auto d-block" src="<?= base_url('assets/images/logo/logo-utama.png'); ?>" width="200em" />
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?= base_url(''); ?>" class="nav-item nav-link">Beranda</a>
                <div class="nav-item dropdown ">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil Sekolah</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="#" class="dropdown-item">Sambutan Kepala Sekolah</a>
                        <a href="#" class="dropdown-item">Sejarah</a>
                        <a href="#" class="dropdown-item">Visi & Misi</a>
                        <a href="#" class="dropdown-item">Sarana & Prasarana</a>
                        <a href="#" class="dropdown-item">Tenaga Pendidik</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="<?= base_url('daftarberita'); ?>" class="dropdown-item">Berita</a>
                        <a href="<?= base_url('daftarpengumuman'); ?>#" class="dropdown-item">Pengumuman</a>
                    </div>
                </div>

                <a href="#" class="nav-item nav-link">PPDB</a>
                <a href="http://www.exam.smamuhkendari.sch.id/" class="nav-item nav-link">CBT</a>
                <a href="<?= base_url('/login'); ?>" class="nav-item nav-link"> <button type="button" class="btn btn-success btn-sm">Masuk</button> </a>

            </div>
        </div>
    </nav>
    <!-- Navbar End -->



    <?= $this->renderSection('content') ?>

    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h5 class="text-white mb-4">Hubungi Kami</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jalan K.H.A. Dahlan No.19 Kota Kendari</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+628114052342</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@smamuhkendari.sch.id</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href="https://www.youtube.com/channel/UC93bMaVRQKMIMKjI7hEnASw"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href="https://www.instagram.com/moehlas_kendari/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="350em" height="200em" id="gmap_canvas" src="https://maps.google.com/maps?q=sma%20muhammadiyah%20kendari&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="1" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">SMAS Muhammadiyah Kendari</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/home/lib/wow/wow.min.js'); ?>"></script>
    <script src="<?= base_url('assets/home/lib/easing/easing.min.js'); ?>"></script>
    <script src="<?= base_url('assets/home/lib/waypoints/waypoints.min.js'); ?>"></script>
    <script src="<?= base_url('assets/home/lib/counterup/counterup.min.js'); ?>"></script>
    <script src="<?= base_url('assets/home/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('assets/home/lib/isotope/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?= base_url('assets/home/lib/lightbox/js/lightbox.min.js'); ?>"></script>
    <!-- Template Javascript -->
    <script src="<?= base_url('assets/home/js/main.js'); ?>"></script>

</body>

</html>