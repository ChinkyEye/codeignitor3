<?php 
class Admin_model extends CI_model{

	public function getByUsername($username)
	{
		$admins = $this->db->where('username',$username)->get('admins')->result_array();
		return $admins;
	}

}

?>