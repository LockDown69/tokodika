<title>TOKODIKA | Katalog Rekomendasi</title>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Katalog Rekomendasi</h1>
  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group me-2" role="group" aria-label="First group">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#caridata">
        Cari
      </button>
    </div>
    <div class="btn-group me-2" role="group" aria-label="Second group">
      <a href="<?php echo base_url('kategori/user'); ?>"><button class="btn btn-primary">
          Kembali
        </button></a>
    </div>
  </div>
</div>

<div class="row">
  <?php foreach( $getKategori->result() as $res ){ ?>
  <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card">
      <img class="card-img-top" width="100%" height="225"
        src="<?php echo base_url()?>assets/img/<?php echo $res->category_image ?>">

      <div class="card-body">
        <h5 class="card-title">
          <?php echo $res->category_name; ?>
        </h5>
        <?php echo form_open_multipart('produk_user/cariProduk');?>
        <input type="hidden" name="category_id" value="<?php echo $res->category_id; ?>">
        <button class="btn btn-sm btn-primary">Cari Data</button>
        <?php echo form_close()?>
      </div>
    </div>
  </div>
  <?php } ?>
</div>

<?php echo form_open_multipart('kategori/cariKategoriUser');?>
<div class="modal fade" id="caridata" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Cari Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="nama_kategori" class="form-label">Nama Kategori</label>
          <input type="text" class="form-control" id="category_name" name="category_name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button class="btn btn-primary">Cari Data</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close()?>