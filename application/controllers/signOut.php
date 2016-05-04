<?php
class Signout extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
        }

        public function index()
        {
				$this->session->sess_destroy();
				$cookiename	= 'DLVNAuth'; 
				set_cookie($cookiename, "", time() -3600); 
				delete_cookie('DLVNAuth');
				
				redirect ('welcome', 'refresh');
				/*
				$data['title'] = 'Sign out';
				
                $this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('signout/index', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
				*/
        }
		
}