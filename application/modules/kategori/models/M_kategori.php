<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {



	// get data akun
	function getKategori()
	{
		$this->db->select('*')
				 ->from('category');
		$query = $this->db->get();
		return $query;
	}


	//
	function insertKategori()
		{
			$category_name = $this->input->post('category_name');

		  
			$this->load->library('upload');
			$nmfile ="$category_name"."_".time();
			$config['upload_path'] = 'assets/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '5120';
			$config['max_width'] = '4300';
			$config['max_height'] = '4300';
			$config['file_name'] = $nmfile;
	
			$this->upload->initialize($config);
	
			if($_FILES['category_image']['name'])
			{
				if ($this->upload->do_upload('category_image'))
				{
						$gbr = $this->upload->data();
						$data = array (
							'category_name'	=>$category_name,
							'category_image' =>$gbr['file_name'],
						);
	
						$this->db->insert('category', $data);
	
				}
			}
			else{
				$gbr = $this->upload->data();
				$data = array (
					'category_name'	=>$category_name,
					'category_image' =>'assets/img/icon-kategori.png',

				);
				$this->db->insert('category', $data);
			}
		}

	function updateKategori()
	{
		$id   = $this->input->post('id');
		$category_name = $this->input->post('category_name');

		  
			$this->load->library('upload');
			$nmfile ="$category_name"."_".time();
			$config['upload_path'] = 'assets/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '5120';
			$config['max_width'] = '4300';
			$config['max_height'] = '4300';
			$config['file_name'] = $nmfile;
	
			$this->upload->initialize($config);
	
			if($_FILES['category_image']['name'])
			{
				if ($this->upload->do_upload('category_image'))
				{
						$gbr = $this->upload->data();
						$data = array (
							'category_name'	=>$category_name,
							'category_image' =>$gbr['file_name'],
						);
	
						$this->db->where('category_id', $id)->update('category', $data);
	
				}
			}
			else{
				$gbr = $this->upload->data();
				$data = array (
					'category_name'	=>$category_name,
					// 'category_image' =>'assets/img/icon-kategori.png',

				);
				$this->db->where('category_id', $id)->update('category', $data);
			}
	}


	function deleteKategorI( $id )
	{
		// query
		$this->db->where('category_id', $id)->delete('category');

	}

	function searchKategori()
	{
		$category_name 	= $this->input->post('category_name');

		$this->db->select('*')
				 ->from('category')
				 ->like('category_name', $category_name);
		$query = $this->db->get();
		return $query;
	}


}
