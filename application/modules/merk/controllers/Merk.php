 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends MX_Controller {


	function __construct()
	{
		parent:: __construct();

		// load model
		$this->load->model('M_merk');

    // check session login


	}


	function index()
	{
		// view
		$data = array(
			'namamodule' 	=> "merk",
			'namafileview' 	=> "v_merk",

			// variable
			'getMerk'=> $this->M_merk->getMerk(),
		);
		echo Modules::run('template/tampilToko', $data);
	}

	function user()
	{
		// view
		$data = array(
			'namamodule' 	=> "merk",
			'namafileview' 	=> "v_merk_user",

			// variable
			'getMerk'=> $this->M_merk->getMerk(),
		);
		echo Modules::run('template/tampilUser', $data);
	}

	// simpan
	function simpanMerk()
	{
		$this->M_merk->insertMerk();
		
		$this->session->set_flashdata('merk_tambah', 'Success message.');
		// redirect
		redirect('merk');
	}

	// update
	function editMerk()
	{
		$this->M_merk->updateMerk();
		
		$this->session->set_flashdata('merk_edit', 'Warning message.');
		// redirect
		redirect('merk');
	}

	// delete
	function hapusMerk( $id )
	{
		$this->M_merk->deleteMerk( $id );
		
		$this->session->set_flashdata('merk_hapus', 'Danger message.');
		// redirect
		redirect('merk');

	}

	function cariMerk()
	{
		// view
		$data = array(
			'namamodule' 	=> "merk",
			'namafileview' 	=> "v_merk",

			// variable
			'getMerk'=> $this->M_merk->searchMerk(),
		);
		echo Modules::run('template/tampilToko', $data);

  }

  function cariMerkUser()
  {
	  // view
	  $data = array(
		'namamodule' 	=> "merk",
		'namafileview' 	=> "v_merk_user",

		// variable
		'getMerk'=> $this->M_merk->searchMerk(),
	);
	  echo Modules::run('template/tampilUser', $data);

}

	// Search

}
