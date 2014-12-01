<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	/*public function _remap($method){
		if($method == 'business')
			$this->business();
		else if($method == 'password')
			$this->password();
		else{
			$this->index();
		}
	}*/
	public function index()
	{
		if($this->session->userdata['is_logged_in']){
			$this->load->model('Advertiser');
			$advertiser = new Advertiser();
			$advertiser->load($this->session->userdata['ad_id']);
			$data['advertiser'] = $advertiser;
			$this->load->view('dashboard', $data);
		}else{
			$this->load->view('restricted');
		}
	}
	public function business(){
		$this->load->model('Advertiser');
		$this->load->model('Frequencies');
		$this->load->model('Categories');
		$this->load->helper('form');
		
		$advertiser = new Advertiser();
		$frequencies = $this->Frequencies->get();
		$categories = $this->Categories->get();
		
		$query = $this->db->query('SELECT p.plan, ci.city, c.category, f.frequency, a.Fname, a.Lname, a.email, a.password, a.phone, a.business_name, a.type, a.address, a.website, a.desc, a.pic, a.updates, a.followers FROM advertisers a
		INNER JOIN plans p ON a.plan_id = p.plan_id
		INNER JOIN cities ci ON a.city_id = ci.city_id
		INNER JOIN categories c ON a.cat_id = c.cat_id
		INNER JOIN frequencies f ON a.freq_id = f.freq_id where a.ad_id = '.$this->session->userdata['ad_id']);
		$data['advertiser'] = $query->row();
		$data['categories'] = $categories;
		$data['frequencies'] = $frequencies;
		$this->load->view('business', $data);
	}
	public function push(){
		$this->load->model('Posts');
		$newPost = new Posts();
		$newPost->ad_id = $this->session->userdata['ad_id'];
		$newPost->title = $this->input->post('NewPostTitle');
		$newPost->message = $this->input->post('NewPostBody');
		//$newPost->dateTime = 
		
		$newPost->insert();
	}
	public function changepassword(){
		$this->load->model('Advertiser');
		$advertiser = new Advertiser();
		$advertiser->load($this->session->userdata['ad_id']);
		$data['advertiser'] = $advertiser;
		$data['success_message'] = '';
		$this->load->view('password', $data);
	}
	public function validate_password(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('OldPassword', 'Old Password', 'xss_clean|callback_validate_old_password');
		if($this->form_validation->run()){
			$this->load->model('Advertiser');
			$advertiser = new Advertiser();
			$advertiser->load($this->session->userdata['ad_id']);
			$advertiser->password = md5($this->input->post('ConfirmPassword'));
			$advertiser->save();
			$data['advertiser'] = $advertiser;
			$data['success_message'] = 'Your password was successfully updated.';
			$this->load->view('password',$data);
		}else{
			$this->load->view('');
		}
	}
	public function validate_old_password(){
		$this->load->model('Advertiser');
		$advertiser = new Advertiser();
		$advertiser->ad_id = $this->session->userdata['ad_id'];
		$advertiser->get_field('password');
		if($advertiser->password == md5($this->input->post('OldPassword'))){
			return true;
		}else{
			$this->form_validation->set_message('validate_credentials', 'You have entered Password.');
			return false;
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}
}
?>