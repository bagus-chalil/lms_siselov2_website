<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Relasi','relasi');
	}

	public function index()
	{
		$data['title'] = "MataPelajaran-Kelas";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['package'] = $this->relasi->get_fullkelas()->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('v_relasi',$data);
		$this->load->view('templatea/footer');
	}
	public function addkelas()
	{

		$this->db->insert('kelas', ['nama_kelas' => $this->input->post('kelas')]);
		$this->session->set_flashdata('message', '<div class="alert alert-success"
		role="alert">New Relasi Added !!!</div>');
		redirect('relasi');
	}
	public function delete_role($id_kelas)
	{
		$delete = $this->relasi->Mdelete_kelas($id_kelas);
		$this->session->set_flashdata('message', '<div class="alert alert-danger"
		role="alert">Delete Role Success !!!</div>');
		redirect('user');
	}
	public function relasiAccess($kelas_id)
	{
		$data['title'] = "MataPelajaran-Kelas";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $kelas_id])->row_array();

		$data['mapel'] = $this->db->get('matpel')->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('i_relasi');
		$this->load->view('templatea/footer',$data);
	}
	public function changeAccess()
	{
		$kelas_id = $this->input->post('kelasId');
		$matpel_id = $this->input->post('matpelId');

		$data = [
			'kelas_id' => $kelas_id,
			'matpel_id' => $matpel_id
		];
		$result = $this->db->get_where('kelas_matpel', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('kelas_matpel', $data);
		} else {
			$this->db->delete('kelas_matpel', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-primary"
		role="alert">Access Relasi Change !!!</div>');
	}
	public function guru()
	{
		$data['title'] = "Guru-kelas";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['package'] = $this->relasi->get_fullkelas()->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('g_relasi',$data);
		$this->load->view('templatea/footer');
	}
	public function relasi_guru($kelas_id)
	{
		$data['title'] = "MataPelajaran-Kelas";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $kelas_id])->row_array();

		$data['guru'] = $this->db->get('guru')->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('k_relasi');
		$this->load->view('templatea/footer',$data);
	}
	public function changeAccess1()
	{
		$kelas_id = $this->input->post('kelasId');
		$guru_id = $this->input->post('guruId');

		$data = [
			'kelas_id' => $kelas_id,
			'guru_id' => $guru_id
		];
		$result = $this->db->get_where('kelas_guru', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('kelas_guru', $data);
		} else {
			$this->db->delete('kelas_guru', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-primary"
		role="alert">Access Relasi Change !!!</div>');
	}

}