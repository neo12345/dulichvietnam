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
			
			
			if($place['nature'] == 'Khong co')
				{
					$nature = -1;
				}
				if($place['nature'] == 'It')
				{
					$nature = -0.5;
				}
				if($place['nature'] == 'Tuong doi')
				{
					$nature = 0;
				}
				if($place['nature'] == 'Kha nhieu')
				{
					$nature = 0.5;
				}
				if($place['nature'] == 'Rat nhieu')
				{
					$nature = 1;
				}
				
				
				
				if($place['adventure'] == 'Khong co')
				{
					$adventure = -1;
				}
				if($place['adventure'] == 'It')
				{
					$adventure = -0.5;
				}
				if($place['adventure'] == 'Tuong doi')
				{
					$adventure = 0;
				}
				if($place['adventure'] == 'Kha nhieu')
				{
					$adventure = 0.5;
				}
				if($place['adventure'] == 'Rat nhieu')
				{
					$adventure = 1;
				}
				
				
				if($place['religious'] == 'Khong co')
				{
					$religious = -1;
				}
				if($place['religious'] == 'It')
				{
					$religious = -0.5;
				}
				if($place['religious'] == 'Tuong doi')
				{
					$religious = 0;
				}
				if($place['religious'] == 'Kha nhieu')
				{
					$religious = 0.5;
				}
				if($place['religious'] == 'Rat nhieu')
				{
					$religious = 1;
				}
				
				
				if($place['health_or_medical'] == 'Khong co')
				{
					$health_or_medical = -1;
				}
				if($place['health_or_medical'] == 'It')
				{
					$health_or_medical = -0.5;
				}
				if($place['health_or_medical'] == 'Tuong doi')
				{
					$health_or_medical = 0;
				}
				if($place['health_or_medical'] == 'Kha nhieu')
				{
					$health_or_medical = 0.5;
				}
				if($place['health_or_medical'] == 'Rat nhieu')
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
			
			
			if($place['nature'] == 'Khong co')
				{
					$nature = -1;
				}
				if($place['nature'] == 'It')
				{
					$nature = -0.5;
				}
				if($place['nature'] == 'Tuong doi')
				{
					$nature = 0;
				}
				if($place['nature'] == 'Kha nhieu')
				{
					$nature = 0.5;
				}
				if($place['nature'] == 'Rat nhieu')
				{
					$nature = 1;
				}
				
				
				
				if($place['adventure'] == 'Khong co')
				{
					$adventure = -1;
				}
				if($place['adventure'] == 'It')
				{
					$adventure = -0.5;
				}
				if($place['adventure'] == 'Tuong doi')
				{
					$adventure = 0;
				}
				if($place['adventure'] == 'Kha nhieu')
				{
					$adventure = 0.5;
				}
				if($place['adventure'] == 'Rat nhieu')
				{
					$adventure = 1;
				}
				
				
				if($place['religious'] == 'Khong co')
				{
					$religious = -1;
				}
				if($place['religious'] == 'It')
				{
					$religious = -0.5;
				}
				if($place['religious'] == 'Tuong doi')
				{
					$religious = 0;
				}
				if($place['religious'] == 'Kha nhieu')
				{
					$religious = 0.5;
				}
				if($place['religious'] == 'Rat nhieu')
				{
					$religious = 1;
				}
				
				
				if($place['health_or_medical'] == 'Khong co')
				{
					$health_or_medical = -1;
				}
				if($place['health_or_medical'] == 'It')
				{
					$health_or_medical = -0.5;
				}
				if($place['health_or_medical'] == 'Tuong doi')
				{
					$health_or_medical = 0;
				}
				if($place['health_or_medical'] == 'Kha nhieu')
				{
					$health_or_medical = 0.5;
				}
				if($place['health_or_medical'] == 'Rat nhieu')
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
			redirect('places/view/'.$id, 'refresh');		
		}
		
		
		public function delete($id = NULL)
		{
			$this->placeVector_model->delete_placeVector($id);
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
			
			
			if($place['nature'] == 'Khong co')
				{
					$nature = -1;
				}
				if($place['nature'] == 'It')
				{
					$nature = -0.5;
				}
				if($place['nature'] == 'Tuong doi')
				{
					$nature = 0;
				}
				if($place['nature'] == 'Kha nhieu')
				{
					$nature = 0.5;
				}
				if($place['nature'] == 'Rat nhieu')
				{
					$nature = 1;
				}
				
				
				
				if($place['adventure'] == 'Khong co')
				{
					$adventure = -1;
				}
				if($place['adventure'] == 'It')
				{
					$adventure = -0.5;
				}
				if($place['adventure'] == 'Tuong doi')
				{
					$adventure = 0;
				}
				if($place['adventure'] == 'Kha nhieu')
				{
					$adventure = 0.5;
				}
				if($place['adventure'] == 'Rat nhieu')
				{
					$adventure = 1;
				}
				
				
				if($place['religious'] == 'Khong co')
				{
					$religious = -1;
				}
				if($place['religious'] == 'It')
				{
					$religious = -0.5;
				}
				if($place['religious'] == 'Tuong doi')
				{
					$religious = 0;
				}
				if($place['religious'] == 'Kha nhieu')
				{
					$religious = 0.5;
				}
				if($place['religious'] == 'Rat nhieu')
				{
					$religious = 1;
				}
				
				
				if($place['health_or_medical'] == 'Khong co')
				{
					$health_or_medical = -1;
				}
				if($place['health_or_medical'] == 'It')
				{
					$health_or_medical = -0.5;
				}
				if($place['health_or_medical'] == 'Tuong doi')
				{
					$health_or_medical = 0;
				}
				if($place['health_or_medical'] == 'Kha nhieu')
				{
					$health_or_medical = 0.5;
				}
				if($place['health_or_medical'] == 'Rat nhieu')
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