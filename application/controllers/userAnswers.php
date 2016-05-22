<?php
class useranswers extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('useranswers_model');
                $this->load->helper('url_helper');
        }

        public function create($id = NULL)
        {
			if ($this->session->userdata['user']['type'] != 1 && $this->session->userdata['user']['id'] != $id)
			{
				redirect('welcome', 'refresh');
			}
			
			
			if($this->useranswers_model->get_useranswers($id))
			{
				redirect('useranswers/edit/'.$id, 'refresh');
			}
			$data['title'] = 'Hãy trả lời vài câu hỏi sau để chúng tôi phục vụ ban tốt hơn';
			$data['id'] = $id;
				
			$this->form_validation->set_rules('places_or_tours', 'Place or Tours', 'required');
			$this->form_validation->set_rules('time', 'Time', 'required');
			$this->form_validation->set_rules('cost', 'Cost', 'required');
			$this->form_validation->set_rules('quality', 'Quality', 'required');
			$this->form_validation->set_rules('time_short_long', 'Time', 'required');
			$this->form_validation->set_rules('cost_low_high', 'Cost', 'required');
			$this->form_validation->set_rules('quality_low_high', 'Quality', 'required');
			$this->form_validation->set_rules('time_priotity', 'Time', 'required');
			$this->form_validation->set_rules('cost_priotity', 'Cost', 'required');
			$this->form_validation->set_rules('quality_priotity', 'Quality', 'required');
			$this->form_validation->set_rules('nature', 'Nature', 'required');
			$this->form_validation->set_rules('adventure', 'Adventure', 'required');
			$this->form_validation->set_rules('religious', 'Religious', 'required');
			$this->form_validation->set_rules('health_or_medical', 'Health or Medical','required');
			$this->form_validation->set_rules('nature_priotity', 'Nature Priotity', 'required');
			$this->form_validation->set_rules('adventure_priotity', 'Adventure Priotity', 'required');
			$this->form_validation->set_rules('religious_priotity', 'Religious Priotity', 'required');
			$this->form_validation->set_rules('health_or_medical_priotity', 'Health or Medical Priotity', 'required');
			$this->form_validation->set_rules('nature_low_high', 'Nature', 'required');
			$this->form_validation->set_rules('adventure_low_high', 'Adventure', 'required');
			$this->form_validation->set_rules('religious_low_high', 'Religious', 'required');
			$this->form_validation->set_rules('health_or_medical_low_high', 'Health or Medical','required');
				
			
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('useranswers/create', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');		
			}
			else
			{ 
				$this->useranswers_model->set_useranswers();	
				
				$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
							
				redirect('welcome', 'refresh');
			}
        }
		
		
		
		public function edit($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1 || $this->session->userdata['user']['id'] != $id)
			{
				redirect('welcome', 'refresh');
			}
			
			
			$data['title'] = 'Hãy trả lời vài câu hỏi sau để chúng tôi phục vụ ban tốt hơn';
			$data['id'] = $id;
			$data['useranswers'] = $this->useranswers_model->get_useranswers($id);		
					
			$this->form_validation->set_rules('places_or_tours', 'Place or Tours', 'required');
			$this->form_validation->set_rules('time', 'Time', 'required');
			$this->form_validation->set_rules('cost', 'Cost', 'required');
			$this->form_validation->set_rules('quality', 'Quality', 'required');
			$this->form_validation->set_rules('time_priotity', 'Time', 'required');
			$this->form_validation->set_rules('cost_priotity', 'Cost', 'required');
			$this->form_validation->set_rules('quality_priotity', 'Quality', 'required');
			$this->form_validation->set_rules('nature', 'Nature', 'required');
			$this->form_validation->set_rules('adventure', 'Adventure', 'required');
			$this->form_validation->set_rules('religious', 'Religious', 'required');
			$this->form_validation->set_rules('health_or_medical', 'Health or Medical','required');
			$this->form_validation->set_rules('nature_priotity', 'Nature Priotity', 'required');
			$this->form_validation->set_rules('adventure_priotity', 'Adventure Priotity', 'required');
			$this->form_validation->set_rules('religious_priotity', 'Religious Priotity', 'required');
			$this->form_validation->set_rules('health_or_medical_priotity', 'Health or Medical Priotity', 'required');
			$this->form_validation->set_rules('nature_low_high', 'Nature', 'required');
			$this->form_validation->set_rules('adventure_low_high', 'Adventure', 'required');
			$this->form_validation->set_rules('religious_low_high', 'Religious', 'required');
			$this->form_validation->set_rules('health_or_medical_low_high', 'Health or Medical','required');
			$this->form_validation->set_rules('time_short_long', 'Time', 'required');
			$this->form_validation->set_rules('cost_low_high', 'Cost', 'required');
			$this->form_validation->set_rules('quality_low_high', 'Quality', 'required');
			
				
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('useranswers/edit', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');		
			}
			else
			{
				$this->useranswers_model->edit_useranswers();
				
				$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
				
				redirect('welcome', 'refresh');
			}
			
		}
		
		public function delete($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$this->useranswers_model->delete_useranswers($id);
			
			$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
			
			redirect('welcome', 'refresh');
		}
}