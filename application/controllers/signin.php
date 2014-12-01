<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function index()
	{
		$this->load->view('signin');
	}
	public function login_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('UserName', 'Email', 'required|callback_validate_credentials');
		$this->form_validation->set_rules('Password', 'Password', 'required');
		
		if($this->form_validation->run()){
			$this->load->model('Advertiser');
			$advertiser = new Advertiser();
			$advertiser->get_PK_where('email',$this->input->post('UserName'));
			$data = array(
				'ad_id' => $advertiser->ad_id,
				'is_logged_in' => 1
			);
			$this->session->set_userdata($data);
			redirect('dashboard');
		}else{
			$this->load->view('signin');
		}
	}
	public function validate_credentials(){
		$this->load->model('Advertiser');
		$advertiser = new Advertiser();
		$advertiser->email = $this->input->post('UserName');
		$advertiser->password = md5($this->input->post('Password'));
		if($advertiser->can_login()){
			return true;
		}else{
			$this->form_validation->set_message('validate_credentials', 'You have entered incorrect Email or Password.');
			return false;
		}
	}
}
?>