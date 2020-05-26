<div class="content-wrapper" style="min-height: 1891.88px;">
    
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Dekripsi Pesan <small></small></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
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
               Dekripsi Pesan
              </h3>
              
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Plain Text Gambar Sebelum</th>
                        <th>Plain Text Gambar Sesudah</th>
                        <th>Terenkripsi Pada</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach($row as $v) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><img src="<?= base_url('uploads/').$v->gambar1 ?>" class="img" style="width:50px"><br><?= $v->gambar1 ?></td>
                        <td><img src="<?= base_url('uploads/').$v->gambar2 ?>" class="img" style="width:50px"><br><?= $v->gambar2 ?></td>
                        <td><?= $v->encrypted_at ?></td>
                        <td>
                          <a href="<?=base_url('pxl/decryption/').$v->id_enkripsi?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-eye"></i> Decrypt!</a>
                        </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
</div>