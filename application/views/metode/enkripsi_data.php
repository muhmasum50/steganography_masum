<div class="content-wrapper" style="min-height: 1891.88px;">
    
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Enkripsi Pesan <small></small></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enkripsi Pesan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Main content -->
    <div class="content">
        <div class="container">
        <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
               Data Pesan Rahasia
              </h3>
              
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?=site_url('enkripsi/tambah')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pesan Rahasia</label>
                        <input type="text" class="form-control" name="pesan" placeholder="Masukkan pesan rahasia anda">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Gambar </label>
                        <input class="form-control" type="file" name="gambar1">
                        <span class="help-block has-error">Gambar Wajib PNG!</span>
                    </div>
                    <button type="submit" name="enkripsi" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Enkripsi !</button>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>


<?php 
$x = $this->session->flashdata('title'); 
echo $x;
?>


<script type="text/javascript">
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