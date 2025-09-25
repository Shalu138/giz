<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __Construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
	}
	
		public function index()
	{
		
		$data["main_content"]="index";
    	
		$this->load->view("includes/template", $data);
	}
	
	
	public function about_us()
	{
	  	$data["main_content"]="about_us";
	 
	    $this->load->view("includes/template", $data);
	}
	
		public function speakers()
	{
	  	$data["main_content"]="speakers";
	 
	    $this->load->view("includes/template", $data);
	}
	public function programme()
	{
	  	$data["main_content"]="programme";
	 
	    $this->load->view("includes/template", $data);
	}
		public function legal()
	{
	  	$data["main_content"]="legal";
	 
	    $this->load->view("includes/template", $data);
	}
	
		public function venue()
	{
	  	$data["main_content"]="venue";
	 
	    $this->load->view("includes/template", $data);
	}
			public function registration()
	{
	  	$data["main_content"]="registration";
	 
	    $this->load->view("includes/template", $data);
	}
		
	
}