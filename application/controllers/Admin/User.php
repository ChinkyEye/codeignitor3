<?php
class User extends CI_Controller
{
	public function index()
	{
		$this->load->model('User_model');
		$user = $this->User_model->users();
		$data = [];
		$data['user'] = $user;
		$this->load->view('admin/user/index',$data);
	}

	public function create()
	{
		$config = array(
			'upload_path' => "./public/uploads/user/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'encrypt_name' => TRUE,
			// 'overwrite' => TRUE,
			// 'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			// 'max_height' => "768",
			// 'max_width' => "1024"
		);
		$this->load->library('upload', $config);

		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');
		if($this->form_validation->run() == true)
		{
			if(!empty($_FILES['image']['name']))
			{
				if($this->upload->do_upload('image'))
				{
					$data = $this->upload->data();
					// print_r($data['file_name']); exit;

					$userArray['name'] = $this->input->post('name');
					$userArray['email'] = $this->input->post('email');
					$userArray['image'] = $data['file_name'];
					$user = $this->User_model->create($userArray);
					$this->session->set_flashdata('success',"User added successfully");
					redirect(base_url().'admin/user/index');
				}
				else
				{
					$error = $this->upload->display_errors('<p class="invalid-feedback">','</p>');
					$data['errorImageUpload'] = $error;
					$this->load->view('admin/user/create',$data);

				}
				// print_r($_FILES['image']['name']); exit;
			}else{
				$userArray['name'] = $this->input->post('name');
				$userArray['email'] = $this->input->post('email');
				$user = $this->User_model->create($userArray);
				$this->session->set_flashdata('success',"User added successfully");
				redirect(base_url().'admin/user/index');

			}


		}
		else{
			$this->load->view('admin/user/create');
		}
	}

	public function edit($id)
	{
		$this->load->model('User_model');
		$users = $this->User_model->getUser($id);
		// echo "<pre>";
		// print_r($users);
		if(empty($users))
		{
			$this->session->set_flashdata('error',"User not found");
			redirect(base_url().'admin/user/index');
		}

		$config = array(
			'upload_path' => "./public/uploads/user/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'encrypt_name' => TRUE,
			// 'overwrite' => TRUE,
			// 'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			// 'max_height' => "768",
			// 'max_width' => "1024"
		);
		$this->load->library('upload', $config);


		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');
		if($this->form_validation->run() == true)
		{
			if(!empty($_FILES['image']['name']))
			{
				if($this->upload->do_upload('image'))
				{
					$data = $this->upload->data();
					$userArray['name'] = $this->input->post('name');
					$userArray['email'] = $this->input->post('email');
					$userArray['image'] = $data['file_name'];
					$user = $this->User_model->update($id,$userArray);

					if(file_exists('./public/uploads/user/'.$users['image']))
					{
						unlink('./public/uploads/user/'.$users['image']);
					}	


					$this->session->set_flashdata('success',"User updated successfully");
					redirect(base_url().'admin/user/index');
				}
				else
				{
					$error = $this->upload->display_errors('<p class="invalid-feedback">','</p>');
					$data['errorImageUpload'] = $error;
					$data['users'] = $users;
					$this->load->view('admin/user/edit',$data);

				}
			}else{
				$userArray['name'] = $this->input->post('name');
				$userArray['email'] = $this->input->post('email');
				$user = $this->User_model->update($id,$userArray);
				$this->session->set_flashdata('success',"User updated successfully");
				redirect(base_url().'admin/user/index');

			}

			// $userArray['name'] = $this->input->post('name');
			// $userArray['email'] = $this->input->post('email');
			// $user = $this->User_model->update($id,$userArray);
			// $this->session->set_flashdata('success',"User updated successfully");
			// redirect(base_url().'admin/user/index');


		}
		else{
			$data['users'] = $users;
			$this->load->view('admin/user/edit',$data);
		}


	}

	public function delete($id)
	{
		$this->load->model('User_model');
		$users = $this->User_model->getUser($id);
		if(empty($users))
		{
			$this->session->set_flashdata('error',"User not found");
			redirect(base_url().'admin/user/index');
		}
		if(file_exists('./public/uploads/user/'.$users['image']))
		{
			unlink('./public/uploads/user/'.$users['image']);
		}

		$this->User_model->delete($id);
		$this->session->set_flashdata('success',"User deleted successfully");
		redirect(base_url().'admin/user/index');

	}

}
?>