<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {


	function __construct()
	{
		parent:: __construct();

		//get model
		$this->load->model('M_master_userid');
		$this->load->model('M_session');
		$this->load->model('M_register');
		$this->load->library('session');
		// $this->load->model('M_register');

	}

	public function index()
	{
		// blm login
		if ( empty( $this->session->userdata('session_id') ) )
		{
			$this->load->view('v_login');
		} else {

			// sudah login
			redirect('transaksi');
		}
	}

	//login proses
	function proses_login()
	{
		// POST
		$getUsername = $this->input->post('username');
		$getPassword = $this->input->post('password');
		// Get Data
		$getData = $this->M_master_userid->getCredential($getUsername, md5($getPassword));

		// check
		if ( ! empty($getData) )
		{
			// masukan ke  dalam session
			// $this->M_session->store_session( $getData->id_user );
			$this->session->set_userdata([
				'id_user' => $getData->id_user
			]);
			// flashdata
			$this->session->set_flashdata('msg', 'greeting');

			$id = $getData->id_user;

			$login = $this->M_session->getCek2($id);

			foreach ($login->result() as $res)
			{
				$level = intval($res->level);
			}

			// die(var_dump($cek, $status));
			if($level === 1){
				redirect('produk_user/produkRekomendasi');
			}else{
				redirect('profile');
			}
			redirect('produk_user/produkRekomendasi');
		} else { // gagal login

			$this->session->set_flashdata('msg', 'loginError');
			redirect('login');
		}

	}

	// function logout
	function logoutApp()
	{
		$this->session->unset_userdata('session_id');

		$this->session->set_flashdata('msg', 'logoutAplikasi');
		// redirect
		redirect('login');
	}

	function registerUser(){
			// view
			$data = array(
				'namamodule' 	=> "login",
				'namafileview' 	=> "v_register",
	
				// variable
				'getLogin'=> $this->M_register->getLogin(),
			);
			echo Modules::run('template/tampilRegister', $data);
	}

	
	function simpanRegisterUser()
	{
		$this->M_register->insertDataregisterUser();
		// add session
		$this->session->set_flashdata('msg', '<div class="alert alert-mint"><strong>Simpan Berhasil !</strong><p>Data berhasil disimpan ke dalam database pada tanggal '.date('d F Y H:i:s A').'</p></div>');
	
		// redirect
		redirect('login');
	}



}
