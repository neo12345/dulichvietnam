<?php
class Signup_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }		
		
		
		public function set_account()
		{		
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('email'),
				'DOB' => date("Y", strtotime($this->input->post('DOB'))),
				'sex' => $this->input->post('sex')
			);
		
			return $this->db->insert('accounts', $data);
		}
}