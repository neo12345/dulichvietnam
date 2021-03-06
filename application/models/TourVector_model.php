<?php
class tourVector_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }	
		
		
		public function get_tourVector($id = FALSE)
		{
        if ($id === FALSE)
        {
                $query = $this->db->get('tour_vector');
				
                return $query->result_array();
        }

        $query = $this->db->get_where('tour_vector', array('id' => $id));
        return $query->row_array();
		}	
		
		
		
		public function set_tourVector($data)
		{		
			$vector = array(
				'id' => $data['id'],
				'time_short' => $data['time_short'],
				'time_long' => $data['time_long'],
				'cost_low' => $data['cost_low'],
				'cost_high' => $data['cost_high'],
				'quality_low' => $data['quality_low'],
				'quality_high' => $data['quality_high'],
				'nature_low' => $data['nature'],
				'nature_high' => -$data['nature'],
				'adventure_low' => $data['adventure'],
				'adventure_high' => -$data['adventure'],
				'religious_low' => $data['religious'],
				'religious_high' => -$data['religious'],
				'health_or_medical_low' => $data['health_or_medical'],
				'health_or_medical_high' => -$data['health_or_medical']
			);
		
			return $this->db->insert('tour_vector', $vector);
		}
		
		
		
		public function edit_tourVector($data)
		{		
			$vector = array(
				'time_short' => $data['time_short'],
				'time_long' => $data['time_long'],
				'cost_low' => $data['cost_low'],
				'cost_high' => $data['cost_high'],
				'quality_low' => $data['quality_low'],
				'quality_high' => $data['quality_high'],
				'nature_low' => $data['nature'],
				'nature_high' => -$data['nature'],
				'adventure_low' => $data['adventure'],
				'adventure_high' => -$data['adventure'],
				'religious_low' => $data['religious'],
				'religious_high' => -$data['religious'],
				'health_or_medical_low' => $data['health_or_medical'],
				'health_or_medical_high' => -$data['health_or_medical']
			);
			
			$this->db->where('id', $data['id']);
			return $this->db->update('tour_vector', $vector);
		}
		
		public function delete_tourVector($id)
		{					
			$this->db->where('id', $id);
			return $this->db->delete('tour_vector');
		}
}