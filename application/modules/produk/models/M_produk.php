<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {



	// get data akun
	function getProduk()
	{
		$this->db->select('*')
				 ->from('product');
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

	function getMerk()
	{
		$this->db->select('*')
				 ->from('merk');
		$query = $this->db->get();
		return $query;
	}


	function joinProduk()
	{ 
	  $this->db->select('product.*, category.category_name as nama_kategori, merk.merk_name as nama_merk')
			   ->from('product')
			   ->join('category','product.category_id = category.category_id')
			   ->join('merk','product.merk_id = merk.merk_id');
	$query = $this->db->get();
   
	  return $query;
   }


	//
	function insertProduk()
		{
			$category_id = $this->input->post('category_id');
			$merk_id = $this->input->post('merk_id');
			$product_name = $this->input->post('product_name');
			$product_price = $this->input->post('product_price');
			$product_description = $this->input->post('product_description');
			$product_status = $this->input->post('product_status');
		  
			$this->load->library('upload');
			$nmfile ="$product_name"."_".time();
			$config['upload_path'] = 'assets/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '5120';
			$config['max_width'] = '4300';
			$config['max_height'] = '4300';
			$config['file_name'] = $nmfile;
	
			$this->upload->initialize($config);
	
			if($_FILES['product_image']['name'])
			{
				if ($this->upload->do_upload('product_image'))
				{
						$gbr = $this->upload->data();
						$data = array (
							'category_id'	=>$category_id,
							'merk_id'	=>$merk_id,
							'product_name'	=>$product_name,
							'product_price'	=>$product_price,
							'product_description'	=>$product_description,
							'product_image' =>$gbr['file_name'],
							'product_status' =>$product_status,
						);
	
						$this->db->insert('product', $data);
	
				}
			}
			else{
				$gbr = $this->upload->data();
				$data = array (
					'category_id'	=>$category_id,
					'merk_id'	=>$merk_id,
					'product_name'	=>$product_name,
					'product_price'	=>$product_price,
					'product_description'	=>$product_description,
					'product_image' =>'assets/img/icon-kategori.png',
					'product_status' =>$product_status,
				);
				$this->db->insert('product', $data);
			}
		}

		function updateProduk()
		{
			$id 	= $this->input->post('id');
			$category_id = $this->input->post('category_id');
			$merk_id = $this->input->post('merk_id');
			$product_name = $this->input->post('product_name');
			$product_price = $this->input->post('product_price');
			$product_description = $this->input->post('product_description');
			$product_status = $this->input->post('product_status');
			
			$this->load->library('upload');
			$nmfile ="$product_name"."_".time();
			$config['upload_path'] = 'assets/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '5120';
			$config['max_width'] = '4300';
			$config['max_height'] = '4300';
			$config['file_name'] = $nmfile;
	
			$this->upload->initialize($config);
	
			if($_FILES['product_image']['name'])
			{
				if ($this->upload->do_upload('product_image'))
				{
						$gbr = $this->upload->data();
						$data = array (
							'category_id'	=>$category_id,
							'merk_id'	=>$merk_id,
							'product_name'	=>$product_name,
							'product_price'	=>$category_name,
							'product_description'	=>$product_description,
							'product_image' =>$gbr['file_name'],
							'product_status'	=>$product_status,
						);
	
						$this->db->where('product_id', $id)->update('product', $data);
	
				}
			}
			else{
				$gbr = $this->upload->data();
				$data = array (
					'category_id'	=>$category_id,
					'merk_id'	=>$merk_id,
					'product_name'	=>$product_name,
					'product_price'	=>$category_name,
					'product_description'	=>$product_description,
					// 'product_image' =>$gbr['file_name'],
					'product_status'	=>$product_status,
				);
				$this->db->where('product_id', $id)->update('product', $data);
			}

			
		}
		
	

	function deleteProduk( $id )
	{
		// query
		$this->db->where('product_id', $id)->delete('product');

	}

	function searchProduk()
	{
		$product_name 	= $this->input->post('product_name');
		$category_id 	= $this->input->post('category_id');
		$merk_id 	= $this->input->post('merk_id');
		
		$this->db->select('product.*, category.category_name as nama_kategori, merk.merk_name as nama_merk')
				 ->from('product')
				 ->join('category','product.category_id = category.category_id')
				 ->join('merk','product.merk_id = merk.merk_id')
				 ->like('product.product_name', $product_name)
				 ->like('product.category_id', $category_id)
				 ->like('product.merk_id', $merk_id);
		$query = $this->db->get();
		return $query;
	}


}
