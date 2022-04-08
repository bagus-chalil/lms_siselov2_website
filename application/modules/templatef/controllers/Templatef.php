<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templatef extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('yusuf');
		$this->load->view('footer');
	}
	public function blocked()
	{
		$this->load->view('block');
	}


}