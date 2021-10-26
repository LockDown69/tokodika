<title>TOKODIKA | Produk</title>

<?php if ($this->session->flashdata('produk_tambah')) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data Produk berhasil ditambah
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php if ($this->session->flashdata('produk_edit')) { ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Data Produk berhasil diedit
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php if ( $this->session->flashdata('produk_hapus')) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Data Produk berhasil dihapus
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Produk</h1>
  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

    <div class="btn-group me-2" role="group" aria-label="Third group">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata">
        Tambah Data
      </button>
    </div>
    <div class="btn-group me-2" role="group" aria-label="First group">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#caridata">
        Cari
      </button>
    </div>
    <div class="btn-group me-2" role="group" aria-label="Second group">
      <a href="<?php echo base_url('produk'); ?>"><button class="btn btn-primary">
          Kembali
        </button></a>
    </div>
  </div>
</div>


<article class="my-3" id="tables">

  <div>
    <div class="bd-example">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nama Produk</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Nama Merk</th>
            <th scope="col">Harga Produk</th>
            <th scope="col">Deskripsi Produk</th>
            <th scope="col">Rekomendasi</th>
            <th scope="col">Gambar Produk</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $joinProduk->result() as $res ){ ?>
          <tr>
            <td>
              <?php echo $res->product_name; ?>
            </td>
            <td>
              <?php echo $res->nama_kategori; ?>
            </td>
            <td>
              <?php echo $res->nama_merk; ?>
            </td>
            <td>
              <?php echo number_format($res->product_price,2,',','.'); ?>
            </td>
            <td>
              <?php echo $res->product_description; ?>
            </td>
            <td>
              <?php if($res->product_status == 1) { ?>
              Rekomendasi</span>
              <?php }else{ ?>
              Tidak Rekomendasi</span>
              <?php } ?>
            </td>
            <td><img width="100" height="100" src="<?php echo base_url()?>assets/img/<?php echo $res->product_image ?>">
            <td>
              <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                data-bs-target="#editdata<?php echo $res->product_id;?>">
                Edit</button>
              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                data-bs-target="#hapusdata<?php echo $res->product_id;?>">
                Hapus</button>
            </td>
          </tr>

          <div class="modal fade" id="hapusdata<?php echo $res->product_id; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <p>Apakah anda yakin ingin menghapus data produk <b>
                      <?php echo $res->product_name ?>
                    </b> ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <a class="btn btn-danger btn-rounded"
                    href="<?php echo base_url('produk/hapusProduk/'. $res->product_id) ?>">Hapus Data!!</a>
                </div>
              </div>
            </div>
          </div>

          <?php echo form_open_multipart('produk/editProduct');?>
          <div class="modal fade" id="editdata<?php echo $res->product_id;?>" tabindex="-1"
            aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Edit Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" value="<?php echo $res->product_id; ?>" />
                  <div class="mb-3">
                    <label for="product_name" class="form-label">Nama Product</label>
                    <input type="text" class="form-control" id="product_name" name="product_name"
                      value="<?php echo $res->product_name?>">
                  </div>
                  <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori Produk</label>
                    <select id="category_id" name="category_id" class="form-select">
                      <?php foreach ($getKategori ->result() as $kategori){
                         if ($kategori->category_id== $res->category_id){
                          echo "<option selected = 'selected' value='".$kategori->category_id."'>".$kategori->category_name."</option>";
                         }else{
                          echo "<option value='".$kategori->category_id."'>".$kategori->category_name."</option>";
                         }
                        }?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="merk_id" class="form-label">Nama Merk</label>
                    <select id="merk_id" name="merk_id" class="form-select">
                      <?php foreach ($getMerk ->result() as $merk){
                         if ($merk->merk_id== $res->merk_id){
                          echo "<option selected = 'selected' value='".$merk->merk_id."'>".$merk->merk_name."</option>";
                         }else{
                          echo "<option value='".$merk->merk_id."'>".$merk->merk_name."</option>";
                         }
                        }?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="product_price" class="form-label">Harga Produk</label>
                    <input type="number" class="form-control" id="product_price" name="product_price"
                      value="<?php echo $res->product_price?>">
                  </div>
                  <div class="mb-3">
                    <label class="control-label">Deskripsi Produk</label>
                    <textarea name="product_description" rows="3"
                      class="form-control"><?php echo $res->product_description ?></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="product_status" class="form-label">Produk Rekomendasi</label>
                    <select id="product_status" name="product_status" class="form-select">
                      <?php
             if($res->product_status=='1'){ ?>
                      <option selected="selected" value="1">Aktif</option>
                      <option value="0"> Tidak Aktif</option>
                      <?php }
           else{?>
                      <option selected="selected" value="0">Tidak Aktif</option>
                      <option value="1">Aktif</option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="" class="control-label">Gambar Barang</label><span class="red">*</span>
                    <input type="file" value="<?php echo $res->product_image; ?>" name="product_image" id="userfile"
                      onchange="tampilkanPreview1(this,'preview1')" />
                    <p class="help-block">
                      <?php //cek file apakah kosong?
                              if (empty($res->product_image)) {
                                echo 'Belum Ada File Gambar Pada Item : ';
                              }else{
                                echo 'Gambar Saat Ini : ';
                              }?>
                    </p>
                  </div>
                  <div class="mb-3">
                    <img src="<?php echo base_url()?>assets/img/<?php echo $res->product_image ?>" id="preview1"
                      width="200px" height="200px" />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close()?>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>

  <?php echo form_open_multipart('produk/simpanProduct');?>
  <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Modal Simpan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="product_name" class="form-label">Nama Product</label>
            <input type="text" required class="form-control" id="product_name" name="product_name">
          </div>
          <div class="mb-3">
            <label for="category_id" class="form-label">Kategori Produk</label>
            <select id="category_id" required name="category_id" class="form-select">
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
            <select id="merk_id" required name="merk_id" class="form-select">
              <?php foreach ($getMerk ->result() as $merk){?>
              <option value="<?php echo $merk->merk_id;?>">
                <?php echo $merk->merk_name; ?>
              </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="product_price" class="form-label">Harga Produk</label>
            <input type="number" required class="form-control" id="product_price" name="product_price">
          </div>
          <div class="mb-3">
            <label class="control-label">Deskripsi Produk</label>
            <textarea name="product_description" required rows="3" class="form-control"></textarea>
          </div>
          <div class="mb-3">
            <label for="product_status" class="form-label">Jadikan Rekomendasi</label>
            <select id="product_status" required name="product_status" class="form-select">
              <option selected="selected" value="1">Rekomendasi</option>
              <option value="0">Tidak Rekomendasi</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="control-label">Foto Gambar</label><span class="red">*</span>
            <input type="file" required name="product_image" id="userfile"
              onchange="tampilkanPreview(this,'preview')" />
          </div>
          <div class="mb-3">
            <label for="" class="control-label">Preview Gambar Produk</label>
            <img id="preview" width="150px" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close()?>

  <?php echo form_open_multipart('produk/cariProduk');?>
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

  <script type="text/javascript">

    function tampilkanPreview(userfile, idpreview) {
      var gb = userfile.files;
      for (var i = 0; i < gb.length; i++) {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview = document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType)) {
          //jika tipe data sesuai
          preview.file = gbPreview;
          reader.onload = (function (element) {
            return function (e) {
              element.src = e.target.result;
            };
          })(preview);
          //membaca data URL gambar
          reader.readAsDataURL(gbPreview);
        }
        else {
          //jika tipe data tidak sesuai
          alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
        }
      }
    }
    function tampilkanPreview1(userfile, idpreview1) {
      var gb = userfile.files;
      for (var i = 0; i < gb.length; i++) {
        var gbPreview1 = gb[i];
        var imageType = /image.*/;
        var preview1 = document.getElementById(idpreview1);
        var reader = new FileReader();
        if (gbPreview1.type.match(imageType)) {
          //jika tipe data sesuai
          preview1.file = gbPreview1;
          reader.onload = (function (element) {
            return function (e) {
              element.src = e.target.result;
            };
          })(preview1);
          //membaca data URL gambar
          reader.readAsDataURL(gbPreview1);
        }
        else {
          //jika tipe data tidak sesuai
          alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
        }
      }
    }
  </script>

</article>