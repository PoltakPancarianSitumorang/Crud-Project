<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome/index');
	}

	public function login()
{
	$this->form_validation->set_rules('username','Username','required|alpha_numeric');
	$this->form_validation->set_rules('password','Password','required|alpha_numeric');

	if($this->form_validation->run() == FALSE)
	{
		//$data['content'] = 'pages/form-login';
		$this->load->view('login');
	} else {
		$this->load->model('m_crud');
		$valid_user = $this->m_crud->check_credential();

		if($valid_user == FALSE)
		{
			$this->session->set_flashdata('error','Your username or password is incorrect !');
			redirect('welcome/login');
		} else {
			// if the username and password is a match
			$this->session->set_userdata('username', $valid_user->username);
			$this->session->set_userdata('group', $valid_user->group);

			switch($valid_user->group){
				case 1 : //admin
							redirect('welcome/home');
							$this->session->set_flashdata('error','Your username or password is incorrect !');
							break;
				case 2 : //member
							redirect('welcome/manager');
							$this->session->set_flashdata('error','Your username or password is incorrect !');
							break;


				default: break;
					}
				}
			}
		}

//Employee Start
		public function home()
      {
				$data['calldata'] = $this->m_crud->join();
        //$data['calldata'] = $this->m_crud->get('users');
        $data['content'] = 'panel/home';
        $this->load->view('panel', $data);
      }

			public function adddata()
		  {
		    $data['content'] = 'panel/createdata';
		    $this->load->view('panel', $data);
		  }

			public function insertdata()
			{

				$username = $_POST['username'];
				$password = $_POST['password'];
		    $group = $_POST['group'];

				$data = array('username' => $username, 'password' => $password, 'group' => $group );
				$insertdata = $this->m_crud->insertdata('users',$data);
				if ($insertdata > 0)
				{
					$this->session->set_flashdata('msg','Data Has been Send');
					redirect('welcome/home');

				}else{

					$this->session->set_flashdata('msg','Data failed Send');
				}
			}

			public function deleteusers($id_user)
		{
			$delete = $this->m_crud->deleteDatausers('users',$id_user);
			if ($delete > 0)
			{
				$this->session->set_flashdata('msg','Data Berhasil Dihapus');
				redirect('welcome/home');

			}else{

				$this->session->set_flashdata('msg','Data Gagal Dihapus');
			}
		}

		public function editusers($id_user)
		{
			$this->data['editusers'] = $this->m_crud->getEditusers('users', $id_user);
			$this->data['content'] = 'panel/editusers';
			$this->load->view('panel', $this->data);
		}

		public function updateusers($id_user)
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
	    $group = $_POST['group'];
			$data = array('username' => $username, 'password' => $password, 'group' => $group);
			$editusers = $this->m_crud->editDatausers('users',$data,$id_user);
			if ($editusers > 0)
			{
				$this->session->set_flashdata('msg','Data Berhasil Diperbaharui');
				redirect('welcome/home');

			}else{

				$this->session->set_flashdata('msg','Data Gagal Diperbaharui');
			}
		}
//Employee End


//Manager Start
		public function manager()
      {
        $data['manager'] = $this->m_crud->join();
        $data['content'] = 'manager/manager';
        $this->load->view('manager', $data);
      }
//Manager End

}
