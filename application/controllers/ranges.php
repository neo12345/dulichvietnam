<?php
class ranges extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('ranges_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$data['title'] = 'Quản lí các khoảng giá trị';
			
			$data['ranges'] = $this->ranges_model->get_ranges(); 			
			
			
			$this->load->view('templates/header');
			$this->load->view('templates/leftsidebar');
			$this->load->view('ranges/index', $data);
			$this->load->view('templates/rightsidebar');
			$this->load->view('templates/footer');
        }
		
		
		
		public function edit($name = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			
			$data['title'] = $name;
			$data['ranges'] = $this->ranges_model->get_ranges($name);		
					
			$this->form_validation->set_rules('value_1', 'Value 1', 'required');
			$this->form_validation->set_rules('value_2', 'Value 2', 'required');
			$this->form_validation->set_rules('value_3', 'Value 3', 'required');
			$this->form_validation->set_rules('value_4', 'Value 4', 'required');
			
				
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('ranges/edit', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');		
			}
			else
			{
				$this->ranges_model->set_range($name);
				
				$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
				
				redirect('placevector/editAll', 'refresh');
			}
			
		}
		
}