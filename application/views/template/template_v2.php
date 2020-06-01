<?php
/**
 * ==================================================================
 * 
 * @author Muhammad Ma'sum
 * @version 1.0
 * 
 * created 20 May 2020
 */

?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Apps Steganography</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="http://localhost/pos/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="shortcut icon" type="image/png" href="http://localhost/pos/uploads/images/favicon.ico"/>
  <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>

  <style>
    .aktif, .a:hover {
  background-color: #f4f4f4;
  /* color: white; */
}
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
    <div class="container">
      <a href="<?= base_url()?>" class="navbar-brand">
        <span class="brand-text font-weight-light"><b>My Apps</b></span>
      </a>
    
      

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="<?= site_url('pxl/auth/logout') ?>">
            <i class="fa fa-sign-out"></i>
            <!-- <span class="badge badge-warning navbar-badge">15</span> -->
          </a>
          
        </li>
      </ul>
    </div>
  </nav>

  <div class="main-header navbar navbar-expand-md navbar-light navbar-white" style="margin-top:-2px">
    <div class="container">
      
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav" style="margin-left:-15px;">
            <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'aktif' : '' ?>">
                <a href="<?= base_url('pxl/dashboard')?>" class="nav-link">Dashboard </a>
            </li>
            <li class="nav-item <?= $this->uri->segment(2) == 'encryption' ? 'aktif' : '' ?>">
                <a href="<?= base_url('pxl/encryption')?>" class="nav-link">Enkripsi Pesan </a>
            </li>
            <li class="nav-item <?= $this->uri->segment(2) == 'decryption' ? 'aktif' : '' ?>">
                <a href="<?= base_url('pxl/decryption')?>" class="nav-link">Dekripsi Pesan</a>
            </li>
        </ul>
      </div>
    </div>
  </div>


  <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <div class="content-wrapper">
    <div class="content-header">
        <?= $contents ?>
       
    </div>
  </div>
</div>




<!-- jQuery -->
<script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>

<script>
  $(document).ready( function () {
    $('#tabelku').DataTable();
  });

  $(function(){
      var title = '<?= $this->session->flashdata("title") ?>';
      var text = '<?= $this->session->flashdata("text") ?>';
      var icon = '<?= $this->session->flashdata("icon") ?>';

      if(title){
          Swal.fire({
              title: title,
              text: text,
              icon : icon,
          });
      };
  });

</script>


</body>
</html>
