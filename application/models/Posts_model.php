<?php
class posts_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		
		public function search_posts($key)
		{
			$this->db->like('title', $key);
			$this->db->or_like('description', $key);
			$this->db->or_like('content', $key);
			$query = $this->db->get('posts');
			return $query->result_array();
		}
		
		
		public function get_recent_posts()
		{
			$this->db->order_by('id', 'DESC');
			$this->db->limit(5);
			$query = $this->db->get('posts');
			return $query->result_array();
		}
		
		
		
		public function get_posts($id = FALSE)
		{
        if ($id === FALSE)
        {
                $query = $this->db->get('posts');
				
                return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('id' => $id));
        return $query->row_array();
		}
		
		
		
		public function get_num_posts()
		{
                $query = $this->db->get('posts');			
                return $query->num_rows();
		}
		
		
		
		
		public function get_posts_by_range($perpage, $offset)
		{
        $query = $this->db->get('posts', $perpage, (($offset-1) * $perpage));
        return $query->result_array();
		}
		
		
		
		
		public function set_posts()
		{		
			$data = array(
				'title' => $this->input->post('title'),
				'feature_img' => $this->input->post('feature_img'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content')
			);
		
			return $this->db->insert('posts', $data);
		}
		
		
		
		public function edit_posts()
		{		
			$data = array(
				'title' => $this->input->post('title'),
				'feature_img' => $this->input->post('feature_img'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content')
			);
			
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}
		
		public function delete_posts($id)
		{					
			$this->db->where('id', $id);
			return $this->db->delete('posts');
		}
}