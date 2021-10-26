<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {



	// get data akun
	function getProfile($id_user)
	{
		$this->db->select('*')
				 ->from('user')
				 ->where('id_user',$id_user);
		$query = $this->db->get();
		return $query;
	}

	function getUser($id_user)
	{
		$this->db->select('*')
				 ->from('user')
				 ->where('id_user',$id_user);
		$query = $this->db->get();
		return $query;
	}

	function getKategori()
	{
		$this->db->select('*')
				 ->from('category');
		$query = $this->db->get();
		return $query;
	}

	function updateProfile()
	{
		$id = $this->input->post("id");
		$username 	= $this->input->post('username');
		$user_email 	= $this->input->post('user_email');
		$user_name 	= $this->input->post('user_name');
		$user_address 	= $this->input->post('user_address');
		$user_telp 	= $this->input->post('user_telp');
		// $level = $this->input->post('level');

		$data = array (
			'username'	=>$username,
			'user_email' =>$user_email,
			'user_name' =>$user_name,
			'user_address' =>$user_address,
			'user_telp' =>$user_telp,
			'level' =>2,
		);
	
			// query
	
			$this->db->where('id_user', $id)->update('user', $data);	
	}

	function updateProfilePetugas()
	{
		$id = $this->input->post("id");
		$username 	= $this->input->post('username');
		$nama 	= $this->input->post('nama');
		$alamat 	= $this->input->post('alamat');
		$no_tlp 	= $this->input->post('no_tlp');
		// $level = $this->input->post('level');

		$data = array (
			'username'	=>$username,
			'nama' =>$nama,
			'alamat' =>$alamat,
			'no_tlp' =>$no_tlp,
			'level' =>2,
		);
	
			// query
	
			$this->db->where('id_user', $id)->update('user', $data);	
	}

	function deletePaket( $id )
	{
		// query
		$this->db->where('id_paket', $id)->delete('paket');

	}


}
