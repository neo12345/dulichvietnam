<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
				$data['title'] = 'Danh sách tin tức';
				
				$num_news = $this->news_model->get_num_news();
				$perpage	= 5;  

				$this->load->library('pagination'); 
				
				$config['total_rows'] = $num_news; 
				$config['per_page'] = $perpage; 
				$config['next_link'] = 'Kế tiếp &gt;'; 
				$config['prev_link'] = '&lt; Lùi lại'; 
				$config['num_tag_open'] = '   '; 
				$config['num_tag_close'] = '   '; 
				$config['num_links']	= 5; 
				$config['cur_tag_open'] = '<a class="currentpage">'; 
				$config['cur_tag_close'] = '</a>'; 
				$config['base_url'] = base_url().'index.php/news/index/';
				$config['use_page_numbers']  = TRUE; 
				$config['uri_segment']	= 3; 
				
				$this->pagination->initialize($config); 
				
				$pagination = $this->pagination->create_links(); 
				 
				$offset = ($this->uri->segment(3)=='') ? 1 : $this->uri->segment(3); 
				
				$data['newsList'] = $this->news_model->get_news_by_range($perpage, $offset); 
				$data['pagination'] = $pagination;			
				
				
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('news/index', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
        }



        public function view($id = NULL)
        {
                $data['news'] = $this->news_model->get_news($id);

				if (empty($data['news']))
				{
						redirect('news/index', 'refresh');
				}
				
				$data['title'] = $data['news']['title'];

				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('news/view', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');

        }
		
		
		
		public function create()
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$data['title'] = 'Tạo tin tức mới';
		
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
		
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('news/create', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
		
			}
			else
			{
				$this->news_model->set_news();
				redirect('news/index', 'refresh');
			}
		}
		
		
		
		public function edit($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$data['title'] = 'Sửa tin tức';
			$data['news'] = $this->news_model->get_news($id);		
					
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			
				
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('news/edit', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');		
			}
			else
			{
				$this->news_model->edit_news();
				redirect('news/index', 'refresh');
			}
			
		}
		
		
		public function delete($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$this->news_model->delete_news($id);
			redirect('news/index', 'refresh');
		}
}