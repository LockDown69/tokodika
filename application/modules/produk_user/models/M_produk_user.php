<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk_user extends CI_Model {



	// get data akun
	function getProduk()
	{
		$this->db->select('*')
				 ->from('product');
		$query = $this->db->get();
		return $query;
	}

	function getProdukRekomendasi()
	{
		$this->db->select('*')
				 ->from('product')
				 ->where('level = 1');
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

   function joinProdukRekomendasi()
   { 
	$this->db->select('product.*, category.category_name as nama_kategori, merk.merk_name as nama_merk')
			 ->from('product')
			 ->join('category','product.category_id = category.category_id')
			 ->join('merk','product.merk_id = merk.merk_id')
			 ->where('product.product_status = 1');
   $query = $this->db->get();
  
	 return $query;
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

   function searchProdukRekomendasi()
   {
	$product_name 	= $this->input->post('product_name');
	$category_id 	= $this->input->post('category_id');
	$merk_id 	= $this->input->post('merk_id');
	
	$this->db->select('product.*, category.category_name as nama_kategori, merk.merk_name as nama_merk')
			 ->from('product')
			 ->join('category','product.category_id = category.category_id')
			 ->join('merk','product.merk_id = merk.merk_id')
			 ->where('product.product_status = 1')
			 ->like('product.product_name', $product_name)
			 ->like('product.category_id', $category_id)
			 ->like('product.merk_id', $merk_id);
	$query = $this->db->get();
	return $query;
   }

}
