<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Praktikum extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('M_Praktikum','praktikum');

    }
	public function index()
	{
		$data['title'] = 'Alat Praktikum';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['alat']= $this->praktikum->get_alat();
		$data['kelas']= $this->db->get('kelas')->result_array();
		$data['matpel']= $this->db->get('matpel')->result_array();
		
		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('u_alat',$data);
		$this->load->view('templatea/footer');

	}
	public function addAlat(){
		
		$config['upload_path']   = FCPATH. './assets/images/alat';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']      = 10090;
		$config['encrypt_name']  = False;
		$this->load->library('upload',$config);
		//Gambar Poster
		if (!empty($_FILES['gambar'])) {
			$config['file_name']     = url_title($this->input->post('nama_alat'));
			// $filename = $this->upload->file_name;
			$this->upload->initialize($config); 
		
			$this->upload->do_upload('gambar');
			$data2 = $this->upload->data();
			$gambar= $data2['file_name'];
		
			$data=[
				'nama_alat'=>$this->input->post('nama_alat'),
				'matpel_id'=>$this->input->post('matpel_id'),
				'kelas_id'=>$this->input->post('kelas_id'),
				'gambar'=>$gambar,
				'stok'=>$this->input->post('stok')
			];
			$this->db->insert('alat_praktikum',$data);
			$this->session->set_flashdata('message','<div class="alert alert-primary"
			role="alert">Alat Praktikum baru berhasil ditambahkan !!!</div>');
			redirect('praktikum');
		}
	}
	public function editAlat($id)
	{
		$data['title'] = 'Alat Praktikum';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['data_alat']= $this->praktikum->get_detail_alat($id);
		$data['kelas']= $this->db->get('kelas')->result_array();
		$data['matpel']= $this->db->get('matpel')->result_array();
		
		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('e_alat',$data);
		$this->load->view('templatea/footer');
	}
	public function edit_data_alat(){
			$id = $this->input->post('id');
			$config['upload_path']   = FCPATH. './assets/images/alat';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']      = 10090;
			$config['encrypt_name']  = False;
		//   	$config['max_width']     = '1024';
		//   	$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('nama'));

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'nama_alat'=>$this->input->post('nama'),
				'matpel_id'=>$this->input->post('matpel_id'),
				'kelas_id'=>$this->input->post('kelas_id'),
				'stok'=>$this->input->post('stok'),
			);
			$this->db->where('id', $id);
			$this->db->update('alat_praktikum', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Edit has been Update!
		</div>');
			redirect('praktikum');
		} else {
			$old_gambar = $this->input->post('gambar1');
			if ($old_gambar != 'NULL') {
				unlink(FCPATH. './assets/images/alat/' . $old_gambar);
			}
			$new_gambar = $this->upload->data('file_name');
			$data = array(
				'nama_alat'=>$this->input->post('nama'),
				'matpel_id'=>$this->input->post('matpel_id'),
				'kelas_id'=>$this->input->post('kelas_id'),
				'gambar'=>$new_gambar,
				'stok'=>$this->input->post('stok'),
		);

		$this->db->where('id', $id);
		$this->db->update('alat_praktikum', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Alat Praktikum has been Update!
		</div>');
			redirect('praktikum');
		}
	}
	public function hapusAlat($id){
		$this->praktikum->get_hapus_id($id);
		redirect('praktikum');
	}
	public function v_alat()
	{
		error_reporting(0);
		$data['title'] = 'Alat Praktikum';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['alat_praktikum']= $this->praktikum->get_alat_user();
		$data['alat']= $this->praktikum->get_alat();
		$data['kelas']= $this->db->get('kelas')->result_array();
		$data['matpel']= $this->db->get('matpel')->result_array();
		// var_dump($data['alat_praktikum']);die;
		$this->load->view('templatef/kelas_online/header',$data);
		$this->load->view('templatef/kelas_online/topbar',$data);
		$this->load->view('v_alat',$data);
		$this->load->view('templatef/kelas_online/footer',$data);
	}
	
	public function pinjem_alat()
	{
		$data=[
			'alat_id'=>$this->input->post('id'),
			'alat_praktikum'=>$this->input->post('nama_alat'),
			'tgl_pinjam'=>$this->input->post('tgl_pinjam'),
			'tgl_kembali'=>$this->input->post('tgl_kembali'),
			'nisn'=>$this->input->post('nisn'),
			'qty'=>1
		];
		$this->db->insert('tb_pinjam_alat',$data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Alat Praktikum has been Update!
		</div>');
		redirect('praktikum/v_alat');
	}


}