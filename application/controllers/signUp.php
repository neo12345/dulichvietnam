<?php
class Signup extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Signup_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
				$data['title'] = 'Tạo tài khoản';
				
                $this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('signup/index', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
        }
		
		public function create()
		{
			$data['title'] = 'Tạo tài khoản';
	
			$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[accounts.username]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('passconf', 'Password_Confirm', 'trim|required|min_length[8]|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('DOB', 'Date of Birth', 'required');
			$this->form_validation->set_rules('sex', 'Sex', 'required');
		
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('signup/index', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
		
			}
			else
			{
				$this->Signup_model->set_account();
				
				$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
				
				redirect('signin', 'refresh');
			}
		}
}