<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Admin', 'admin');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['get_user']=$this->admin->getUser()->result();

		$data['get_pengumuman']=$this->admin->getPengumuman()->row_array();
		$data['get_jmlpengumuman']=$this->admin->getJumlahPengumuman()->row_array();
		$data['get_alat']=$this->admin->getAlat()->row_array();
		$data['get_jmlalat']=$this->admin->getJumlahAlat()->row_array();
		$data['get_jmlkelas']=$this->admin->getJumlahKelas()->row_array();
		$data['get_jmlmapel']=$this->admin->getJumlahMapel()->row_array();

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('templatea/footer');
	}

}