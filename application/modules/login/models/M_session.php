<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_session extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function store_session($getId){

		$this->session->set_userdata('session_id', $getId);
	}

	function store_id($id){

		$this->session->set_userdata('grup_id', $id);
	}


	function getCek()
	{
		$this->db->select('*')
				 ->from('user');
		$query = $this->db->get();
		return $query;
	}

	function getCek2($id)
	{
		$this->db->select('*')
				 ->from('user')
				 ->where('id_user',$id);
		$query = $this->db->get();
		return $query;
	}


	function destroy_session(){

	}
}
?>
