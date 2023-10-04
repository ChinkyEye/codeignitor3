<?php 
class User_model extends CI_model{
	public function users()
	{
		$users = $this->db->get('users')->result_array();
		return $users;
	}

}

?>