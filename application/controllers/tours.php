<?php
class tours extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('tours_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
			
			$data['title'] = 'Danh sách tour du lịch';
			
			$num_tours = $this->tours_model->get_num_tours();
			$perpage	= 5;  

			$this->load->library('pagination'); 
			
			$config['total_rows'] = $num_tours; 
			$config['per_page'] = $perpage; 
			$config['next_link'] = 'Kế tiếp &gt;'; 
			$config['prev_link'] = '&lt; Lùi lại'; 
			$config['num_tag_open'] = '   '; 
			$config['num_tag_close'] = '   '; 
			$config['num_links']	= 5; 
			$config['cur_tag_open'] = '<a class="currentpage">'; 
			$config['cur_tag_close'] = '</a>'; 
			$config['base_url'] = base_url().'index.php/tours/index/';
			$config['use_page_numbers']  = TRUE; 
			$config['uri_segment']	= 3; 
			
			$this->pagination->initialize($config); 
			
			$pagination = $this->pagination->create_links(); 
			 
			$offset = ($this->uri->segment(3)=='') ? 1 : $this->uri->segment(3); 
			
			$data['toursList'] = $this->tours_model->get_tours_by_range($perpage, $offset); 
			$data['pagination'] = $pagination;			
			
			
			$this->load->view('templates/header');
			$this->load->view('templates/leftsidebar');
			$this->load->view('tours/index', $data);
			$this->load->view('templates/rightsidebar');
			$this->load->view('templates/footer');
        }



        public function view($id = NULL)
        {
                $data['tours'] = $this->tours_model->get_tours($id);

				if (empty($data['tours']))
				{
						redirect('tours/index', 'refresh');
				}
				
				$data['title'] = $data['tours']['title'];

				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('tours/view', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');

        }
		
		
		
		public function create()
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$data['title'] = 'Tạo tour du lịch';
		
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
				$this->load->view('tours/create', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
		
			}
			else
			{
				$this->tours_model->set_tour();
				$tours = $this->tours_model->get_recent_tours();
				foreach ($tours as $tour)
				{
					$id = $tour['id'];
					break;
				}
				
				redirect('tourvector/create/'.$id, 'refresh');
			}
		}
		
		
		
		public function edit($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			
			$data['title'] = 'Sửa thông tin tour du lịch';
			$data['tours'] = $this->tours_model->get_tours($id);		
					
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
				$this->load->view('tours/edit', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');		
			}
			else
			{
				$this->tours_model->edit_tour();
				$id = $this->input->post('id');
				redirect('tourvector/edit/'.$id, 'refresh');
			}
			
		}
		
		
		public function delete($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$this->tours_model->delete_tour($id);
			redirect('tourvector/delete/'.$id, 'refresh');
		}
}