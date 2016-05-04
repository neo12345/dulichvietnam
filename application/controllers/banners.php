<?php
class banners extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('banners_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {						
			$data['banners'] = $this->banners_model->get_banners(); 			
			
			$this->load->view('banners/index', $data);
        }
		
		
		public function lists()
        {						
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$data['title'] = 'List banners';
			$data['banners'] = $this->banners_model->get_banners(); 			
			
			$this->load->view('templates/header');
			$this->load->view('templates/leftsidebar');
			$this->load->view('banners/lists', $data);
			$this->load->view('templates/rightsidebar');
			$this->load->view('templates/footer');
        }
		
		
		public function create()
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			
			$data['title'] = 'Create a banner';				
			
			$this->form_validation->set_rules('banner', 'Banner', 'required');
				
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('banners/create', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');		
			}
			else
			{
				$this->banners_model->set_banner();
				redirect('banners/lists', 'refresh');
			}
		
		}
		
		public function edit($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			
			$data['title'] = 'Banners';
			$data['banner'] = $this->banners_model->get_banners($id);					
			
			$this->form_validation->set_rules('banner', 'Banner', 'required');
				
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('banners/edit', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');		
			}
			else
			{
				$this->banners_model->edit_banner();
				redirect('banners/lists', 'refresh');
			}
			
		}
		
		public function delete($id = NULL)
		{
			$this->banners_model->delete_banner($id);
			redirect('banners/lists', 'refresh');
		}
		
}