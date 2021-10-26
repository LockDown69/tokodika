<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_master_userid extends CI_Model {

	public function __construct(){
		parent::__construct();
    }

	// for checking credential
	function getCredential($varusername, $varPassword)
	{
		$getField = array('username' => $varusername, 'password' => $varPassword);

		$query = $this->db->get_where('user', $getField);

		return $query->row();
	}

}
?>
