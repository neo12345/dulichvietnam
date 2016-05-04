<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
				$this->load->model('posts_model');
				$this->load->model('places_model');
				$this->load->model('placevector_model');
				$this->load->model('tours_model');
				$this->load->model('tourvector_model');
				$this->load->model('useranswers_model');
                $this->load->helper('url_helper');
        } 
	 
	public function index()
	{	
		if(!isset($this->session->userdata['user']['id']))
		{			
			$data['newsList'] = $this->news_model->get_recent_news();
			$data['postsList'] = $this->posts_model->get_recent_posts();
			$data['placesList'] = $this->places_model->get_recent_places();
			$data['toursList'] = $this->tours_model->get_recent_tours();
		}
		
		else
		{
			$data['newsList'] = $this->news_model->get_recent_news();
			$data['postsList'] = $this->posts_model->get_recent_posts();
			
			$user = $this->useranswers_model->get_useranswers($this->session->userdata['user']['id']);
			
			$placevector = $this->placevector_model->get_placevector();
			
			foreach ($placevector as $place)
			{
				if($user['time_short'] == NULL)
				{
					$user['time'] = $user['time_long'];
					$place['time'] = $place['time_long'];
					
					if (!isset($place['time']))
					{
						$time = 0;
					}
					else if($user['time_priotity'] == 0)
					{
						$time = -1/7 * abs($place['time']);
					}
					else
					{
						$time =  $user['time_priotity'] * abs($user['time'] - $place['time']);
					}
				}
				else
				{
					$user['time'] = $user['time_short'];
					$place['time'] = $place['time_short'];
					
					if (!isset($place['time']))
					{
						$time = 0;
					}
					else if($user['time_priotity'] == 0)
					{
						$time = -1/7 * abs($place['time']);
					}
					else
					{
						$time =  $user['time_priotity'] * abs($user['time'] - $place['time']);
					}
				}
				
			
				
				if($user['cost_low'] == NULL)
				{
					$user['cost'] = $user['cost_high'];
					$place['cost'] = $place['cost_high'];
					
					if (!isset($place['cost']))
					{
						$cost = 0;
					}
					else if($user['cost_priotity'] == 0)
					{
						$cost = -1/7 * abs($place['cost']);
					}
					else
					{
						$cost =  $user['cost_priotity'] * abs($user['cost'] - $place['cost']);
					}
				}
				else
				{
					$user['cost'] = $user['cost_low'];
					$place['cost'] = $place['cost_low'];
					
					if (!isset($place['cost']))
					{
						$cost = 0;
					}
					else if($user['cost_priotity'] == 0)
					{
						$cost = -1/7 * abs($place['cost']);
					}
					else
					{
						$cost =  $user['cost_priotity'] * abs($user['cost'] - $place['cost']);
					}
				}
				
				
				
				if($user['quality_low'] == NULL)
				{
					$user['quality'] = $user['quality_high'];
					$place['quality'] = $place['quality_high'];
					
					if (!isset($place['quality']))
					{
						$quality = 0;
					}
					else if($user['quality_priotity'] == 0)
					{
						$quality = -1/7 * abs($place['quality']);
					}
					else
					{
						$quality =  $user['quality_priotity'] * abs($user['quality'] - $place['quality']);
					}
				}
				else
				{
					$user['quality'] = $user['quality_low'];
					$place['quality'] = $place['quality_low'];
					
					if (!isset($place['quality']))
					{
						$quality = 0;
					}
					else if($user['quality_priotity'] == 0)
					{
						$quality = -1/7 * abs($place['quality']);
					}
					else
					{
						$quality =  $user['quality_priotity'] * abs($user['quality'] - $place['quality']);
					}
				}
				
				
				
				if($user['nature_low'] == NULL)
				{
					$user['nature'] = $user['nature_high'];
					$place['nature'] = $place['nature_high'];
					
					if (!isset($place['nature']))
					{
						$nature = 0;
					}
					else if($user['nature_priotity'] == 0)
					{
						$nature = -1/7 * abs($place['nature']);
					}
					else
					{
						$nature =  $user['nature_priotity'] * abs($user['nature'] - $place['nature']);
					}
				}
				else
				{
					$user['nature'] = $user['nature_low'];
					$place['nature'] = $place['nature_low'];
					
					if (!isset($place['nature']))
					{
						$nature = 0;
					}
					else if($user['nature_priotity'] == 0)
					{
						$nature = -1/7 * abs($place['nature']);
					}
					else
					{
						$nature =  $user['nature_priotity'] * abs($user['nature'] - $place['nature']);
					}
				}
				
				
				
				if($user['adventure_low'] == NULL)
				{
					$user['adventure'] = $user['adventure_high'];
					$place['adventure'] = $place['adventure_high'];
					
					if (!isset($place['adventure']))
					{
						$adventure = 0;
					}
					else if($user['adventure_priotity'] == 0)
					{
						$adventure = -1/7 * abs($place['adventure']);
					}
					else
					{
						$adventure =  $user['adventure_priotity'] * abs($user['adventure'] - $place['adventure']);
					}
				}
				else
				{
					$user['adventure'] = $user['adventure_low'];
					$place['adventure'] = $place['adventure_low'];
					
					if (!isset($place['adventure']))
					{
						$adventure = 0;
					}
					else if($user['adventure_priotity'] == 0)
					{
						$adventure = -1/7 * abs($place['adventure']);
					}
					else
					{
						$adventure =  $user['adventure_priotity'] * abs($user['adventure'] - $place['adventure']);
					}
				}
				
				
				if($user['religious_low'] == NULL)
				{
					$user['religious'] = $user['religious_high'];
					$place['religious'] = $place['religious_high'];
					
					if (!isset($place['religious']))
					{
						$religious = 0;
					}
					else if($user['religious_priotity'] == 0)
					{
						$religious = -1/7 * abs($place['religious']);
					}
					else
					{
						$religious =  $user['religious_priotity'] * abs($user['religious'] - $place['religious']);
					}
				}
				else
				{
					$user['religious'] = $user['religious_low'];
					$place['religious'] = $place['religious_low'];
					
					if (!isset($place['religious']))
					{
						$religious = 0;
					}
					else if($user['religious_priotity'] == 0)
					{
						$religious = -1/7 * abs($place['religious']);
					}
					else
					{
						$religious =  $user['religious_priotity'] * abs($user['religious'] - $place['religious']);
					}
				}
				
				
				if($user['health_or_medical_low'] == NULL)
				{
					$user['health_or_medical'] = $user['health_or_medical_high'];
					$place['health_or_medical'] = $place['health_or_medical_high'];
					
					if (!isset($place['health_or_medical']))
					{
						$health_or_medical = 0;
					}
					else if($user['health_or_medical_priotity'] == 0)
					{
						$health_or_medical = -1/7 * abs($place['health_or_medical']);
					}
					else
					{
						$health_or_medical =  $user['health_or_medical_priotity'] * abs($user['health_or_medical'] - $place['health_or_medical']);
					}
				}
				else
				{
					$user['health_or_medical'] = $user['health_or_medical_low'];
					$place['health_or_medical'] = $place['health_or_medical_low'];
					
					if (!isset($place['health_or_medical']))
					{
						$health_or_medical = 0;
					}
					else if($user['health_or_medical_priotity'] == 0)
					{
						$health_or_medical = -1/7 * abs($place['health_or_medical']);
					}
					else
					{
						$health_or_medical =  $user['health_or_medical_priotity'] * abs($user['health_or_medical'] - $place['health_or_medical']);
					}
				}
				
				
				
				$dist = 1/7 * ((1- $time) + (1 - $cost) + (1 - $quality) + (1 - $nature) + (1 - $adventure) + (1 - $religious) + (1 - $health_or_medical));
				$placeslist[] = array ($place, $dist);		
			}
		asort($placeslist);
		foreach ($placeslist as $p)
		{
			$data['placesList'][] = $this->places_model->get_places($p[0]['id']);
		}
		
		
		$tourvector = $this->tourvector_model->get_tourvector();
			
			foreach ($tourvector as $tour)
			{
				if($user['time_short'] == NULL)
				{
					$user['time'] = $user['time_long'];
					$place['time'] = $place['time_long'];
					
					if (!isset($place['time']))
					{
						$time = 0;
					}
					else if($user['time_priotity'] == 0)
					{
						$time = -1/7 * abs($place['time']);
					}
					else
					{
						$time =  $user['time_priotity'] * abs($user['time'] - $place['time']);
					}
				}
				else
				{
					$user['time'] = $user['time_short'];
					$place['time'] = $place['time_short'];
					
					if (!isset($place['time']))
					{
						$time = 0;
					}
					else if($user['time_priotity'] == 0)
					{
						$time = -1/7 * abs($place['time']);
					}
					else
					{
						$time =  $user['time_priotity'] * abs($user['time'] - $place['time']);
					}
				}
				
			
				
				if($user['cost_low'] == NULL)
				{
					$user['cost'] = $user['cost_high'];
					$place['cost'] = $place['cost_high'];
					
					if (!isset($place['cost']))
					{
						$cost = 0;
					}
					else if($user['cost_priotity'] == 0)
					{
						$cost = -1/7 * abs($place['cost']);
					}
					else
					{
						$cost =  $user['cost_priotity'] * abs($user['cost'] - $place['cost']);
					}
				}
				else
				{
					$user['cost'] = $user['cost_low'];
					$place['cost'] = $place['cost_low'];
					
					if (!isset($place['cost']))
					{
						$cost = 0;
					}
					else if($user['cost_priotity'] == 0)
					{
						$cost = -1/7 * abs($place['cost']);
					}
					else
					{
						$cost =  $user['cost_priotity'] * abs($user['cost'] - $place['cost']);
					}
				}
				
				
				
				if($user['quality_low'] == NULL)
				{
					$user['quality'] = $user['quality_high'];
					$place['quality'] = $place['quality_high'];
					
					if (!isset($place['quality']))
					{
						$quality = 0;
					}
					else if($user['quality_priotity'] == 0)
					{
						$quality = -1/7 * abs($place['quality']);
					}
					else
					{
						$quality =  $user['quality_priotity'] * abs($user['quality'] - $place['quality']);
					}
				}
				else
				{
					$user['quality'] = $user['quality_low'];
					$place['quality'] = $place['quality_low'];
					
					if (!isset($place['quality']))
					{
						$quality = 0;
					}
					else if($user['quality_priotity'] == 0)
					{
						$quality = -1/7 * abs($place['quality']);
					}
					else
					{
						$quality =  $user['quality_priotity'] * abs($user['quality'] - $place['quality']);
					}
				}
				
				
				
				if($user['nature_low'] == NULL)
				{
					$user['nature'] = $user['nature_high'];
					$place['nature'] = $place['nature_high'];
					
					if (!isset($place['nature']))
					{
						$nature = 0;
					}
					else if($user['nature_priotity'] == 0)
					{
						$nature = -1/7 * abs($place['nature']);
					}
					else
					{
						$nature =  $user['nature_priotity'] * abs($user['nature'] - $place['nature']);
					}
				}
				else
				{
					$user['nature'] = $user['nature_low'];
					$place['nature'] = $place['nature_low'];
					
					if (!isset($place['nature']))
					{
						$nature = 0;
					}
					else if($user['nature_priotity'] == 0)
					{
						$nature = -1/7 * abs($place['nature']);
					}
					else
					{
						$nature =  $user['nature_priotity'] * abs($user['nature'] - $place['nature']);
					}
				}
				
				
				
				if($user['adventure_low'] == NULL)
				{
					$user['adventure'] = $user['adventure_high'];
					$place['adventure'] = $place['adventure_high'];
					
					if (!isset($place['adventure']))
					{
						$adventure = 0;
					}
					else if($user['adventure_priotity'] == 0)
					{
						$adventure = -1/7 * abs($place['adventure']);
					}
					else
					{
						$adventure =  $user['adventure_priotity'] * abs($user['adventure'] - $place['adventure']);
					}
				}
				else
				{
					$user['adventure'] = $user['adventure_low'];
					$place['adventure'] = $place['adventure_low'];
					
					if (!isset($place['adventure']))
					{
						$adventure = 0;
					}
					else if($user['adventure_priotity'] == 0)
					{
						$adventure = -1/7 * abs($place['adventure']);
					}
					else
					{
						$adventure =  $user['adventure_priotity'] * abs($user['adventure'] - $place['adventure']);
					}
				}
				
				
				if($user['religious_low'] == NULL)
				{
					$user['religious'] = $user['religious_high'];
					$place['religious'] = $place['religious_high'];
					
					if (!isset($place['religious']))
					{
						$religious = 0;
					}
					else if($user['religious_priotity'] == 0)
					{
						$religious = -1/7 * abs($place['religious']);
					}
					else
					{
						$religious =  $user['religious_priotity'] * abs($user['religious'] - $place['religious']);
					}
				}
				else
				{
					$user['religious'] = $user['religious_low'];
					$place['religious'] = $place['religious_low'];
					
					if (!isset($place['religious']))
					{
						$religious = 0;
					}
					else if($user['religious_priotity'] == 0)
					{
						$religious = -1/7 * abs($place['religious']);
					}
					else
					{
						$religious =  $user['religious_priotity'] * abs($user['religious'] - $place['religious']);
					}
				}
				
				
				if($user['health_or_medical_low'] == NULL)
				{
					$user['health_or_medical'] = $user['health_or_medical_high'];
					$place['health_or_medical'] = $place['health_or_medical_high'];
					
					if (!isset($place['health_or_medical']))
					{
						$health_or_medical = 0;
					}
					else if($user['health_or_medical_priotity'] == 0)
					{
						$health_or_medical = -1/7 * abs($place['health_or_medical']);
					}
					else
					{
						$health_or_medical =  $user['health_or_medical_priotity'] * abs($user['health_or_medical'] - $place['health_or_medical']);
					}
				}
				else
				{
					$user['health_or_medical'] = $user['health_or_medical_low'];
					$place['health_or_medical'] = $place['health_or_medical_low'];
					
					if (!isset($place['health_or_medical']))
					{
						$health_or_medical = 0;
					}
					else if($user['health_or_medical_priotity'] == 0)
					{
						$health_or_medical = -1/7 * abs($place['health_or_medical']);
					}
					else
					{
						$health_or_medical =  $user['health_or_medical_priotity'] * abs($user['health_or_medical'] - $place['health_or_medical']);
					}
				}
				
				
				
				$dist = 1/7 * ((1- $time) + (1 - $cost) + (1 - $quality) + (1 - $nature) + (1 - $adventure) + (1 - $religious) + (1 - $health_or_medical));
				$tourslist[] = array ($tour, $dist);		
			}
		asort($tourslist);
		foreach ($tourslist as $p)
		{
			$data['toursList'][] = $this->tours_model->get_tours($p[0]['id']);
		}
		
				
		}
		
		
		$this->load->view('templates/header');
		$this->load->view('templates/leftsidebar');
		$this->load->view('welcome_message', $data);
		$this->load->view('templates/rightsidebar');
		$this->load->view('templates/footer');
	}
}
