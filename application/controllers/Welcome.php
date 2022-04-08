<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
	{
	  parent::__construct();
	//   is_logged_in();
	  $this->load->model('Profil_model','profil');
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user',['email' => 
		$this->session->userdata('email')])->row_array();
		$data['title']="Profil";
		$data['profil']=$this->profil->getdata();
		

		$this->load->view('template/v_template',$data);
		$this->load->view('v_profil',$data);
		$this->load->view('template/v_template_footer');
		// $data['user'] =$this->Profil_model->update_data();

	}

	public function profiledit()
	{
		$data['user'] = $this->db->get_where('tbl_user',['email' => 
		$this->session->userdata('email')])->row_array();
		$data['title']="Profil";
		$data['profil']=$this->profil->getdata();
		

		$this->load->view('template/v_template',$data);
		$this->load->view('v_profiledit',$data);
		$this->load->view('template/v_template_footer');
		// $data['user'] =$this->Profil_model->update_data();

	}
	public function update_profil()
	{
			  $config['upload_path']   = FCPATH. './assets/doc/';
			  $config['allowed_types'] = 'jpg|png|gif|pdf';
			  $config['max_size']      = 10090;
			  $config['encrypt_name']  = False;
			$this->load->library('upload',$config);
			//SURAT
			if (!empty($_FILES['surat'])){
				$surat1 = $this->input->post('surat1');
				// $filename = $this->upload->file_name;
				if ($surat1 != 'NULL') {
					unlink(FCPATH. './assets/Dokumen/' . $surat1);
				}
				$config['file_name']     = url_title($this->input->post('surat'));
					$this->upload->initialize($config); 
					$this->upload->do_upload('surat');
					$data1 = $this->upload->data();
					$fotodiri= $data1['file_name'];
				
			}else {
				$data1 = array(
					'nama' => $this->input->post('nama'),
					'nimnis' => $this->input->post('nimnis'),
					'email' => $this->input->post('email'),
					'instansi' => $this->input->post('instansi'),
					'alamat_in' => $this->input->post('alamat_in'),
					'alamat_mg' => $this->input->post('alamat_mg'),
					'wa' => '62'. $this->input->post('wa'),
					'keahlian' => $this->input->post('keahlian'),
					
				);
				$data2 = array(
					'nimnis_doc' => $this->input->post('nimnis'),
					'surat' => $this->input->post('surat1')
				);
				$this->db->where('id',$this->input->post('id'));
				$this->db->update('tbl_user', $data1);
				$this->db->where('nimnis_doc',$this->input->post('nimnis'));
				$this->db->update('tbl_dokumen', $data2);
			}
			//FOTO DIRI
			if (!empty($_FILES['fotodiri'])) {
				$fotodiri1 = $this->input->post('fotodiri1');
				// $filename = $this->upload->file_name;
				if ($fotodiri1 != 'NULL') {
					unlink(FCPATH. './assets/Dokumen/' . $fotodiri1);
				}
				$config['file_name']     = url_title($this->input->post('fotodiri'));
					$this->upload->initialize($config); 
					$this->upload->do_upload('fotodiri');
					$data2 = $this->upload->data();
					$fotodiri= $data2['file_name'];
			}else {
				$data1 = array(
					'nama' => $this->input->post('nama'),
					'nimnis' => $this->input->post('nimnis'),
					'email' => $this->input->post('email'),
					'instansi' => $this->input->post('instansi'),
					'alamat_in' => $this->input->post('alamat_in'),
					'alamat_mg' => $this->input->post('alamat_mg'),
					'wa' => '62'. $this->input->post('wa'),
					'keahlian' => $this->input->post('keahlian'),
					
				);
				$data2 = array(
					'nimnis_doc' => $this->input->post('nimnis'),
					'portofolio' => $this->input->post('1')
				);
				$this->db->where('id',$this->input->post('id'));
				$this->db->update('tbl_user', $data1);
				$this->db->where('nimnis_doc',$this->input->post('nimnis'));
				$this->db->update('tbl_dokumen', $data2);
			}
			//SUDAH BENAR
			//PORTOFOLIO
			if (!empty($_FILES['portofolio'])) {
				$portofolio1 = $this->input->post('portofolio1');
				// $filename = $this->upload->file_name;
				if ($portofolio1 != 'NULL') {
					unlink(FCPATH. './assets/Dokumen/' . $portofolio1);
				}
				$config['file_name']     = url_title($this->input->post('portofolio'));
					$this->upload->initialize($config); 
					$this->upload->do_upload('portofolio');
					$data3 = $this->upload->data();
					$portofolio= $data3['file_name'];
			}else{
				$data1 = array(
					'nama' => $this->input->post('nama'),
					'nimnis' => $this->input->post('nimnis'),
					'email' => $this->input->post('email'),
					'instansi' => $this->input->post('instansi'),
					'alamat_in' => $this->input->post('alamat_in'),
					'alamat_mg' => $this->input->post('alamat_mg'),
					'wa' => '62'. $this->input->post('wa'),
					'keahlian' => $this->input->post('keahlian'),
					
				);
				$data2 = array(
					'nimnis_doc' => $this->input->post('nimnis'),
					'portofolio' => $this->input->post('portofolio1')
				);
				$this->db->where('id',$this->input->post('id'));
				$this->db->update('tbl_user', $data1);
				$this->db->where('nimnis_doc',$this->input->post('nimnis'));
				$this->db->update('tbl_dokumen', $data2);
			}
			
				$data1 = array(
					'nama' => $this->input->post('nama'),
					'nimnis' => $this->input->post('nimnis'),
					'email' => $this->input->post('email'),
					'instansi' => $this->input->post('instansi'),
					'alamat_in' => $this->input->post('alamat_in'),
					'alamat_mg' => $this->input->post('alamat_mg'),
					'wa' => '62'. $this->input->post('wa'),
					'keahlian' => $this->input->post('keahlian'),
					
				);
				$data2 = array(
					'nimnis_doc' => $this->input->post('nimnis'),
					'surat' => $surat, 
					'fotodiri' => $fotodiri,
					'portofolio' => $portofolio
				);

				$this->db->where('id',$this->input->post('id'));
				$this->db->update('tbl_user', $data1);
				$this->db->where('nimnis_doc',$this->input->post('nimnis'));
				$this->db->update('tbl_dokumen', $data2);

				
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
				Event has been Added!
				</div>');
				redirect('profil');
	}
}

