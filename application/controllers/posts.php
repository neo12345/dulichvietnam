<?php
class posts extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('posts_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
				$data['title'] = 'Danh sách bài viết';
				
				$num_posts = $this->posts_model->get_num_posts();
				$perpage	= 5;  

				$this->load->library('pagination'); 
				
				$config['total_rows'] = $num_posts; 
				$config['per_page'] = $perpage; 
				$config['next_link'] = 'Kế tiếp &gt;'; 
				$config['prev_link'] = '&lt; Lùi lại'; 
				$config['num_tag_open'] = '   '; 
				$config['num_tag_close'] = '   '; 
				$config['num_links']	= 5; 
				$config['cur_tag_open'] = '<a class="currentpage">'; 
				$config['cur_tag_close'] = '</a>'; 
				$config['base_url'] = base_url().'index.php/posts/index/';
				$config['use_page_numbers']  = TRUE; 
				$config['uri_segment']	= 3; 
				
				$this->pagination->initialize($config); 
				
				$pagination = $this->pagination->create_links(); 
				 
				$offset = ($this->uri->segment(3)=='') ? 1 : $this->uri->segment(3); 
				
				$data['postsList'] = $this->posts_model->get_posts_by_range($perpage, $offset); 
				$data['pagination'] = $pagination;			
				
				
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('posts/index', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
        }



        public function view($id = NULL)
        {
                $data['posts'] = $this->posts_model->get_posts($id);

				if (empty($data['posts']))
				{
						redirect('posts/index', 'refresh');
				}
				
				$data['title'] = $data['posts']['title'];

				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('posts/view', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');

        }
		
		
		
		public function create()
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$data['title'] = 'Tạo bài viết mới';
		
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
		
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
		
			}
			else
			{
				$this->posts_model->set_posts();
				redirect('posts/index', 'refresh');
			}
		}
		
		
		
		public function edit($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$data['title'] = 'Sửa bài viết';
			$data['posts'] = $this->posts_model->get_posts($id);		
					
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			
				
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('posts/edit', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');		
			}
			else
			{
				$this->posts_model->edit_posts();
				redirect('posts/index', 'refresh');
			}
			
		}
		
		
		public function delete($id = NULL)
		{
			if ($this->session->userdata['user']['type'] != 1)
			{
				redirect('welcome', 'refresh');
			}
			
			$this->posts_model->delete_posts($id);
			redirect('posts/index', 'refresh');
		}
}