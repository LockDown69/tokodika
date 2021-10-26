<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {



	// get data akun
	function getLogin()
	{
		$this->db->select('*')
				 ->from('user');
		$query = $this->db->get();
		return $query;
	}

	//
	function insertDataregisterUser()
	{
		$user_name 	= $this->input->post('user_name');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$user_telp 	= $this->input->post('user_telp');
		$user_email 	= $this->input->post('user_email');
		$user_address 	= $this->input->post('user_address');
		// $level = $this->input->post('level');

		$data = array (
			'user_name' =>$user_name,
			'username'	=>$username,
			'password' =>md5($password),
			'user_telp'	=>$user_telp,
			'user_email'	=>$user_email,
			'user_address'	=>$user_address,
			'level' =>1,
		);

		$this->db->insert('user', $data);
	}

}
