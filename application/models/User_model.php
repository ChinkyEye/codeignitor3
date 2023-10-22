<?php 
class User_model extends CI_model{
	public function users()
	{
		$users = $this->db->get('users')->result_array();
		return $users;
	}

	public function create($formArray)
	{
		$users = $this->db->insert('users',$formArray);
	}

	public function getUser($id)
	{
		$users = $this->db->where('id',$id)->get('users')->row_array();
		return $users;
	}

	public function update($id,$formArray)
	{
		$users = $this->db->where('id',$id)->update('users',$formArray);
	}

	public function delete($id)
	{
		$users = $this->db->where('id',$id)->delete('users');
	}


}

?>