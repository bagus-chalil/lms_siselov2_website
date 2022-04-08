<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{

	public function __construct()
	{
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '2048M');
		parent::__construct();
		$this->load->model('ChatModel');
	}


	public function index()
	{
		$data['title'] = 'Chat';

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
			$no =  $this->uri->segment(2);
			$data['data'] = $this->ChatModel->getDataById($no);
			
			if ($data == null) {
				die("user tidak ada nih");
			} else {
				// var_dump($data);die;
				$this->load->view('chat/errors/header',$data);
				$this->load->view('chat',$data);
			}
			
	}
	public function dua()
	{
		$this->load->view('dua');
	}
	public function loadChat()
	{
		$id = 	$this->input->post('id');
		$id_lawan = 	$this->input->post('id_lawan');
		$data = $this->ChatModel->getPesan($id, $id_lawan);

		echo json_encode(array(
			'data' => $data
		));

	}
	public function KirimPesan()
	{
		$now = date("Y-m-d H:i:s");
		// var_dump($now);die;
		$pesan = $this->input->post('pesan');
		$id = $this->input->post('id');
		$id_lawan = $this->input->post('id_lawan');

		// $id =2;
		// $id_lawan =1;
		$in = array(
			'id' => $id,
			'id_lawan' => $id_lawan,
			'isi' => $pesan,
			'waktu' => $now,
		);

		$this->ChatModel->TambahChatKeSatu($in);
		$log = array('status' => true);
		echo json_encode($log);
		return true;

	}

	public function menu()
	{
		$data['title'] = 'Chat';

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$this->load->view('chat/errors/header',$data);
		$this->load->view('menu',$data);
		
	}
	public function GetAllOrang()
	{
		$id = $this->input->post('id');
		$data = $this->ChatModel->GetAllOrangKecUser($id);
		
		echo json_encode(array(
			'data' => $data
		));

	}
}
