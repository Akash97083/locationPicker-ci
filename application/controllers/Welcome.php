<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Welcome_model');
	}
	public function index()
	{
		$data['location'] = $this->Welcome_model->Lastlocation()[0];
		//print_r($data['location']);
		$this->load->view('welcome_message',$data);
	}

	function do_location(){

		if($this->input->post('submit')){
			
			$data = array(
				'address'=>$this->input->post('activityaddress'),
				'latitude'=>$this->input->post('latitude'),
				'longitude'=>$this->input->post('longitude'),
				'street'=>$this->input->post('street'),
				'city'=>$this->input->post('city'),
				'state'=>$this->input->post('state'),
				'country'=>$this->input->post('country'),
				'zipcode'=>$this->input->post('zipcode'),

			);

			$this->Welcome_model->AddLocation($data);
			$this->session->set_flashdata('msg', '<b><strong>Success!</strong></b>  Location Add In Our Databases.');
			redirect(base_url('index.php/welcome/'));

		}else{
			redirect(base_url('index.php/welcome/'));
		}
	}

	function GetLastlocation(){
		$data['location'] = $this->Welcome_model->Lastlocation()[0];
		$this->load->view('last_location',$data);
	}
}
