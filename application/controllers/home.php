<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('content_home');
	}
	public function business(){
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('content_business');
	}
	public function community(){
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('content_community');
	}
	public function ourstory(){
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('content_ourstory');
	}
	public function pricing(){
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('content_pricing');
	}
	public function testimonials(){
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('content_testimonials');
	}
	public function app(){
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('content_app');
	}
}
?>