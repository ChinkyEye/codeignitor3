<?php 
class Article_model extends CI_model{
	public function articles()
	{
		$articles = $this->db->get('articles')->result_array();
		return $articles;
	}

	public function getuser(){
		// $this->db->select('id,name');
		// $this->db->where('id',2);
		// $users = $this->db->get('users')->result_array();
		// $users = $this->db->select('id,name')->where('id',2)->get('users')->result_array();
		$users = $this->db->query("SELECT * FROM users")->result_array();
		return $users;
	}
}

?>