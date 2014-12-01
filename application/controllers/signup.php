<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index()
	{
		$this->load->model('Categories');
		$this->load->model('States');
		$this->load->model('Frequencies');
		
		$categories = $this->Categories->get();
		$formattedCat = array('0' => '');
		foreach($categories as $category){
			$formattedCat[$category->cat_id] = $category->category;
		}
		/*foreach($categories as array($key1 => $item1, $key2 => $item2)){
			$formattedCat[$item1] = $item2;
		}*/
		$data['allCats'] = $formattedCat;
		
		$states = $this->States->get();
		$formatted_states = array('0' => '');
		foreach($states as $state){
			$formattedStates[$state->state_id] = $state->state_name;
		}
		$data['allStates'] = $formattedStates;
		
		$freqs = $this->Frequencies->get();
		$formatted_freqs = array('0' => '');
		foreach($freqs as $freq){
			$formatted_freqs[$freq->freq_id] = $freq->frequency;
		}
		$data['allFreqs'] = $formatted_freqs;
		
		$this->load->helper('form');
		$this->load->view('signup_head');
		$this->load->view('signup', $data);
	}
	public function submit(){
		$this->load->model('Advertiser');
		$advertiser = new Advertiser();
		$advertiser->plan_id;
		$advertiser->city_id = $this->input->post('SelectedFeed');
		$advertiser->cat_id = $this->input->post('SelectedCategory');
		$advertiser->freq_id = $this->input->post('SelectedFrequency');
		$advertiser->Fname = $this->input->post('FirstName');
		$advertiser->Lname = $this->input->post('LastName');
		$advertiser->email = $this->input->post('Email');
		$advertiser->password = md5($this->input->post('Password'));
		$advertiser->phone = $this->input->post('Phone');
		$advertiser->business_name = $this->input->post('BusinessName');
		$advertiser->type = $this->input->post('Type');
		$advertiser->address = $this->input->post('address');
		$advertiser->website = $this->input->post('Site');
		$advertiser->desc = $this->input->post('Description');
		
		$advertiser->insert();
	}
}
?>