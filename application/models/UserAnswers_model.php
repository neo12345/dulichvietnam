<?php
class useranswers_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }		
		
		
		public function get_useranswers($id = FALSE)
		{
        if ($id === FALSE)
        {
                $query = $this->db->get('account_vector');
				
                return $query->result_array();
        }

        $query = $this->db->get_where('account_vector', array('id' => $id));
        return $query->row_array();
		}		
		
		
		public function set_useranswers()
		{		
			$data = array(
				'id' => $this->input->post('id'),
				'places_or_tours' => $this->input->post('places_or_tours'),
				'time_priotity' => $this->input->post('time_priotity'),
				'cost_priotity' => $this->input->post('cost_priotity'),				
				'quality_priotity' => $this->input->post('quality_priotity'),
				'nature_priotity' => $this->input->post('nature_priotity'),
				'adventure_priotity' => $this->input->post('adventure_priotity'),
				'religious_priotity' => $this->input->post('religious_priotity'),		
				'health_or_medical_priotity' => $this->input->post('health_or_medical_priotity')
			);
			
			if($this->input->post('time_short_long'))
			{
				$data['time_long'] = $this->input->post('time');
			}
			else
			{
				$data['time_short'] = $this->input->post('time');
			}
			
			if($this->input->post('cost_low_high'))
			{
				$data['cost_high'] = $this->input->post('cost');
			}
			else
			{
				$data['cost_low'] = $this->input->post('cost');
			}
			
			if($this->input->post('quality_low_high'))
			{
				$data['quality_high'] = $this->input->post('quality');
			}
			else
			{
				$data['quality_low'] = $this->input->post('quality');
			}
			
			if($this->input->post('nature_low_high'))
			{
				$data['nature_high'] = $this->input->post('nature');
			}
			else
			{
				$data['nature_low'] = $this->input->post('nature');
			}
			
			if($this->input->post('adventure_low_high'))
			{
				$data['adventure_high'] = $this->input->post('adventure');
			}
			else
			{
				$data['adventure_low'] = $this->input->post('adventure');
			}
			
			if($this->input->post('religious_low_high'))
			{
				$data['religious_high'] = $this->input->post('religious');
			}
			else
			{
				$data['religious_low'] = $this->input->post('religious');
			}
			
			if($this->input->post('health_or_medical_low_high'))
			{
				$data['health_or_medical_high'] = $this->input->post('health_or_medical');
			}
			else
			{
				$data['health_or_medical_low'] = $this->input->post('health_or_medical');
			}
			
			
			return $this->db->insert('account_vector', $data);
		}
		
		
		public function edit_useranswers()
		{		
			$data = array(
				'id' => $this->input->post('id'),
				'places_or_tours' => $this->input->post('places_or_tours'),
				'time_priotity' => $this->input->post('time_priotity'),
				'cost_priotity' => $this->input->post('cost_priotity'),				
				'quality_priotity' => $this->input->post('quality_priotity'),
				'nature_priotity' => $this->input->post('nature_priotity'),
				'adventure_priotity' => $this->input->post('adventure_priotity'),
				'religious_priotity' => $this->input->post('religious_priotity'),		
				'health_or_medical_priotity' => $this->input->post('health_or_medical_priotity')
			);
			
			if($this->input->post('time_short_long'))
			{
				$data['time_long'] = $this->input->post('time');
			}
			else
			{
				$data['time_short'] = $this->input->post('time');
			}
			
			if($this->input->post('cost_low_high'))
			{
				$data['cost_high'] = $this->input->post('cost');
			}
			else
			{
				$data['cost_low'] = $this->input->post('cost');
			}
			
			if($this->input->post('quality_low_high'))
			{
				$data['quality_high'] = $this->input->post('quality');
			}
			else
			{
				$data['quality_low'] = $this->input->post('quality');
			}
			
			if($this->input->post('nature_low_high'))
			{
				$data['nature_high'] = $this->input->post('nature');
			}
			else
			{
				$data['nature_low'] = $this->input->post('nature');
			}
			
			if($this->input->post('adventure_low_high'))
			{
				$data['adventure_high'] = $this->input->post('adventure');
			}
			else
			{
				$data['adventure_low'] = $this->input->post('adventure');
			}
			
			if($this->input->post('religious_low_high'))
			{
				$data['religious_high'] = $this->input->post('religious');
			}
			else
			{
				$data['religious_low'] = $this->input->post('religious');
			}
			
			if($this->input->post('health_or_medical_low_high'))
			{
				$data['health_or_medical_high'] = $this->input->post('health_or_medical');
			}
			else
			{
				$data['health_or_medical_low'] = $this->input->post('health_or_medical');
			}			
			
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('account_vector', $data);
		}
		
		public function delete_useranswers($id)
		{					
			$this->db->where('id', $id);
			return $this->db->delete('useranswers');
		}
}