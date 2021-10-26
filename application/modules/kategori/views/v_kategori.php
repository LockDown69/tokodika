<title>TOKODIKA | Kategori</title>

<?php if ($this->session->flashdata('kategori_tambah')) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data Kategori berhasil ditambah
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php if ($this->session->flashdata('kategori_edit')) { ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Data Kategori berhasil diedit
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php if ( $this->session->flashdata('kategori_hapus')) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Data Kategori berhasil dihapus
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pengaturan Kategori</h1>
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
      <a href="<?php echo base_url('category'); ?>"><button class="btn btn-primary">
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
            <th scope="col">Nama Kategori</th>
            <th scope="col">Gambar Kategori</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $getKategori->result() as $res ){ ?>
          <tr>
            <td>
              <?php echo $res->category_name; ?>
            </td>
            <td><img width="100" height="100" src="<?php echo base_url()?>assets/img/<?php echo $res->category_image ?>">
            <td>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                data-bs-target="#editdata<?php echo $res->category_id;?>">
                &nbsp; Edit data</break>
              </button>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#hapusdata<?php echo $res->category_id;?>">
                &nbsp; Hapus Data
              </button>
            </td>
          </tr>

          <div class="modal fade" id="hapusdata<?php echo $res->category_id; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <p>Apakah anda yakin ingin menghapus data paket <b>
                      <?php echo $res->category_name ?>
                    </b> ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <a class="btn btn-danger btn-rounded"
                    href="<?php echo base_url('kategori/hapusKategori/'. $res->category_id) ?>">Hapus Data!!</a>
                </div>
              </div>
            </div>
          </div>

          <?php echo form_open_multipart('kategori/editKategori');?>
          <div class="modal fade" id="editdata<?php echo $res->category_id;?>" tabindex="-1"
            aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Edit Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <input type="hidden" name="id" value="<?php echo $res->category_id; ?>" />
                  <div class="mb-3">
                    <label for="category_name" class="form-label">Nama</label>
                    <input type="text" required class="form-control" id="category_name" name="category_name"
                      value="<?php echo $res->category_name;?>">
                  </div>
                  <div class="mb-3">
          <label for="" class="control-label">Gambar Barang</label><span class="red">*</span>
                           <input  type="file" value="<?php echo $res->category_image; ?>" name="category_image" id="userfile"  onchange="tampilkanPreview1(this,'preview1')"/>
                           <p class="help-block">
                              <?php //cek file apakah kosong?
                              if (empty($res->category_image)) {
                                echo 'Belum Ada File Gambar Pada Item : ';
                              }else{
                                echo 'Gambar Saat Ini : ';
                              }?>
                            </p>
          </div>
          <div class="mb-3">
             <img src="<?php echo base_url()?>assets/img/<?php echo $res->category_image ?>" id="preview1" width="200px" height="200px"/>
          </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button class="btn btn-primary">Edit Data</button>
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
  <?php echo form_open_multipart('kategori/simpanKategori');?>
  <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Simpan Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="category_name" class="form-label">Nama Kategori</label>
            <input type="text" required class="form-control" id="category_name" name="category_name">
          </div>
          <div class="mb-3">
            <label for="" class="control-label">Gambar Kategori</label><span class="red">*</span>
            <input type="file" required name="category_image" id="userfile" onchange="tampilkanPreview(this,'preview')" />
          </div>
          <div class="mb-3">
            <label for="" class="control-label">Preview Gambar Kategori</label>
            <img id="preview" width="150px" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button class="btn btn-primary">Simpan Data</button>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close()?>

  <?php echo form_open_multipart('kategori/cariKategori');?>
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