 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MX_Controller {


	function __construct()
	{
		parent:: __construct();

		// load model
		$this->load->model('M_kategori');

    // check session login


	}


	function index()
	{
		// view
		$data = array(
			'namamodule' 	=> "kategori",
			'namafileview' 	=> "v_kategori",

			// variable
			'getKategori'=> $this->M_kategori->getKategori(),
		);
		echo Modules::run('template/tampilToko', $data);
	}

	function user()
	{
		// view
		$data = array(
			'namamodule' 	=> "kategori",
			'namafileview' 	=> "v_kategori_user",

			// variable
			'getKategori'=> $this->M_kategori->getKategori(),
		);
		echo Modules::run('template/tampilUser', $data);
	}

	// simpan
	function simpanKategori()
	{
		$this->M_kategori->insertKategori();
		// add session
		// $this->session->set_flashdata('msg', '<div class="alert alert-mint"><strong>Simpan Berhasil !</strong><p>Data berhasil disimpan ke dalam database pada tanggal '.date('d F Y H:i:s A').'</p></div>');
		$this->session->set_flashdata('kategori_tambah', 'Success message.');
		// redirect
		redirect('kategori');
	}

	// update
	function editKategori()
	{
		$this->M_kategori->updateKategori();
		// add session
		// $this->session->set_flashdata('msg', '<div class="alert alert-mint"><strong>Update Berhasil !</strong><p>Data berhasil diperbarui ke dalam database pada tanggal '.date('d F Y H:i:s A').'</p></div>');
		$this->session->set_flashdata('kategori_edit', 'Warning message.');
		// redirect
		redirect('kategori');
	}

	// delete
	function hapusKategori( $id )
	{
		$this->M_kategori->deleteKategori( $id );
		// add session
		//$this->session->set_flashdata('msg', '<div class="alert alert-mint"><strong>Hapus Berhasil !</strong><p>Data berhasil dihapus ke dalam database pada tanggal '.date('d F Y H:i:s A').'</p></div>');
		$this->session->set_flashdata('kategori_hapus', 'Danger message.');
		// redirect
		redirect('kategori');

	}

	function cariKategori()
	{
		// view
		$data = array(
			'namamodule' 	=> "kategori",
			'namafileview' 	=> "v_kategori",

			// variable
			'getKategori'=> $this->M_kategori->searchKategori(),
		);
		echo Modules::run('template/tampilToko', $data);

  }

  function cariKategoriUser()
  {
	  // view
	  $data = array(
		  'namamodule' 	=> "kategori",
		  'namafileview' 	=> "v_kategori_user",

		  // variable
		  'getKategori'=> $this->M_kategori->searchKategori(),
	  );
	  echo Modules::run('template/tampilUser', $data);

}

	// Search

}
