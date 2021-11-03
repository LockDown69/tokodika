<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		//load model

		$this->load->model('M_template');
	}

	// view core templating
	public function index()
	{
        
		$this->load->view('view_template_toko');
	}

	public function tampilToko($data)
	{
		$this->load->view('view_template_toko',$data);
	}


	public function tampilRegister($data)
	{

		$this->load->view('view_template_register',$data);
	}

	public function tampilUser($data)
	{

		$this->load->view('view_template_user',$data);
	}

	public function tampilRekomendasi($data)
	{

		$this->load->view('view_template_rekomendasi',$data);
	}

	


}
