<?php
class Ranges_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		
		
		public function get_ranges($name = NULL)
		{
            if($name == NULL)
			{    
				$query = $this->db->get('range');
				
                return $query->result_array();
			}
			else
			{
				$this->db->where('name', $name);
				$query = $this->db->get('range');
				return $query->row_array();
			}
		}	
		
		
		
		
		
		public function set_range($name)
		{		
			$data = array(
				'value_1' => $this->input->post('value_1'),
				'value_2' => $this->input->post('value_2'),
				'value_3' => $this->input->post('value_3'),
				'value_4' => $this->input->post('value_4'),
			);
		
			$this->db->where('name', $this->input->post('name'));
			return $this->db->update('range', $data);
		}
}