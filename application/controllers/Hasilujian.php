<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilUjian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->library(['datatables']);// Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->load->model('M_Ujian', 'ujian');
		$this->load->model('M_Soal', 'soal');
		
		$email=$this->session->userdata('email');

		$this->user = $this->soal->user_login($email);
		
	}

	public function output_json($data, $encode = true)
	{
		if($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function data()
	{
		$nip_guru = null;
		$email=$this->session->userdata('email');
		$data['user'] = $this->soal->user_login($email);
        if ( $data['user']['role_id'] ==2 ) {
			$nip_guru = $this->user['nomor'];
		}

		$this->output_json($this->ujian->getHasilUjian($nip_guru), false);
	}

	public function NilaiMhs($id)
	{
		$this->output_json($this->ujian->HslUjianById($id, true), false);
	}

	public function index()
	{
        $email=$this->session->userdata('email');
		$data['user'] = $this->soal->user_login($email);
		$data = [
			'user' => $data['user'],
			'title'	=> 'Ujian',
			'subjudul'=> 'Hasil Ujian',
		];
		$this->load->view('templatef/_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/hasil');
		$this->load->view('templatef/_templates/dashboard/_footer.php');
	}
	
	public function detail($id)
	{
        $email=$this->session->userdata('email');
		$data['user'] = $this->soal->user_login($email);
		$ujian = $this->ujian->getUjianById($id);
		$nilai = $this->ujian->bandingNilai($id);
		$nilai1 = $this->ujian->bandingNilaiMin($id);
			
		$data = [
			'user' => $data['user'],
			'title'	=> 'Ujian',
			'subjudul'=> 'Detail Hasil Ujian',
			'ujian'	=> $ujian,
			'nilai'	=> $nilai,
			'nilai1'	=> $nilai1
		];


		$this->load->view('templatef/_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/detail_hasil');
		$this->load->view('templatef/_templates/dashboard/_footer.php');
	}

	public function cetak($id)
	{
		$this->load->library('Pdf');
		$email=$this->session->userdata('email');
		$data['user'] = $this->soal->user_login($email);
		$nip=$data['user']['nomor'];

		$siswa 	= $this->ujian->getIdSiswa($this->user['nomor']);
		$hasil 	= $this->ujian->HslUjian($id, $siswa->id_siswa)->row();
		$ujian 	= $this->ujian->getUjianById($id);
		
		$data = [
			'ujian' => $ujian,
			'hasil' => $hasil,
			'siswa'	=> $siswa
		];
		
		$this->load->view('ujian/cetak', $data);
	}

	public function cetak_detail($id)
	{
		$this->load->library('Pdf');

		$ujian = $this->ujian->getUjianById($id);
		$nilai = $this->ujian->bandingNilai($id);
		$hasil = $this->ujian->HslUjianById($id)->result();

		$data = [
			'ujian'	=> $ujian,
			'nilai'	=> $nilai,
			'hasil'	=> $hasil
		];

		$this->load->view('ujian/cetak_detail', $data);
	}
	
}