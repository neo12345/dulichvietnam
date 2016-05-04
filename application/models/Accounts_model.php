<?php
class accounts_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		
		public function get_accounts($id = FALSE)
		{
        if ($id === FALSE)
        {
                $query = $this->db->get('accounts');
				
                return $query->result_array();
        }

        $query = $this->db->get_where('accounts', array('id' => $id));
        return $query->row_array();
		}
		
		
		
		public function get_num_accounts()
		{
                $query = $this->db->get('accounts');			
                return $query->num_rows();
		}
		
		
		
		
		public function get_accounts_by_range($perpage, $offset)
		{
        $query = $this->db->get('accounts', $perpage, (($offset-1) * $perpage));
        return $query->result_array();
		}
		
		
		
		public function edit_account()
		{		
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('email'),
				'DOB' => date("Y", strtotime($this->input->post('DOB'))),
				'sex' => $this->input->post('sex')
			);
			
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('accounts', $data);
		}
		
		public function delete_account($id)
		{					
			$this->db->where('id', $id);
			return $this->db->delete('accounts');
		}
}