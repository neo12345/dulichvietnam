<?php
class Places_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		
		public function search_places($key)
		{
			$this->db->like('title', $key);
			$this->db->or_like('description', $key);
			$this->db->or_like('content', $key);
			$query = $this->db->get('places');
			return $query->result_array();
		}
		
		
		public function get_recent_places()
		{
			$this->db->order_by('id', 'DESC');
			$this->db->limit(5);
			$query = $this->db->get('places');
			return $query->result_array();
		}
		
		
		
		public function get_places($id = FALSE)
		{
        if ($id === FALSE)
        {
                $query = $this->db->get('places');
				
                return $query->result_array();
        }

        $query = $this->db->get_where('places', array('id' => $id));
        return $query->row_array();
		}
		
		
		
		public function get_num_places()
		{
                $query = $this->db->get('places');			
                return $query->num_rows();
		}
		
		
		
		
		public function get_places_by_range($perpage, $offset)
		{
        $query = $this->db->get('places', $perpage, (($offset-1) * $perpage));
        return $query->result_array();
		}
		
		
		
		
		public function set_place()
		{		
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content'),
				'feature_img' => $this->input->post('feature_img'),
				'destination' => $this->input->post('destination'),
				'time' => $this->input->post('time'),
				'cost' => $this->input->post('cost'),
				'quality' => $this->input->post('quality'),
				'nature' => $this->input->post('nature'),
				'adventure' => $this->input->post('adventure'),
				'religious' => $this->input->post('religious'),
				'health_or_medical' => $this->input->post('health_or_medical'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude')
			);
		
			return $this->db->insert('places', $data);
		}
		
		
		
		public function edit_place()
		{		
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content'),
				'feature_img' => $this->input->post('feature_img'),
				'destination' => $this->input->post('destination'),
				'time' => $this->input->post('time'),
				'cost' => $this->input->post('cost'),
				'quality' => $this->input->post('quality'),
				'nature' => $this->input->post('nature'),
				'adventure' => $this->input->post('adventure'),
				'religious' => $this->input->post('religious'),
				'health_or_medical' => $this->input->post('health_or_medical'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude')
			);
			
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('places', $data);
		}
		
		public function delete_place($id)
		{					
			$this->db->where('id', $id);
			return $this->db->delete('places');
		}
}