<?php
class Signin extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Signin_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
				if(isset($this->session->userdata['user']['id']))
				{ 
					redirect(base_url('welcome', 'refresh')); 
				}
				else 
				{ #check autologin 
					$cookie_name	=	'DLVNAuth'; // Check if the cookie exists
					//echo $_COOKIE[$cookie_name];
					
					/*if(isset($_COOKIE[$cookie_name]))
					{
						$a_User = parse_str($_COOKIE[$cookie_name]); // Register the session
						$user_info	=	array( 'username'	=> $a_User['username'], 'password'	=> $a_User['password'] ); 
						$this->session->set_userdata('user', $user_info);
						redirect(base_url('welcome', 'refresh')); 
					} */
				} 				
				$data['title'] = 'Đăng nhập';
				
                $this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('signin/index', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
        }
		
		public function sign_in()
		{
			$data['title'] = 'Đăng nhập';
	
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			
		
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('templates/leftsidebar');
				$this->load->view('signin/index', $data);
				$this->load->view('templates/rightsidebar');
				$this->load->view('templates/footer');
		
			}
			else
			{
				$userinfo = $this->Signin_model->sign_in();
				$autologin = $this->input->post('remember_me');
				if ($userinfo)
				{
					foreach($userinfo as $row)
					{
						if($autologin == 'on')
						{
							$cookie_name	=	'DLVNAuth'; 
							$cookie_time	=	3600*24*30; // 30 days. 
							set_cookie('ci-session', 'user='."", time() - 3600);	// Unset cookie of user 
							set_cookie($cookie_name, 'user='.$this->input->post('username').'&password='.$this->input->post('password'), time() + $cookie_time); 						
						}
						$this->session->set_userdata('user', $row); 
					}
					
					$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
					
					redirect('welcome', 'refresh');
				}
				else
				{
					$data['check'] = 0;
					$this->load->view('templates/header');
					$this->load->view('templates/leftsidebar');
					$this->load->view('signin/index', $data);
					$this->load->view('templates/rightsidebar');
					$this->load->view('templates/footer');
					
				}
			}
		}
}