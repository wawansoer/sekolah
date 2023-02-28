<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title;?></title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
</head>

<body>
  <nav class="navbar navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand ms-4" href="<?= base_url('calonsiswa');?>">
        <img src="<?= base_url('assets/images/logo/logo.png');?>">
      </a>
      <div class="dropdown">
        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="user-menu d-flex">
            <div class="user-name text-end me-3">
              <h6 class="mb-0 text-gray-600"><?= $nama;?></h6>
              <p class="mb-0 text-sm text-gray-600"><?= $jabatan;?></p>
            </div>
            <div class="user-img d-flex align-items-center">
              <div class="avatar avatar-md">
                <img src="<?= base_url('assets/images/faces/1.jpg');?>">
              </div>
            </div>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
          <li>
            <h6 class="dropdown-header">Hello, <?= $nama;?></h6>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="<?= base_url('logout');?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
        </ul>
      </div>


    </div>
  </nav>

  <div class="container">
    <?= $this->renderSection('content') ?>
  </div>

  <script src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/mazer.js'); ?>"></script>
</body>

</html>