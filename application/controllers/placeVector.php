<?php
class placeVector extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('placeVector_model');
				$this->load->model('places_model');
				$this->load->model('ranges_model');
                $this->load->helper('url_helper');
        }
		
		
		
		public function create($id = NULL)
		{				
			$place = $this->places_model->get_places($id);
			
			
			$time_range = $this->ranges_model->get_ranges('Time_short');
			if ( $place['time'] > $time_range['value_1'] )
			{
				$time_short = -1;
			}
			if ( $place['time'] <= $time_range['value_1'] && $place['time'] > $time_range['value_2'])
			{
				$time_short = -0.5;
			}
			if ( $place['time'] <= $time_range['value_2'] && $place['time'] > $time_range['value_3'])
			{
				$time_short = 0;
			}
			if ( $place['time'] <= $time_range['value_3'] && $place['time'] > $time_range['value_4'])
			{
				$time_short = 0.5;
			}
			if ( $place['time'] <= $time_range['value_4'])
			{
				$time_short = 1;
			}
			
			
			$time_range = $this->ranges_model->get_ranges('Time_long');
			if ( $place['time'] < $time_range['value_1'] )
			{
				$time_long = -1;
			}
			if ( $place['time'] >= $time_range['value_1'] && $place['time'] < $time_range['value_2'])
			{
				$time_long = -0.5;
			}
			if ( $place['time'] >= $time_range['value_2'] && $place['time'] < $time_range['value_3'])
			{
				$time_long = 0;
			}
			if ( $place['time'] >= $time_range['value_3'] && $place['time'] < $time_range['value_4'])
			{
				$time_long = 0.5;
			}
			if ( $place['time'] >= $time_range['value_4'])
			{
				$time_long = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_low');
			if ( $place['cost'] > $cost_range['value_1'] )
			{
				$cost_low = -1;
			}
			if ( $place['cost'] <= $cost_range['value_1'] && $place['cost'] > $cost_range['value_2'])
			{
				$cost_low = -0.5;
			}
			if ( $place['cost'] <= $cost_range['value_2'] && $place['cost'] > $cost_range['value_3'])
			{
				$cost_low = 0;
			}
			if ( $place['cost'] <= $cost_range['value_3'] && $place['cost'] > $cost_range['value_4'])
			{
				$cost_low = 0.5;
			}
			if ( $place['cost'] <= $cost_range['value_4'])
			{
				$cost_low = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_high');
			if ( $place['cost'] < $cost_range['value_1'] )
			{
				$cost_high = -1;
			}
			if ( $place['cost'] >= $cost_range['value_1'] && $place['cost'] < $cost_range['value_2'])
			{
				$cost_high = -0.5;
			}
			if ( $place['cost'] >= $cost_range['value_2'] && $place['cost'] < $cost_range['value_3'])
			{
				$cost_high = 0;
			}
			if ( $place['cost'] >= $cost_range['value_3'] && $place['cost'] < $cost_range['value_4'])
			{
				$cost_high = 0.5;
			}
			if ( $place['cost'] >= $cost_range['value_4'])
			{
				$cost_high = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_low');
			if ( $place['quality'] > $quality_range['value_1'] )
			{
				$quality_low = -1;
			}
			if ( $place['quality'] <= $quality_range['value_1'] && $place['quality'] > $quality_range['value_2'])
			{
				$quality_low = -0.5;
			}
			if ( $place['quality'] <= $quality_range['value_2'] && $place['quality'] > $quality_range['value_3'])
			{
				$quality_low = 0;
			}
			if ( $place['quality'] <= $quality_range['value_3'] && $place['quality'] > $quality_range['value_4'])
			{
				$quality_low = 0.5;
			}
			if ( $place['quality'] <= $quality_range['value_4'])
			{
				$quality_low = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_high');
			if ( $place['quality'] < $quality_range['value_1'] )
			{
				$quality_high = -1;
			}
			if ( $place['quality'] >= $quality_range['value_1'] && $place['quality'] < $quality_range['value_2'])
			{
				$quality_high = -0.5;
			}
			if ( $place['quality'] >= $quality_range['value_2'] && $place['quality'] < $quality_range['value_3'])
			{
				$quality_high = 0;
			}
			if ( $place['quality'] >= $quality_range['value_3'] && $place['quality'] < $quality_range['value_4'])
			{
				$quality_high = 0.5;
			}
			if ( $place['quality'] >= $quality_range['value_4'])
			{
				$quality_high = 1;
			}
			
			
			if($place['nature'] == 'Không có')
				{
					$nature = -1;
				}
				if($place['nature'] == 'Khá ít')
				{
					$nature = -0.5;
				}
				if($place['nature'] == 'Tương đối')
				{
					$nature = 0;
				}
				if($place['nature'] == 'Khá nhiều')
				{
					$nature = 0.5;
				}
				if($place['nature'] == 'Rất nhiều')
				{
					$nature = 1;
				}
				
				
				
				if($place['adventure'] == 'Không có')
				{
					$adventure = -1;
				}
				if($place['adventure'] == 'Khá ít')
				{
					$adventure = -0.5;
				}
				if($place['adventure'] == 'Tương đối')
				{
					$adventure = 0;
				}
				if($place['adventure'] == 'Khá nhiều')
				{
					$adventure = 0.5;
				}
				if($place['adventure'] == 'Rất nhiều')
				{
					$adventure = 1;
				}
				
				
				if($place['religious'] == 'Không có')
				{
					$religious = -1;
				}
				if($place['religious'] == 'Khá ít')
				{
					$religious = -0.5;
				}
				if($place['religious'] == 'Tương đối')
				{
					$religious = 0;
				}
				if($place['religious'] == 'Khá nhiều')
				{
					$religious = 0.5;
				}
				if($place['religious'] == 'Rất nhiều')
				{
					$religious = 1;
				}
				
				
				if($place['health_or_medical'] == 'Không có')
				{
					$health_or_medical = -1;
				}
				if($place['health_or_medical'] == 'Khá ít')
				{
					$health_or_medical = -0.5;
				}
				if($place['health_or_medical'] == 'Tương đối')
				{
					$health_or_medical = 0;
				}
				if($place['health_or_medical'] == 'Khá nhiều')
				{
					$health_or_medical = 0.5;
				}
				if($place['health_or_medical'] == 'Rất nhiều')
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
			
			$this->placeVector_model->set_placeVector($data);
			
			$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
			$this->session->keep_flashdata('message');
			
			redirect('places/view/'.$id, 'refresh');
		}
		
		
		
		public function edit($id = NULL)
		{	
			$place = $this->places_model->get_places($id);
			
			
			$time_range = $this->ranges_model->get_ranges('Time_short');
			if ( $place['time'] > $time_range['value_1'] )
			{
				$time_short = -1;
			}
			if ( $place['time'] <= $time_range['value_1'] && $place['time'] > $time_range['value_2'])
			{
				$time_short = -0.5;
			}
			if ( $place['time'] <= $time_range['value_2'] && $place['time'] > $time_range['value_3'])
			{
				$time_short = 0;
			}
			if ( $place['time'] <= $time_range['value_3'] && $place['time'] > $time_range['value_4'])
			{
				$time_short = 0.5;
			}
			if ( $place['time'] <= $time_range['value_4'])
			{
				$time_short = 1;
			}
			
			
			$time_range = $this->ranges_model->get_ranges('Time_long');
			if ( $place['time'] < $time_range['value_1'] )
			{
				$time_long = -1;
			}
			if ( $place['time'] >= $time_range['value_1'] && $place['time'] < $time_range['value_2'])
			{
				$time_long = -0.5;
			}
			if ( $place['time'] >= $time_range['value_2'] && $place['time'] < $time_range['value_3'])
			{
				$time_long = 0;
			}
			if ( $place['time'] >= $time_range['value_3'] && $place['time'] < $time_range['value_4'])
			{
				$time_long = 0.5;
			}
			if ( $place['time'] >= $time_range['value_4'])
			{
				$time_long = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_low');
			if ( $place['cost'] > $cost_range['value_1'] )
			{
				$cost_low = -1;
			}
			if ( $place['cost'] <= $cost_range['value_1'] && $place['cost'] > $cost_range['value_2'])
			{
				$cost_low = -0.5;
			}
			if ( $place['cost'] <= $cost_range['value_2'] && $place['cost'] > $cost_range['value_3'])
			{
				$cost_low = 0;
			}
			if ( $place['cost'] <= $cost_range['value_3'] && $place['cost'] > $cost_range['value_4'])
			{
				$cost_low = 0.5;
			}
			if ( $place['cost'] <= $cost_range['value_4'])
			{
				$cost_low = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_high');
			if ( $place['cost'] < $cost_range['value_1'] )
			{
				$cost_high = -1;
			}
			if ( $place['cost'] >= $cost_range['value_1'] && $place['cost'] < $cost_range['value_2'])
			{
				$cost_high = -0.5;
			}
			if ( $place['cost'] >= $cost_range['value_2'] && $place['cost'] < $cost_range['value_3'])
			{
				$cost_high = 0;
			}
			if ( $place['cost'] >= $cost_range['value_3'] && $place['cost'] < $cost_range['value_4'])
			{
				$cost_high = 0.5;
			}
			if ( $place['cost'] >= $cost_range['value_4'])
			{
				$cost_high = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_low');
			if ( $place['quality'] > $quality_range['value_1'] )
			{
				$quality_low = -1;
			}
			if ( $place['quality'] <= $quality_range['value_1'] && $place['quality'] > $quality_range['value_2'])
			{
				$quality_low = -0.5;
			}
			if ( $place['quality'] <= $quality_range['value_2'] && $place['quality'] > $quality_range['value_3'])
			{
				$quality_low = 0;
			}
			if ( $place['quality'] <= $quality_range['value_3'] && $place['quality'] > $quality_range['value_4'])
			{
				$quality_low = 0.5;
			}
			if ( $place['quality'] <= $quality_range['value_4'])
			{
				$quality_low = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_high');
			if ( $place['quality'] < $quality_range['value_1'] )
			{
				$quality_high = -1;
			}
			if ( $place['quality'] >= $quality_range['value_1'] && $place['quality'] < $quality_range['value_2'])
			{
				$quality_high = -0.5;
			}
			if ( $place['quality'] >= $quality_range['value_2'] && $place['quality'] < $quality_range['value_3'])
			{
				$quality_high = 0;
			}
			if ( $place['quality'] >= $quality_range['value_3'] && $place['quality'] < $quality_range['value_4'])
			{
				$quality_high = 0.5;
			}
			if ( $place['quality'] >= $quality_range['value_4'])
			{
				$quality_high = 1;
			}
			
			
			if($place['nature'] == 'Không có')
				{
					$nature = -1;
				}
				if($place['nature'] == 'Khá ít')
				{
					$nature = -0.5;
				}
				if($place['nature'] == 'Tương đối')
				{
					$nature = 0;
				}
				if($place['nature'] == 'Khá nhiều')
				{
					$nature = 0.5;
				}
				if($place['nature'] == 'Rất nhiều')
				{
					$nature = 1;
				}
				
				
				
				if($place['adventure'] == 'Không có')
				{
					$adventure = -1;
				}
				if($place['adventure'] == 'Khá ít')
				{
					$adventure = -0.5;
				}
				if($place['adventure'] == 'Tương đối')
				{
					$adventure = 0;
				}
				if($place['adventure'] == 'Khá nhiều')
				{
					$adventure = 0.5;
				}
				if($place['adventure'] == 'Rất nhiều')
				{
					$adventure = 1;
				}
				
				
				if($place['religious'] == 'Không có')
				{
					$religious = -1;
				}
				if($place['religious'] == 'Khá ít')
				{
					$religious = -0.5;
				}
				if($place['religious'] == 'Tương đối')
				{
					$religious = 0;
				}
				if($place['religious'] == 'Khá nhiều')
				{
					$religious = 0.5;
				}
				if($place['religious'] == 'Rất nhiều')
				{
					$religious = 1;
				}
				
				
				if($place['health_or_medical'] == 'Không có')
				{
					$health_or_medical = -1;
				}
				if($place['health_or_medical'] == 'Khá ít')
				{
					$health_or_medical = -0.5;
				}
				if($place['health_or_medical'] == 'Tương đối')
				{
					$health_or_medical = 0;
				}
				if($place['health_or_medical'] == 'Khá nhiều')
				{
					$health_or_medical = 0.5;
				}
				if($place['health_or_medical'] == 'Rất nhiều')
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
								
			$this->placeVector_model->edit_placeVector($data);	
			
			$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
			
			redirect('places/view/'.$id, 'refresh');		
		}
		
		
		public function delete($id = NULL)
		{
			$this->placeVector_model->delete_placeVector($id);
			
			$this->session->set_flashdata('message', 'Bạn đã thực hiện thành công');
				$this->session->keep_flashdata('message');
			
			redirect('places/index', 'refresh');
		}
		
		
		public function editAll()
		{	
			$places = $this->places_model->get_places();
			
			foreach ($places as $place)
			{
			$time_range = $this->ranges_model->get_ranges('Time_short');
			if ( $place['time'] > $time_range['value_1'] )
			{
				$time_short = -1;
			}
			if ( $place['time'] <= $time_range['value_1'] && $place['time'] > $time_range['value_2'])
			{
				$time_short = -0.5;
			}
			if ( $place['time'] <= $time_range['value_2'] && $place['time'] > $time_range['value_3'])
			{
				$time_short = 0;
			}
			if ( $place['time'] <= $time_range['value_3'] && $place['time'] > $time_range['value_4'])
			{
				$time_short = 0.5;
			}
			if ( $place['time'] <= $time_range['value_4'])
			{
				$time_short = 1;
			}
			
			
			$time_range = $this->ranges_model->get_ranges('Time_long');
			if ( $place['time'] < $time_range['value_1'] )
			{
				$time_long = -1;
			}
			if ( $place['time'] >= $time_range['value_1'] && $place['time'] < $time_range['value_2'])
			{
				$time_long = -0.5;
			}
			if ( $place['time'] >= $time_range['value_2'] && $place['time'] < $time_range['value_3'])
			{
				$time_long = 0;
			}
			if ( $place['time'] >= $time_range['value_3'] && $place['time'] < $time_range['value_4'])
			{
				$time_long = 0.5;
			}
			if ( $place['time'] >= $time_range['value_4'])
			{
				$time_long = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_low');
			if ( $place['cost'] > $cost_range['value_1'] )
			{
				$cost_low = -1;
			}
			if ( $place['cost'] <= $cost_range['value_1'] && $place['cost'] > $cost_range['value_2'])
			{
				$cost_low = -0.5;
			}
			if ( $place['cost'] <= $cost_range['value_2'] && $place['cost'] > $cost_range['value_3'])
			{
				$cost_low = 0;
			}
			if ( $place['cost'] <= $cost_range['value_3'] && $place['cost'] > $cost_range['value_4'])
			{
				$cost_low = 0.5;
			}
			if ( $place['cost'] <= $cost_range['value_4'])
			{
				$cost_low = 1;
			}
			
			
			$cost_range = $this->ranges_model->get_ranges('Cost_high');
			if ( $place['cost'] < $cost_range['value_1'] )
			{
				$cost_high = -1;
			}
			if ( $place['cost'] >= $cost_range['value_1'] && $place['cost'] < $cost_range['value_2'])
			{
				$cost_high = -0.5;
			}
			if ( $place['cost'] >= $cost_range['value_2'] && $place['cost'] < $cost_range['value_3'])
			{
				$cost_high = 0;
			}
			if ( $place['cost'] >= $cost_range['value_3'] && $place['cost'] < $cost_range['value_4'])
			{
				$cost_high = 0.5;
			}
			if ( $place['cost'] >= $cost_range['value_4'])
			{
				$cost_high = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_low');
			if ( $place['quality'] > $quality_range['value_1'] )
			{
				$quality_low = -1;
			}
			if ( $place['quality'] <= $quality_range['value_1'] && $place['quality'] > $quality_range['value_2'])
			{
				$quality_low = -0.5;
			}
			if ( $place['quality'] <= $quality_range['value_2'] && $place['quality'] > $quality_range['value_3'])
			{
				$quality_low = 0;
			}
			if ( $place['quality'] <= $quality_range['value_3'] && $place['quality'] > $quality_range['value_4'])
			{
				$quality_low = 0.5;
			}
			if ( $place['quality'] <= $quality_range['value_4'])
			{
				$quality_low = 1;
			}
			
			
			$quality_range = $this->ranges_model->get_ranges('Quality_high');
			if ( $place['quality'] < $quality_range['value_1'] )
			{
				$quality_high = -1;
			}
			if ( $place['quality'] >= $quality_range['value_1'] && $place['quality'] < $quality_range['value_2'])
			{
				$quality_high = -0.5;
			}
			if ( $place['quality'] >= $quality_range['value_2'] && $place['quality'] < $quality_range['value_3'])
			{
				$quality_high = 0;
			}
			if ( $place['quality'] >= $quality_range['value_3'] && $place['quality'] < $quality_range['value_4'])
			{
				$quality_high = 0.5;
			}
			if ( $place['quality'] >= $quality_range['value_4'])
			{
				$quality_high = 1;
			}
			
			
			if($place['nature'] == 'Không có')
				{
					$nature = -1;
				}
				if($place['nature'] == 'Khá ít')
				{
					$nature = -0.5;
				}
				if($place['nature'] == 'Tương đối')
				{
					$nature = 0;
				}
				if($place['nature'] == 'Khá nhiều')
				{
					$nature = 0.5;
				}
				if($place['nature'] == 'Rất nhiều')
				{
					$nature = 1;
				}
				
				
				
				if($place['adventure'] == 'Không có')
				{
					$adventure = -1;
				}
				if($place['adventure'] == 'Khá ít')
				{
					$adventure = -0.5;
				}
				if($place['adventure'] == 'Tương đối')
				{
					$adventure = 0;
				}
				if($place['adventure'] == 'Khá nhiều')
				{
					$adventure = 0.5;
				}
				if($place['adventure'] == 'Rất nhiều')
				{
					$adventure = 1;
				}
				
				
				if($place['religious'] == 'Không có')
				{
					$religious = -1;
				}
				if($place['religious'] == 'Khá ít')
				{
					$religious = -0.5;
				}
				if($place['religious'] == 'Tương đối')
				{
					$religious = 0;
				}
				if($place['religious'] == 'Khá nhiều')
				{
					$religious = 0.5;
				}
				if($place['religious'] == 'Rất nhiều')
				{
					$religious = 1;
				}
				
				
				if($place['health_or_medical'] == 'Không có')
				{
					$health_or_medical = -1;
				}
				if($place['health_or_medical'] == 'Khá ít')
				{
					$health_or_medical = -0.5;
				}
				if($place['health_or_medical'] == 'Tương đối')
				{
					$health_or_medical = 0;
				}
				if($place['health_or_medical'] == 'Khá nhiều')
				{
					$health_or_medical = 0.5;
				}
				if($place['health_or_medical'] == 'Rất nhiều')
				{
					$health_or_medical = 1;
				}
			
			$data = array(
				'id' => $place['id'],
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
									
				$this->placeVector_model->edit_placeVector($data);
			}	
			redirect('tourvector/editAll', 'refresh');		
		}
		
}