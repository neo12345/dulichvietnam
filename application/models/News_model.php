<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		
		public function search_news($key)
		{
			$this->db->like('title', $key);
			$this->db->or_like('description', $key);
			$this->db->or_like('content', $key);
			$query = $this->db->get('news');
			return $query->result_array();
		}
		
		
		public function get_recent_news()
		{
			$this->db->order_by('id', 'DESC');
			$this->db->limit(5);
			$query = $this->db->get('news');
			return $query->result_array();
		}
		
		
		
		public function get_news($id = FALSE)
		{
        if ($id === FALSE)
        {
                $query = $this->db->get('news');
				
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('id' => $id));
        return $query->row_array();
		}
		
		
		
		public function get_num_news()
		{
                $query = $this->db->get('news');			
                return $query->num_rows();
		}
		
		
		
		
		public function get_news_by_range($perpage, $offset)
		{
        $query = $this->db->get('news', $perpage, (($offset-1) * $perpage));
        return $query->result_array();
		}
		
		
		
		
		public function set_news()
		{		
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content'),
				'feature_img' => $this->input->post('feature_img')
			);
		
			return $this->db->insert('news', $data);
		}
		
		
		
		public function edit_news()
		{		
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content'),
				'feature_img' => $this->input->post('feature_img')
			);
			
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('news', $data);
		}
		
		public function delete_news($id)
		{					
			$this->db->where('id', $id);
			return $this->db->delete('news');
		}
}