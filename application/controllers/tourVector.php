<?php
class tourVector extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('tourVector_model');
				$this->load->model('tours_model');
				$this->load->model('ranges_model');
                $this->load->helper('url_helper');
        }
		
		
		
		public function create($id = NULL)
		{				
			$tour = $this->tours_model->get_tours($id);
			
			
			$time_range = $this->ranges_model->get_ranges('Time_short');
			if ( $tour['time'] > $time_range['value_1'] )
			{
				$time_short = -1;
			}
			if ( $tour['time'] <= $time_range['value_1'] && $tour['time'] > $time_range['value_2'])
			{
				$time_short = -0.5;
			}
			if ( $tour['time'] <= $time_range['value_2'] && $tour['time'] > $time_range['value_3'])
			{
				$time_short = 0;
			}
			if ( $tour['time'] <= $time_range['value_3'] && $tour['time'] > $time_range['value_4'])
			{
				$time_short = 0.5;
			}
			if ( $tour['time'] <= $time_range['value_4'])
			{
				$time_short = 1;
			}
			
			
			$time_range = $this->ranges_model->get_ranges('Time_long');
			if ( $tour['time'] < $time_range['value_1'] )
			{
				$time_long = -1;
			}
			if ( $tour['time'] >= $time_range['value_1'] && $tour['time'] < $time_range['value_2'])
			{
				$time_long = -0.5;
			}
			if ( $tour['time'] >= $time_range['value_2'] && $tour['time'] < $time_range['value_3'])
			{
				$time_long = 0;
			}
			if ( $tour['time'] >= $time_range['value_3'] && $tour['time'] < $time_range['value_4'])
			{
				$time_long = 0.5;
			}
			if ( $tour['time'] >= $time_range['value_4'])
			{
				$time_long = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_low');
			if ( $tour['cost'] > $cost_range['value_1'] )
			{
				$cost_low = -1;
			}
			if ( $tour['cost'] <= $cost_range['value_1'] && $tour['cost'] > $cost_range['value_2'])
			{
				$cost_low = -0.5;
			}
			if ( $tour['cost'] <= $cost_range['value_2'] && $tour['cost'] > $cost_range['value_3'])
			{
				$cost_low = 0;
			}
			if ( $tour['cost'] <= $cost_range['value_3'] && $tour['cost'] > $cost_range['value_4'])
			{
				$cost_low = 0.5;
			}
			if ( $tour['cost'] <= $cost_range['value_4'])
			{
				$cost_low = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_high');
			if ( $tour['cost'] < $cost_range['value_1'] )
			{
				$cost_high = -1;
			}
			if ( $tour['cost'] >= $cost_range['value_1'] && $tour['cost'] < $cost_range['value_2'])
			{
				$cost_high = -0.5;
			}
			if ( $tour['cost'] >= $cost_range['value_2'] && $tour['cost'] < $cost_range['value_3'])
			{
				$cost_high = 0;
			}
			if ( $tour['cost'] >= $cost_range['value_3'] && $tour['cost'] < $cost_range['value_4'])
			{
				$cost_high = 0.5;
			}
			if ( $tour['cost'] >= $cost_range['value_4'])
			{
				$cost_high = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_low');
			if ( $tour['quality'] > $quality_range['value_1'] )
			{
				$quality_low = -1;
			}
			if ( $tour['quality'] <= $quality_range['value_1'] && $tour['quality'] > $quality_range['value_2'])
			{
				$quality_low = -0.5;
			}
			if ( $tour['quality'] <= $quality_range['value_2'] && $tour['quality'] > $quality_range['value_3'])
			{
				$quality_low = 0;
			}
			if ( $tour['quality'] <= $quality_range['value_3'] && $tour['quality'] > $quality_range['value_4'])
			{
				$quality_low = 0.5;
			}
			if ( $tour['quality'] <= $quality_range['value_4'])
			{
				$quality_low = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_high');
			if ( $tour['quality'] < $quality_range['value_1'] )
			{
				$quality_high = -1;
			}
			if ( $tour['quality'] >= $quality_range['value_1'] && $tour['quality'] < $quality_range['value_2'])
			{
				$quality_high = -0.5;
			}
			if ( $tour['quality'] >= $quality_range['value_2'] && $tour['quality'] < $quality_range['value_3'])
			{
				$quality_high = 0;
			}
			if ( $tour['quality'] >= $quality_range['value_3'] && $tour['quality'] < $quality_range['value_4'])
			{
				$quality_high = 0.5;
			}
			if ( $tour['quality'] >= $quality_range['value_4'])
			{
				$quality_high = 1;
			}
			
			
			if($tour['nature'] == 'Không có')
				{
					$nature = -1;
				}
				if($tour['nature'] == 'Khá ít')
				{
					$nature = -0.5;
				}
				if($tour['nature'] == 'Tương đối')
				{
					$nature = 0;
				}
				if($tour['nature'] == 'Khá nhiều')
				{
					$nature = 0.5;
				}
				if($tour['nature'] == 'Rất nhiều')
				{
					$nature = 1;
				}
				
				
				
				if($tour['adventure'] == 'Không có')
				{
					$adventure = -1;
				}
				if($tour['adventure'] == 'Khá ít')
				{
					$adventure = -0.5;
				}
				if($tour['adventure'] == 'Tương đối')
				{
					$adventure = 0;
				}
				if($tour['adventure'] == 'Khá nhiều')
				{
					$adventure = 0.5;
				}
				if($tour['adventure'] == 'Rất nhiều')
				{
					$adventure = 1;
				}
				
				
				if($tour['religious'] == 'Không có')
				{
					$religious = -1;
				}
				if($tour['religious'] == 'Khá ít')
				{
					$religious = -0.5;
				}
				if($tour['religious'] == 'Tương đối')
				{
					$religious = 0;
				}
				if($tour['religious'] == 'Khá nhiều')
				{
					$religious = 0.5;
				}
				if($tour['religious'] == 'Rất nhiều')
				{
					$religious = 1;
				}
				
				
				if($tour['health_or_medical'] == 'Không có')
				{
					$health_or_medical = -1;
				}
				if($tour['health_or_medical'] == 'Khá ít')
				{
					$health_or_medical = -0.5;
				}
				if($tour['health_or_medical'] == 'Tương đối')
				{
					$health_or_medical = 0;
				}
				if($tour['health_or_medical'] == 'Khá nhiều')
				{
					$health_or_medical = 0.5;
				}
				if($tour['health_or_medical'] == 'Rất nhiều')
				{
					$health_or_medical = 1;
				}
			
			$data = array(
				'id' => $id,
				'time_short' => $time_short,
				'time_long' => $time_long,
				'cost_low' => $cost_low,
				'cost_high' => $cost_high,
				'quality_low' => $quality_low,
				'quality_high' => $quality_high,
				'nature' => $nature,
				'adventure' => $adventure,
				'religious' => $religious,
				'health_or_medical' => $health_or_medical
			);
			
			$this->tourVector_model->set_tourVector($data);
			
			$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
			
			redirect('tours/view/'.$id, 'refresh');
		}
		
		
		
		public function edit($id = NULL)
		{	
			$tour = $this->tours_model->get_tours($id);
			
			
			$time_range = $this->ranges_model->get_ranges('Time_short');
			if ( $tour['time'] > $time_range['value_1'] )
			{
				$time_short = -1;
			}
			if ( $tour['time'] <= $time_range['value_1'] && $tour['time'] > $time_range['value_2'])
			{
				$time_short = -0.5;
			}
			if ( $tour['time'] <= $time_range['value_2'] && $tour['time'] > $time_range['value_3'])
			{
				$time_short = 0;
			}
			if ( $tour['time'] <= $time_range['value_3'] && $tour['time'] > $time_range['value_4'])
			{
				$time_short = 0.5;
			}
			if ( $tour['time'] <= $time_range['value_4'])
			{
				$time_short = 1;
			}
			
			
			$time_range = $this->ranges_model->get_ranges('Time_long');
			if ( $tour['time'] < $time_range['value_1'] )
			{
				$time_long = -1;
			}
			if ( $tour['time'] >= $time_range['value_1'] && $tour['time'] < $time_range['value_2'])
			{
				$time_long = -0.5;
			}
			if ( $tour['time'] >= $time_range['value_2'] && $tour['time'] < $time_range['value_3'])
			{
				$time_long = 0;
			}
			if ( $tour['time'] >= $time_range['value_3'] && $tour['time'] < $time_range['value_4'])
			{
				$time_long = 0.5;
			}
			if ( $tour['time'] >= $time_range['value_4'])
			{
				$time_long = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_low');
			if ( $tour['cost'] > $cost_range['value_1'] )
			{
				$cost_low = -1;
			}
			if ( $tour['cost'] <= $cost_range['value_1'] && $tour['cost'] > $cost_range['value_2'])
			{
				$cost_low = -0.5;
			}
			if ( $tour['cost'] <= $cost_range['value_2'] && $tour['cost'] > $cost_range['value_3'])
			{
				$cost_low = 0;
			}
			if ( $tour['cost'] <= $cost_range['value_3'] && $tour['cost'] > $cost_range['value_4'])
			{
				$cost_low = 0.5;
			}
			if ( $tour['cost'] <= $cost_range['value_4'])
			{
				$cost_low = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_high');
			if ( $tour['cost'] < $cost_range['value_1'] )
			{
				$cost_high = -1;
			}
			if ( $tour['cost'] >= $cost_range['value_1'] && $tour['cost'] < $cost_range['value_2'])
			{
				$cost_high = -0.5;
			}
			if ( $tour['cost'] >= $cost_range['value_2'] && $tour['cost'] < $cost_range['value_3'])
			{
				$cost_high = 0;
			}
			if ( $tour['cost'] >= $cost_range['value_3'] && $tour['cost'] < $cost_range['value_4'])
			{
				$cost_high = 0.5;
			}
			if ( $tour['cost'] >= $cost_range['value_4'])
			{
				$cost_high = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_low');
			if ( $tour['quality'] > $quality_range['value_1'] )
			{
				$quality_low = -1;
			}
			if ( $tour['quality'] <= $quality_range['value_1'] && $tour['quality'] > $quality_range['value_2'])
			{
				$quality_low = -0.5;
			}
			if ( $tour['quality'] <= $quality_range['value_2'] && $tour['quality'] > $quality_range['value_3'])
			{
				$quality_low = 0;
			}
			if ( $tour['quality'] <= $quality_range['value_3'] && $tour['quality'] > $quality_range['value_4'])
			{
				$quality_low = 0.5;
			}
			if ( $tour['quality'] <= $quality_range['value_4'])
			{
				$quality_low = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_high');
			if ( $tour['quality'] < $quality_range['value_1'] )
			{
				$quality_high = -1;
			}
			if ( $tour['quality'] >= $quality_range['value_1'] && $tour['quality'] < $quality_range['value_2'])
			{
				$quality_high = -0.5;
			}
			if ( $tour['quality'] >= $quality_range['value_2'] && $tour['quality'] < $quality_range['value_3'])
			{
				$quality_high = 0;
			}
			if ( $tour['quality'] >= $quality_range['value_3'] && $tour['quality'] < $quality_range['value_4'])
			{
				$quality_high = 0.5;
			}
			if ( $tour['quality'] >= $quality_range['value_4'])
			{
				$quality_high = 1;
			}
			
			
			if($tour['nature'] == 'Không có')
				{
					$nature = -1;
				}
				if($tour['nature'] == 'Khá ít')
				{
					$nature = -0.5;
				}
				if($tour['nature'] == 'Tương đối')
				{
					$nature = 0;
				}
				if($tour['nature'] == 'Khá nhiều')
				{
					$nature = 0.5;
				}
				if($tour['nature'] == 'Rất nhiều')
				{
					$nature = 1;
				}
				
				
				
				if($tour['adventure'] == 'Không có')
				{
					$adventure = -1;
				}
				if($tour['adventure'] == 'Khá ít')
				{
					$adventure = -0.5;
				}
				if($tour['adventure'] == 'Tương đối')
				{
					$adventure = 0;
				}
				if($tour['adventure'] == 'Khá nhiều')
				{
					$adventure = 0.5;
				}
				if($tour['adventure'] == 'Rất nhiều')
				{
					$adventure = 1;
				}
				
				
				if($tour['religious'] == 'Không có')
				{
					$religious = -1;
				}
				if($tour['religious'] == 'Khá ít')
				{
					$religious = -0.5;
				}
				if($tour['religious'] == 'Tương đối')
				{
					$religious = 0;
				}
				if($tour['religious'] == 'Khá nhiều')
				{
					$religious = 0.5;
				}
				if($tour['religious'] == 'Rất nhiều')
				{
					$religious = 1;
				}
				
				
				if($tour['health_or_medical'] == 'Không có')
				{
					$health_or_medical = -1;
				}
				if($tour['health_or_medical'] == 'Khá ít')
				{
					$health_or_medical = -0.5;
				}
				if($tour['health_or_medical'] == 'Tương đối')
				{
					$health_or_medical = 0;
				}
				if($tour['health_or_medical'] == 'Khá nhiều')
				{
					$health_or_medical = 0.5;
				}
				if($tour['health_or_medical'] == 'Rất nhiều')
				{
					$health_or_medical = 1;
				}
			
			$data = array(
				'id' => $id,
				'time_short' => $time_short,
				'time_long' => $time_long,
				'cost_low' => $cost_low,
				'cost_high' => $cost_high,
				'quality_low' => $quality_low,
				'quality_high' => $quality_high,
				'nature' => $nature,
				'adventure' => $adventure,
				'religious' => $religious,
				'health_or_medical' => $health_or_medical
			);
								
			$this->tourVector_model->edit_tourVector($data);
			
			$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
				
			redirect('tours/view/'.$id, 'refresh');		
		}
		
		
		public function delete($id = NULL)
		{
			$this->tourVector_model->delete_tourVector($id);
			
			$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
			
			redirect('tours/index', 'refresh');
		}
		
		
		public function editAll()
		{	
			$tours = $this->tours_model->get_tours();
			
			foreach ($tours as $tour)
			{
			$time_range = $this->ranges_model->get_ranges('Time_short');
			if ( $tour['time'] > $time_range['value_1'] )
			{
				$time_short = -1;
			}
			if ( $tour['time'] <= $time_range['value_1'] && $tour['time'] > $time_range['value_2'])
			{
				$time_short = -0.5;
			}
			if ( $tour['time'] <= $time_range['value_2'] && $tour['time'] > $time_range['value_3'])
			{
				$time_short = 0;
			}
			if ( $tour['time'] <= $time_range['value_3'] && $tour['time'] > $time_range['value_4'])
			{
				$time_short = 0.5;
			}
			if ( $tour['time'] <= $time_range['value_4'])
			{
				$time_short = 1;
			}
			
			
			$time_range = $this->ranges_model->get_ranges('Time_long');
			if ( $tour['time'] < $time_range['value_1'] )
			{
				$time_long = -1;
			}
			if ( $tour['time'] >= $time_range['value_1'] && $tour['time'] < $time_range['value_2'])
			{
				$time_long = -0.5;
			}
			if ( $tour['time'] >= $time_range['value_2'] && $tour['time'] < $time_range['value_3'])
			{
				$time_long = 0;
			}
			if ( $tour['time'] >= $time_range['value_3'] && $tour['time'] < $time_range['value_4'])
			{
				$time_long = 0.5;
			}
			if ( $tour['time'] >= $time_range['value_4'])
			{
				$time_long = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_low');
			if ( $tour['cost'] > $cost_range['value_1'] )
			{
				$cost_low = -1;
			}
			if ( $tour['cost'] <= $cost_range['value_1'] && $tour['cost'] > $cost_range['value_2'])
			{
				$cost_low = -0.5;
			}
			if ( $tour['cost'] <= $cost_range['value_2'] && $tour['cost'] > $cost_range['value_3'])
			{
				$cost_low = 0;
			}
			if ( $tour['cost'] <= $cost_range['value_3'] && $tour['cost'] > $cost_range['value_4'])
			{
				$cost_low = 0.5;
			}
			if ( $tour['cost'] <= $cost_range['value_4'])
			{
				$cost_low = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_high');
			if ( $tour['cost'] < $cost_range['value_1'] )
			{
				$cost_high = -1;
			}
			if ( $tour['cost'] >= $cost_range['value_1'] && $tour['cost'] < $cost_range['value_2'])
			{
				$cost_high = -0.5;
			}
			if ( $tour['cost'] >= $cost_range['value_2'] && $tour['cost'] < $cost_range['value_3'])
			{
				$cost_high = 0;
			}
			if ( $tour['cost'] >= $cost_range['value_3'] && $tour['cost'] < $cost_range['value_4'])
			{
				$cost_high = 0.5;
			}
			if ( $tour['cost'] >= $cost_range['value_4'])
			{
				$cost_high = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_low');
			if ( $tour['quality'] > $quality_range['value_1'] )
			{
				$quality_low = -1;
			}
			if ( $tour['quality'] <= $quality_range['value_1'] && $tour['quality'] > $quality_range['value_2'])
			{
				$quality_low = -0.5;
			}
			if ( $tour['quality'] <= $quality_range['value_2'] && $tour['quality'] > $quality_range['value_3'])
			{
				$quality_low = 0;
			}
			if ( $tour['quality'] <= $quality_range['value_3'] && $tour['quality'] > $quality_range['value_4'])
			{
				$quality_low = 0.5;
			}
			if ( $tour['quality'] <= $quality_range['value_4'])
			{
				$quality_low = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_high');
			if ( $tour['quality'] < $quality_range['value_1'] )
			{
				$quality_high = -1;
			}
			if ( $tour['quality'] >= $quality_range['value_1'] && $tour['quality'] < $quality_range['value_2'])
			{
				$quality_high = -0.5;
			}
			if ( $tour['quality'] >= $quality_range['value_2'] && $tour['quality'] < $quality_range['value_3'])
			{
				$quality_high = 0;
			}
			if ( $tour['quality'] >= $quality_range['value_3'] && $tour['quality'] < $quality_range['value_4'])
			{
				$quality_high = 0.5;
			}
			if ( $tour['quality'] >= $quality_range['value_4'])
			{
				$quality_high = 1;
			}
			
			
			if($tour['nature'] == 'Không có')
				{
					$nature = -1;
				}
				if($tour['nature'] == 'Khá ít')
				{
					$nature = -0.5;
				}
				if($tour['nature'] == 'Tương đối')
				{
					$nature = 0;
				}
				if($tour['nature'] == 'Khá nhiều')
				{
					$nature = 0.5;
				}
				if($tour['nature'] == 'Rất nhiều')
				{
					$nature = 1;
				}
				
				
				
				if($tour['adventure'] == 'Không có')
				{
					$adventure = -1;
				}
				if($tour['adventure'] == 'Khá ít')
				{
					$adventure = -0.5;
				}
				if($tour['adventure'] == 'Tương đối')
				{
					$adventure = 0;
				}
				if($tour['adventure'] == 'Khá nhiều')
				{
					$adventure = 0.5;
				}
				if($tour['adventure'] == 'Rất nhiều')
				{
					$adventure = 1;
				}
				
				
				if($tour['religious'] == 'Không có')
				{
					$religious = -1;
				}
				if($tour['religious'] == 'Khá ít')
				{
					$religious = -0.5;
				}
				if($tour['religious'] == 'Tương đối')
				{
					$religious = 0;
				}
				if($tour['religious'] == 'Khá nhiều')
				{
					$religious = 0.5;
				}
				if($tour['religious'] == 'Rất nhiều')
				{
					$religious = 1;
				}
				
				
				if($tour['health_or_medical'] == 'Không có')
				{
					$health_or_medical = -1;
				}
				if($tour['health_or_medical'] == 'Khá ít')
				{
					$health_or_medical = -0.5;
				}
				if($tour['health_or_medical'] == 'Tương đối')
				{
					$health_or_medical = 0;
				}
				if($tour['health_or_medical'] == 'Khá nhiều')
				{
					$health_or_medical = 0.5;
				}
				if($tour['health_or_medical'] == 'Rất nhiều')
				{
					$health_or_medical = 1;
				}
			
			$data = array(
				'id' => $tour['id'],
				'time_short' => $time_short,
				'time_long' => $time_long,
				'cost_low' => $cost_low,
				'cost_high' => $cost_high,
				'quality_low' => $quality_low,
				'quality_high' => $quality_high,
				'nature' => $nature,
				'adventure' => $adventure,
				'religious' => $religious,
				'health_or_medical' => $health_or_medical
			);
									
				$this->tourVector_model->edit_tourVector($data);
			}
			
			$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
			$this->session->keep_flashdata('message');
				
			redirect('ranges/index', 'refresh');		
		}
		
}