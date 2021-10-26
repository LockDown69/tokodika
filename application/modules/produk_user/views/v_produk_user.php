<title>TOKODIKA | Produk Rekomendasi</title>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Katalog Produk</h1>
  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
          <div class="btn-group me-2" role="group" aria-label="First group">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#caridata">
        Cari
      </button>
          </div>
          <div class="btn-group me-2" role="group" aria-label="Second group">
          <a href="<?php echo base_url('produk_user'); ?>"><button class="btn btn-primary" >
    Kembali
  </button></a>
          </div>
        </div>
</div>

<div class="row">
      <?php foreach( $joinProduk->result() as $res ){ ?>
      <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
          <img class="card-img-top" width="100%" height="225"
            src="<?php echo base_url()?>assets/img/<?php echo $res->product_image ?>">

          <div class="card-body">
            <h5 class="card-title">
              <?php echo $res->product_name; ?>
            </h5>
            <p class="card-text">
              <?php echo substr($res->product_description,0,128);?>
            </p>
            <p class="card-text"><button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                data-bs-target="#viewdata<?php echo $res->product_id;?>">
                Data Lengkap</button></p>
          </div>
        </div>
      </div>


      <div class="modal fade" id="viewdata<?php echo $res->product_id;?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="bd-example">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <?= $res->nama_kategori ?>
                  </li>
                  <li class="list-group-item">
                    <?= $res->nama_merk ?>
                  </li>
                  <li class="list-group-item">
                    Rp<?php echo number_format($res->product_price,2,',','.'); ?>
                  </li>
                  <li class="list-group-item">
                    <?= $res->product_description; ?>
                  </li>
                </ul>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <?php } ?>
    </div>

    <?php echo form_open_multipart('produk_user/cariProduk');?>
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
            <label for="nama_kategori" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="product_name" name="product_name">
          </div>
          <div class="mb-3">
            <label for="category_id" class="form-label">Nama Kategori</label>
            <select id="category_id" name="category_id" class="form-select">
              <?php foreach ($getKategori ->result() as $kategori){?>
              <option value="<?php echo $kategori->category_id;?>">
                <?php echo $kategori->category_name; ?>
              </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="merk_id" class="form-label">Nama Merk</label>
            <select id="merk_id" name="merk_id" class="form-select">
              <?php foreach ($getMerk ->result() as $merk){?>
              <option value="<?php echo $merk->merk_id;?>">
                <?php echo $merk->merk_name; ?>
              </option>
              <?php
              }
              ?>
            </select>
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