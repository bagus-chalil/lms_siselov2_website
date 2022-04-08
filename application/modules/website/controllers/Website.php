<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Website','website');
	}

	public function index()
	{
		$data['title'] = "LMS SISELO V2";
		$email=$this->session->userdata('email');
		$data['user'] = $this->website->user_login($email);

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar1',$data);
		$this->load->view('notifikasi_awal',$data);
		$this->load->view('templatef/footer');
	}
	public function guru()
	{
		$data['title'] = "Dashboard";
		$email=$this->session->userdata('email');
		$data['user'] = $this->website->user_login($email);
		$data['kelas'] = $this->website->get_Kelas();
		$data['matapelajaran'] = $this->website->get_matapelajaran();
		$data['soal'] = $this->website->get_soal();

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar',$data);
		$this->load->view('dashboardg',$data);
		$this->load->view('templatef/footer');
	}

}