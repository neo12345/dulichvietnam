<?php
class Signin_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }		
		
		
		public function sign_in()
		{		
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
			);
		
			$this->db->select();
			$query = $this->db->get_where('accounts', $data);
			return $query->result_array();
		}
}