<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_welcome extends CI_Model
{
	public function aku()
	{
		$this->db->select('*')
				 ->from('tb_akun')
				 ->order_by('nama_akun', 'DESC');
		$query = $this->db->get();
		return $query;
	}
}
?>
