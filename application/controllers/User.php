<?php
class User extends CI_Controller
{
	public function index()
	{
		$this->load->model('User_model');
		$user = $this->User_model->users();
		
		$data = [];
		$data['user'] = $user;
		$this->load->view('user',$data);
	}

}
?>