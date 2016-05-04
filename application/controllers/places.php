<?php
class Places extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('places_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
				$data['title'] = 'Danh sách địa điểm du lịch';
				
				$num_places = $this->places_model->get_num_places();
				$perpage	= 5;  

				$this->load->library('pagination'); 
				
				$config['total_rows'] = $num_places; 
				$config['per_page'] = $perpage; 
				$config['next_link'] = 'Kế tiếp &gt;'; 
				$config['prev_link'] = '&lt; Lùi lại'; 
				$config['num_tag_open'] = ''; 
				$config['num_tag_close'] = ''; 
				$config['num_links']	= 5; 
				$config['cur_tag_open'] = '<a class="currentpage">'; 
				$config['cur_tag_close'] = '</a>'; 
				$config['base_url'] = base_url().'index.php/places/index/';
				$config['use_page_numbers']  = TRUE; 
				$config['uri_segment']	= 3; 
				
				$this->pagination->initialize($config); 
				
				$pagination = $this->pagination->create_links(); 
				 
				$offset = ($this->uri->segment(3)=='') ? 1 : $this->uri->segment(3); 
				
				$data['placesList'] = $this->places_model->get_places_by_range($perpage, $offset); 
				$data['pagination'] = $pagination;			
				
				
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('places/index', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
        }

        public function lists()
        {
				$data['title'] = 'Danh sách địa điểm du lịch';
				
				$num_places = $this->places_model->get_num_places();
				$perpage	= 5;  

				$this->load->library('pagination'); 
				
				$config['total_rows'] = $num_places; 
				$config['per_page'] = $perpage; 
				$config['next_link'] = 'Kế tiếp &gt;'; 
				$config['prev_link'] = '&lt; Lùi lại'; 
				$config['num_tag_open'] = ''; 
				$config['num_tag_close'] = ''; 
				$config['num_links']	= 5; 
				$config['cur_tag_open'] = '<a class="currentpage">'; 
				$config['cur_tag_close'] = '</a>'; 
				$config['base_url'] = base_url().'index.php/places/lists/';
				$config['use_page_numbers']  = TRUE; 
				$config['uri_segment']	= 3; 
				
				$this->pagination->initialize($config); 
				
				$pagination = $this->pagination->create_links(); 
				 
				$offset = ($this->uri->segment(3)=='') ? 1 : $this->uri->segment(3); 
				
				$data['placesList'] = $this->places_model->get_places_by_range($perpage, $offset); 
				$data['pagination'] = $pagination;			
				
				
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('places/lists', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
        }

        public function view($id = NULL)
        {
                $data['places'] = $this->places_model->get_places($id);

				if (empty($data['places']))
				{
						redirect('places/index', 'refresh');
				}
				
				$data['title'] = $data['places']['title'];

				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('places/view', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');

        }
		
		
		
		public function create()
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$data['title'] = 'Tạo địa điểm du lịch mới';
		
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			$this->form_validation->set_rules('destination', 'Destination', 'required');
			$this->form_validation->set_rules('time', 'Time', 'required');
			$this->form_validation->set_rules('cost', 'Cost', 'required');
			$this->form_validation->set_rules('quality', 'Quality', 'required');
			$this->form_validation->set_rules('nature', 'Nature', 'required');
			$this->form_validation->set_rules('adventure', 'Adventure', 'required');
			$this->form_validation->set_rules('religious', 'Religious', 'required');
			$this->form_validation->set_rules('health_or_medical', 'Heath or Medical', 'required');
		
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('places/create', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
		
			}
			else
			{
				$this->places_model->set_place();
				$places = $this->places_model->get_recent_places();
				foreach ($places as $place)
				{
					$id = $place['id'];
					break;
				}
				
				redirect('placevector/create/'.$id, 'refresh');
			}
		}
		
		
		
		public function edit($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			
			$data['title'] = 'Sửa thông tin địa điểm du lịch';
			$data['places'] = $this->places_model->get_places($id);		
					
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			$this->form_validation->set_rules('destination', 'Destination', 'required');
			$this->form_validation->set_rules('time', 'Time', 'required');
			$this->form_validation->set_rules('cost', 'Cost', 'required');
			$this->form_validation->set_rules('quality', 'Quality', 'required');
			$this->form_validation->set_rules('nature', 'Nature', 'required');
			$this->form_validation->set_rules('adventure', 'Adventure', 'required');
			$this->form_validation->set_rules('religious', 'Religious', 'required');
			$this->form_validation->set_rules('health_or_medical', 'Heath or Medical', 'required');
			
				
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('places/edit', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');		
			}
			else
			{
				$this->places_model->edit_place();
				$id = $this->input->post('id');
				redirect('placevector/edit/'.$id, 'refresh');
			}
			
		}
		
		
		public function delete($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$this->places_model->delete_place($id);
			redirect('placevector/delete/'.$id, 'refresh');
		}
}