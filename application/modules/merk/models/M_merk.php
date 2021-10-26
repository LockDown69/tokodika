<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_merk extends CI_Model {



	// get data akun
	function getMerk()
	{
		$this->db->select('*')
				 ->from('merk');
		$query = $this->db->get();
		return $query;
	}


	//
	function insertMerk()
		{
			$merk_name = $this->input->post('merk_name');

		  
			$this->load->library('upload');
			$nmfile ="$merk_name"."_".time();
			$config['upload_path'] = 'assets/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '5120';
			$config['max_width'] = '4300';
			$config['max_height'] = '4300';
			$config['file_name'] = $nmfile;
	
			$this->upload->initialize($config);
	
			if($_FILES['merk_image']['name'])
			{
				if ($this->upload->do_upload('merk_image'))
				{
						$gbr = $this->upload->data();
						$data = array (
							'merk_name'	=>$merk_name,
							'merk_image' =>$gbr['file_name'],
						);
	
						$this->db->insert('merk', $data);
	
				}
			}
			else{
				$gbr = $this->upload->data();
				$data = array (
					'merk_name'	=>$merk_name,
					'merk_image' =>'assets/img/icon-kategori.png',

				);
				$this->db->insert('merk', $data);
			}
		}

	function updateMerk()
	{
		$id   = $this->input->post('id');
		$merk_name = $this->input->post('merk_name');

		  
			$this->load->library('upload');
			$nmfile ="$merk_name"."_".time();
			$config['upload_path'] = 'assets/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '5120';
			$config['max_width'] = '4300';
			$config['max_height'] = '4300';
			$config['file_name'] = $nmfile;
	
			$this->upload->initialize($config);
	
			if($_FILES['merk_image']['name'])
			{
				if ($this->upload->do_upload('merk_image'))
				{
						$gbr = $this->upload->data();
						$data = array (
							'merk_name'	=>$merk_name,
							'merk_image' =>$gbr['file_name'],
						);
	
						$this->db->where('merk_id', $id)->update('merk', $data);
	
				}
			}
			else{
				$gbr = $this->upload->data();
				$data = array (
					'merk_name'	=>$merk_name,

				);
				$this->db->where('merk_id', $id)->update('merk', $data);
			}
	}


	function deleteMerk( $id )
	{
		// query
		$this->db->where('merk_id', $id)->delete('merk');

	}

	function searchMerk()
	{
		$merk_name 	= $this->input->post('merk_name');

		$this->db->select('*')
				 ->from('merk')
				 ->like('merk_name', $merk_name);
		$query = $this->db->get();
		return $query;
	}


}
