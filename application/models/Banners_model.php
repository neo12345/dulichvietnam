<?php
class banners_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		
		
		public function get_banners($id = NULL)
		{
            if($id == NULL)
			{    
				$query = $this->db->get('banners');
				
                return $query->result_array();
			}
			else
			{
				$this->db->where('id', $id);
				$query = $this->db->get('banners');
				return $query->row_array();
			}
		}		
		
		
		public function set_banner()
		{		
			$data = array(
				'banner' => $this->input->post('banner')
					);
		
			return $this->db->insert('banners', $data);
		}
		
		
		public function edit_banner()
		{		
			$data = array(
				'banner' => $this->input->post('banner'),
			);
			
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('banners', $data);
		}
		
		public function delete_banner($id)
		{
			$this->db->where('id', $id);
			return $this->db->delete('banners');
		}
}