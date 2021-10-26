 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MX_Controller {


	function __construct()
	{
		parent:: __construct();

		// load model
		$this->load->model('M_produk');

    // check session login
	}

	function index()
	{
		// view
		$data = array(
			'namamodule' 	=> "produk",
			'namafileview' 	=> "v_produk",

			// variable
			'getProduk'=> $this->M_produk->getProduk(),
			'getKategori'=> $this->M_produk->getKategori(),
			'getMerk'=> $this->M_produk->getMerk(),
			'joinProduk'=> $this->M_produk->joinProduk(),
		);
		echo Modules::run('template/tampilToko', $data);
	}

	

	// simpan
	function simpanProduct()
	{
		$this->M_produk->insertProduk();
		// add session
		//$this->session->set_flashdata('msg', '<div class="alert alert-mint"><strong>Simpan Berhasil !</strong><p>Data berhasil disimpan ke dalam database pada tanggal '.date('d F Y H:i:s A').'</p></div>');
		$this->session->set_flashdata('produk_tambah', 'Success message.');
		// redirect
		redirect('produk');
	}

	function editProduct()
	{
		$this->M_produk->updateProduk();
		// add session
		// $this->session->set_flashdata('msg', '<div class="alert alert-mint"><strong>Simpan Berhasil !</strong><p>Data berhasil disimpan ke dalam database pada tanggal '.date('d F Y H:i:s A').'</p></div>');
		$this->session->set_flashdata('produk_edit', 'Warning message.');
		// redirect
		redirect('produk');
	}

	function editProductGambar()
	{
		$this->M_produk->updateProductGambar();
		// add session
		// $this->session->set_flashdata('msg', '<div class="alert alert-mint"><strong>Simpan Berhasil !</strong><p>Data berhasil disimpan ke dalam database pada tanggal '.date('d F Y H:i:s A').'</p></div>');
		$this->session->set_flashdata('produk_edit_gambar', 'Warning message.');
		// redirect
		redirect('produk');
	}

	// delete
	function hapusProduk( $id )
	{
		$this->M_produk->deleteProduk( $id );
		// add session
		// $this->session->set_flashdata('msg', '<div class="alert alert-mint"><strong>Hapus Berhasil !</strong><p>Data berhasil dihapus ke dalam database pada tanggal '.date('d F Y H:i:s A').'</p></div>');
		$this->session->set_flashdata('produk_hapus', 'Danger message.');
		// redirect
		redirect('produk');

	}

	function cariProduk()
	{
		// view
		$data = array(
			'namamodule' 	=> "produk",
			'namafileview' 	=> "v_produk",

			'getProduk'=> $this->M_produk->getProduk(),
			'getKategori'=> $this->M_produk->getKategori(),
			'joinProduk'=> $this->M_produk->searchProduk(),
		);
		echo Modules::run('template/tampilToko', $data);

  }

  function cariProdukRekomendasi()
  {
	  // view
	  $data = array(
		  'namamodule' 	=> "produk",
		  'namafileview' 	=> "v_produk",

		  'getProduk'=> $this->M_produk->getProduk(),
		  'getKategori'=> $this->M_produk->getKategori(),
		  'joinProduk'=> $this->M_produk->searchProduk(),
	  );
	  echo Modules::run('template/tampilToko', $data);

}

	// Search

}
