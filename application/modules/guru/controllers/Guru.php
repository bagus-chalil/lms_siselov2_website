<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Guru','guru');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Kelas Online';
		$email=$this->session->userdata('email');
		$data['user'] = $this->guru->user_login($email);
		$data['guruL'] = $this->guru->get_kelas_guru();
		// var_dump($data['guruL']);die;

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar',$data);
		$this->load->view('kelas_g',$data);
		$this->load->view('templatef/footer');
	}
	public function v_kelas_guru($kelas_id)
	{
		$data['title'] = 'Kelas Online';
		$email=$this->session->userdata('email');
		$data['user'] = $this->guru->user_login($email);
		$data['mapelGuruL'] = $this->guru->get_kelas_mapel($kelas_id);
		$data['absensiGuruL'] = $this->db->get('absensi')->result_array();
		$data['id_kelas']=$kelas_id;

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar',$data);
		$this->load->view('kelas_mapel_g',$data);
		$this->load->view('templatef/footer');
	}
	
	public function add_tugas(){
		
		$id = $this->input->post('id');
		$config['upload_path']   = FCPATH. './assets/Dokumen/tugas/';
		$config['allowed_types'] = 'pdf|docx';
		$config['max_size']      = 15090;
		$config['encrypt_name']  = False;
		$this->load->library('upload',$config);
		//Gambar Poster
		if (!empty($_FILES['dokumen_tugas'])) {
			$config['file_name']     = url_title($this->input->post('dokumen_tugas'));
			// $filename = $this->upload->file_name;
			$this->upload->initialize($config); 
		
			$this->upload->do_upload('dokumen_tugas');
			$data2 = $this->upload->data();
			$gambar= $data2['file_name'];
		
			$data=[
				'nama_tugas'=>$this->input->post('n_tugas'),
				'deskripsi_tugas'=>$this->input->post('d_tugas'),
				'm_mapelId'=>$this->input->post('k_tugas'),
				'dokumen_tugas'=>$gambar,
				'tgl_tugas'=>$this->input->post('tgl_tugas'),
				'tgs_active'=>$this->input->post('tgs_active'),
				
			];
			$this->db->insert('tugas',$data);
			$this->session->set_flashdata('message','<div class="alert alert-primary"
			role="alert">New tugas Added !!!</div>');
			redirect('guru/v_kelas_guru/'.$id);
		}
	}
	public function update_nilai(){
		$id=$this->input->post('id');
		$url=$this->input->post('id_mapel');
		$data = array(
			'nilai'=>$this->input->post('nilai')
		);
		$this->db->where('id', $id);
		$this->db->update('tugas_siswa', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Nilai!
		</div>');
		redirect('guru/v_mapel/'.$url);
	}
	public function edit_tugas($id_tugas)
	{
		$data['title'] = 'Kelas Online';
		$email=$this->session->userdata('email');
		$data['user'] = $this->guru->user_login($email);
		$data['tugas_e'] = $this->guru->get_data_tugas($id_tugas);

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar',$data);
		$this->load->view('e_tugas',$data);
		$this->load->view('templatef/footer');
	}
	public function edit_data_tugas(){
		$kode = $this->input->post('kelas_id');
		$data['title'] = 'Halaman Kelas Guru';
		$email=$this->session->userdata('email');
		$data['user'] = $this->guru->user_login($email);

		$this->form_validation->set_rules('tugas', 'TUGAS', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templatef/header',$data);
			$this->load->view('templatef/navbar',$data);
			$this->load->view('templatef/sidebar',$data);
			$this->load->view('e_mapel',$data);
			$this->load->view('templatef/footer');
				
		}else {
			$id_tugas = $this->input->post('id');
			$config['upload_path']   = FCPATH. './assets/Dokumen/tugas/';
				$config['allowed_types'] = 'pdf|docx';
				$config['max_size']      = 15090;
				$config['encrypt_name']  = False;
			//   	$config['max_width']     = '1024';
			//   	$config['max_height']    = '768';
			$config['file_name']     = url_title($this->input->post('dokumen_tugas'));

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('dokumen_tugas')) {
			$data = array(
					'nama_tugas'=>$this->input->post('tugas'),
					'deskripsi_tugas'=>$this->input->post('deskripsi_tugas'),
					'm_mapelId'=>$this->input->post('k_tugas'),
					'tgl_tugas'=>$this->input->post('tgl_tugas'),
					'tgs_active'=>$this->input->post('tgs_active')
			);
			$this->db->where('id_tugas', $id_tugas);
			$this->db->update('tugas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Tugas has been Update!
		</div>');
			redirect('guru/v_kelas_guru/'.$kode);
		} else {
			$old_document = $this->input->post('dokumen_tugas1');
			if ($old_document != 'NULL') {
				unlink(FCPATH. './assets/Dokumen/tugas/' . $old_document);
			}
			$new_document = $this->upload->data('file_name');
			$data = array(
				'nama_tugas'=>$this->input->post('tugas'),
				'deskripsi_tugas'=>$this->input->post('deskripsi_tugas'),
				'm_mapelId'=>$this->input->post('k_tugas'),
				'tgl_tugas'=>$this->input->post('tgl_tugas'),
				'dokumen_tugas' => $new_document,
				'tgs_active'=>$this->input->post('tgs_active')
		);
		$this->db->where('id_tugas', $id_tugas);
		$this->db->update('tugas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Tugas has been Update!
		</div>');
			redirect('guru/v_kelas_guru/'.$kode);
			}
		}
	}
	public function hapus_tugas($id_tugas){
		$this->guru->get_hapus_tugasId($id_tugas);
		$this->session->set_flashdata('message','<div class="alert alert-danger"
		role="alert">Tugas has been deleted !!!</div>');
		
		redirect('guru');
	}
	public function add_absensi(){
		$id = $this->input->post('id');
			$data=[
				'tgl_absen'=>$this->input->post('tgl_absen'),
				'm_mapel_id'=>$this->input->post('k_absensi'),
				'absensi_active'=>$this->input->post('absen_active')
			];
			$this->db->insert('absensi',$data);
			$this->session->set_flashdata('message','<div class="alert alert-primary"
			role="alert">New absensi Added !!!</div>');
			redirect('guru/v_kelas_guru/'.$id);
		}
	public function hapus_absensi($id_absen){
		$this->db->where('id_absen', $id_absen);
        $this->db->delete('absensi');
		$this->session->set_flashdata('message','<div class="alert alert-danger"
		role="alert">Absensi has been deleted !!!</div>');
		redirect('guru');
	}
	public function edit_absensi($id_absen){
		$id = $this->input->post('id');
		$data = array (
            'tgl_absen'=>$this->input->post('tgl_absen'),
			'm_mapel_id'=>$this->input->post('k_absensi'),
			'absensi_active'=>$this->input->post('absen_active')
        );
        $this->db->where('id_absen', $id_absen);
		$this->db->update('absensi', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">Edit Absen Success !!!</div>');
		redirect('guru/v_kelas_guru/'.$id);
    }
	public function v_mapel($id)
	{
		$data['title'] = 'Kelas Online';
		$email=$this->session->userdata('email');
		$data['user'] = $this->guru->user_login($email);
		//Data Kelas
		$data['siswa'] = $this->guru->get_jml_siswa();
		$data['tugas1'] = $this->guru->get_jml_tugas($id);
		$data['absensi'] = $this->guru->get_jml_absen($id);
		
		//Data
		$data['v_mapel'] = $this->guru->get_mapel_absen($id);
		$data['l_mapel'] = $this->guru->get_mapel_tugas($id);
		$data['absen'] = $this->guru->get_absensi($id);;
		$data['tugas'] = $this->guru->get_tugas($id);
		$data['id_Matpel']=$id;

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar',$data);
		$this->load->view('mapel_detail',$data);
		$this->load->view('templatef/footer');
	}

}

