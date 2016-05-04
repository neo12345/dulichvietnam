<?php
class Accounts extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('accounts_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
				if($this->session->userdata['user']['type'] != 1)
				{
					redirect('welcome', 'refresh');
				}
				
				
				$data['title'] = 'accounts archive';
				
				$num_accounts = $this->accounts_model->get_num_accounts();
				$perpage	= 5;  

				$this->load->library('pagination'); 
				
				$config['total_rows'] = $num_accounts; 
				$config['per_page'] = $perpage; 
				$config['next_link'] = 'Kế tiếp &gt;'; 
				$config['prev_link'] = '&lt; Lùi lại'; 
				$config['num_tag_open'] = '   '; 
				$config['num_tag_close'] = '   '; 
				$config['num_links']	= 5; 
				$config['cur_tag_open'] = '<a class="currentpage">'; 
				$config['cur_tag_close'] = '</a>'; 
				$config['base_url'] = base_url().'index.php/accounts/index/';
				$config['use_page_numbers']  = TRUE; 
				$config['uri_segment']	= 3; 
				
				$this->pagination->initialize($config); 
				
				$pagination = $this->pagination->create_links(); 
				 
				$offset = ($this->uri->segment(3)=='') ? 1 : $this->uri->segment(3); 
				
				$data['accountsList'] = $this->accounts_model->get_accounts_by_range($perpage, $offset); 
				$data['pagination'] = $pagination;			
				
				
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('accounts/index', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
        }



        public function view($id = NULL)
        {
                if($this->session->userdata['user']['type'] != 1 && $this->session->userdata['user']['id'] != $id)
				{
					redirect('welcome', 'refresh');
				}
				
				
				$data['accounts'] = $this->accounts_model->get_accounts($id);

				if (empty($data['accounts']))
				{
						redirect('accounts/index', 'refresh');
				}
				
				$data['title'] = $data['accounts']['username'];

				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('accounts/view', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');

        }
		
		
		public function edit($id = NULL)
		{
			if($this->session->userdata['user']['type'] != 1 && $this->session->userdata['user']['id'] != $id)
				{
					redirect('welcome', 'refresh');
				}
			
			
			$data['title'] = 'Sửa thông tin tài khoản';
			$data['accounts'] = $this->accounts_model->get_accounts($id);		
					
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('passconf', 'Password_Confirm', 'trim|required|min_length[8]|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('DOB', 'Date of Birth', 'required');
			$this->form_validation->set_rules('sex', 'Sex', 'required');
			
				
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('accounts/edit', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');		
			}
			else
			{
				$this->accounts_model->edit_account();
				redirect('accounts/view/'.$this->input->post('id'), 'refresh');
			}
			
		}
		
		
		public function delete($id = NULL)
		{
			if($this->session->userdata['user']['type'] != 1)
				{
					redirect('welcome', 'refresh');
				}
			$this->accounts_model->delete_account($id);
			redirect('accounts/index', 'refresh');
		}
}