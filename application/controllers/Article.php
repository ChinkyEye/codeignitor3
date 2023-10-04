<?php
class Article extends CI_Controller
{
	public function index()
	{
		$this->load->model('Article_model');
		$articles = $this->Article_model->articles();
		$user = $this->Article_model->getuser();

		// echo "<pre>";
		// print_r($user);
		// echo "<pre>";
		
		$data = [];
		$data['nam']= 'milan';
		$data['address'] = 'kerabari';
		$data['article'] = $articles;
		$data['user'] = $user;
		$this->load->view('test',$data);
	}

	public function demo()
	{
		echo "Hello Everyone from demo function";
	}
}
?>