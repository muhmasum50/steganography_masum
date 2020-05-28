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
              <li class="breadcrumb-item active">Dekripsi Pesan</li>
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
                <table class="table table-borderless" id="tabelku">
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
                        <td><?= date("d F Y, H:i", strtotime($v->encrypted_at)) ?></td>
                        <td>
                          <a href="<?=base_url('pxl/decryption/').$v->gambar2?>" class="btn btn-info btn-flat btn-xs"><i class="fa fa-eye"></i> Decrypt!</a>
                          <button type="button" id="pencet-hapus" data-toggle="modal" data-target ="#modal-hapus" data-id="<?= $v->gambar2 ?>" class="btn btn-danger btn-fat btn-xs" data-toggle="modal"><i class="fa fa-trash"></i></button>
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

<!-- MODALS HAPUS -->
<div class="modal fade" id="modal-hapus" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Apakah anda yakin akan menghapus data ini?</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-footer justify-content-between">
        <form action="<?= site_url('dekripsi/hapus')?>" method="post">
        
          <input type="hidden" name="idhapus" value="" id="idhapus">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          <button class="btn btn-primary btn-sm pull-right">OK</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function(){

  $(document).on('click', '#pencet-hapus', function(){
    var idhapus = $(this).data('id')
    $('#idhapus').val(idhapus)

  })

})

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