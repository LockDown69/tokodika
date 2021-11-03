 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_user extends MX_Controller {


	function __construct()
	{
		parent:: __construct();

		// load model
				$this->load->model('login/M_master_userid');
		$this->load->model('login/M_session');
		$this->load->model('M_produk_user');

    // check session login
	}

	function index()
	{
		// view
		$data = array(
			'namamodule' 	=> "produk_user",
			'namafileview' 	=> "v_produk_user",

			'getProduk'=> $this->M_produk_user->getProduk(),
			'getMerk'=> $this->M_produk_user->getMerk(),
			'getKategori'=> $this->M_produk_user->getKategori(),
			'joinProduk'=> $this->M_produk_user->joinProduk(),
		);
		echo Modules::run('template/tampilUser', $data);
	}

	function produkRekomendasi()
	{
		// view
		$data = array(
			'namamodule' 	=> "produk_user",
			'namafileview' 	=> "v_produk_rekomendasi",

			'getProduk'=> $this->M_produk_user->getProduk(),
			'getKategori'=> $this->M_produk_user->getKategori(),
			'getMerk'=> $this->M_produk_user->getMerk(),
			'joinProdukRekomendasi'=> $this->M_produk_user->joinProdukRekomendasi(),
		);
		echo Modules::run('template/tampilUser', $data);
	}

	function produkRekomendasiIndex()
	{
		// view
		$data = array(
			'namamodule' 	=> "produk_user",
			'namafileview' 	=> "v_produk_index",

			'getProduk'=> $this->M_produk_user->getProduk(),
			'getKategori'=> $this->M_produk_user->getKategori(),
			'getMerk'=> $this->M_produk_user->getMerk(),
			'joinProdukRekomendasi'=> $this->M_produk_user->joinProdukRekomendasi(),
		);
		echo Modules::run('template/tampilRekomendasi', $data);
	}


	function cariProduk()
	{
		// view
		$data = array(
			'namamodule' 	=> "produk_user",
			'namafileview' 	=> "v_produk_user",

			'getProduk'=> $this->M_produk_user->getProduk(),
			'getKategori'=> $this->M_produk_user->getKategori(),
			'getMerk'=> $this->M_produk_user->getMerk(),
			'joinProduk'=> $this->M_produk_user->searchProduk(),
		);
		echo Modules::run('template/tampilUser', $data);

  }

  function cariRekomendasi()
  {
	  // view
	  $data = array(
		  'namamodule' 	=> "produk_user",
		  'namafileview' 	=> "v_produk_rekomendasi",

		  'getProduk'=> $this->M_produk_user->getProduk(),
		  'getKategori'=> $this->M_produk_user->getKategori(),
		  'getMerk'=> $this->M_produk_user->getMerk(),
		  'joinProdukRekomendasi'=> $this->M_produk_user->searchProdukRekomendasi(),
	  );
	  echo Modules::run('template/tampilUser', $data);

}

function cariRekomendasiIndex()
{
	// view
	$data = array(
		'namamodule' 	=> "produk_user",
		'namafileview' 	=> "v_produk_index",

		'getProduk'=> $this->M_produk_user->getProduk(),
		'getKategori'=> $this->M_produk_user->getKategori(),
		'getMerk'=> $this->M_produk_user->getMerk(),
		'joinProdukRekomendasi'=> $this->M_produk_user->searchProdukRekomendasi(),
	);
	echo Modules::run('template/tampilRekomendasi', $data);

}

	// Search

}
