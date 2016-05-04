<?php
class Search extends CI_Controller {
	 
	public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
				$this->load->model('posts_model');
				$this->load->model('places_model');
				$this->load->model('tours_model');
                $this->load->helper('url_helper');
        } 
	 
	public function index()
	{	
		$data['title'] = 'Kết quả tìm kiếm';
		
		$this->form_validation->set_rules('key', 'Search Key', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('templates/leftsidebar');
			$this->load->view('search/index', $data);
			$this->load->view('templates/rightsidebar');
			$this->load->view('templates/footer');
	
		}
		else
		{		
			$key = $this->input->post('key');
			
			$data['newsList'] = $this->news_model->search_news($key);
			$data['postsList'] = $this->posts_model->search_posts($key);
			$data['placesList'] = $this->places_model->search_places($key);
			$data['toursList'] = $this->tours_model->search_tours($key);
			
			$this->load->view('templates/header');
			$this->load->view('templates/leftsidebar');
			$this->load->view('search/index', $data);
			$this->load->view('templates/rightsidebar');
			$this->load->view('templates/footer');
		}
	}
}
