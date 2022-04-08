<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('M_profil','profil');

    }
	//Profil Guru
	public function index()
	{
		$data['title'] = 'Profil';
		$email=$this->session->userdata('email');
		$data['user'] = $this->profil->user_login($email);

		
		$data['users'] = $this->db->get('user')->result_array();
		$data['matpel']= $this->db->get('matpel')->result_array();
		$data['all_kelas'] = $this->db->get('kelas')->result();

		$data['data_profile']=$this->profil->getProfileGuru();
		$data['data_profile1']=$this->profil->getProfileAllGuru();
		$data['kelas_g']=$this->profil->get_matpel();
		$data['kelas'] = $this->profil->getKelasByGuru();
		$data['cek'] = $this->profil->cek_kelas_guru();

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar',$data);
		$this->load->view('profils',$data);
		$this->load->view('templatef/footer');
	
	}
	public function edit_profil_guru()
	{
		$id_guru=$this->input->post('id_guru');
		
		$this->form_validation->set_rules('fname', 'Fname', 'required|trim');
		$this->form_validation->set_rules('lname', 'Lname', 'required|trim');
		$this->form_validation->set_rules('telephoneg', 'Telephoneg', 'required|trim');

		if ($this->form_validation->run() == FALSE){
		redirect('profil/');
		
		} else {
				$data = array (
					'nama_guru' => $this->input->post('fname', true). " " . $this->input->post('lname',true),
					'telephoneg' => $this->input->post('telephoneg', true),
					'matpel_id' => $this->input->post('matpel', true),
					'alamatg' => $this->input->post('alamatg', true)
				);
				$data1 = array (
					'name' => $this->input->post('fname', true). " " . $this->input->post('lname',true),
					'f_name' => $this->input->post('fname', true),
					'l_name' => $this->input->post('lname', true)
				);
		
		$this->db->where('id_guru',$id_guru);
		$this->db->update('guru',$data);

		$this->profil->ubah_profil_user($data1);
		
		$cek = $this->profil->cek_kelas_guru();
		if ($cek['guru'] > 0 ) {
			
		}else if ($cek['guru'] == 0 ){
			$id_guru = $this->input->post('id_guru', true);
			$kelas_id = $this->input->post('kelas_id', true);
			$input = [];
			foreach ($kelas_id as $key => $val) {
				$input[] = [
					'kelas_id' => $val,
					'guru_id'  => $id_guru
				];
			}
			$this->profil->create('kelas_guru', $input, true);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
		redirect('profil/');
			
		}
	}
	public function upload_kelas_guru()
	{
		$id_guru = $this->input->post('id_guru', true);
		$kelas_id = $this->input->post('kelas_id', true);
		$input = [];
		foreach ($kelas_id as $key => $val) {
			$input[] = [
				'kelas_id' => $val,
				'guru_id'  => $id_guru
			];
		}
		$this->profil->create('kelas_guru', $input, true);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
		redirect('profil/profil_data_guru');
	}
	public function edit_kelas_guru()
	{
		$id_guru = $this->input->post('id_guru', true);
		$kelas_id = $this->input->post('kelas_id', true);
		$input = [];
		foreach ($kelas_id as $key => $val) {
			$input[] = [
				'kelas_id' => $val,
				'guru_id'  => $id_guru
			];
		}

		$id = $this->input->post('id_guru', true);
		$this->profil->delete('kelas_guru', $id, 'guru_id');
		$action = $this->profil->create('kelas_guru', $input, true);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
		redirect('profil/profil_data_guru');
	}
	public function profil_data_guru()
	{
		$data['title'] = 'Profil';
		$email=$this->session->userdata('email');
		$data['user'] = $this->profil->user_login($email);

		$data['matpel']=$this->db->get('matpel')->result_array();
		$data['kelas_g']=$this->profil->get_matpel();
		
		$data['kelas_guru'] = $this->profil->get_kelas_matpel();

		$data['users'] = $this->db->get('user')->result_array();

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar',$data);
		$this->load->view('data_guru',$data);
		$this->load->view('templatef/footer');
	}
	public function edit_kelas_matapelajaran()
	{
		$id=$this->input->post('id');
		$data = array (
			'kelas_id' => $this->input->post('kelas_id', true),
			'guru_id' => $this->input->post('guru_id', true),
			'matpel_id' => $this->input->post('matpel_id', true)
		);
		$this->db->where('id',$id);
		$this->db->update('kelas_guru',$data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
		redirect('profil/profil_data_guru');
	}

	//Profil Siswa
	public function profil_siswa()
	{
		$data['title'] = 'Profil';
		$email=$this->session->userdata('email');
		$data['user'] = $this->profil->user_login($email);

		$data['data_profile']=$this->profil->getProfileSiswa();
		$data['matpel']=$this->db->get('matpel')->result_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['users'] = $this->db->get('user')->result_array();
		$data['gurus'] = $this->db->get('guru')->result_array();

		$this->load->view('templatef/kelas_online/header',$data);
		$this->load->view('templatef/kelas_online/topbar',$data);
		$this->load->view('profilsis',$data);
		$this->load->view('templatef/kelas_online/footer',$data);
	
	}
	public function edit_profil_siswa()
	{
		$id_siswa=$this->input->post('id_siswa');

		$this->form_validation->set_rules('fname', 'Fname', 'required|trim');
		$this->form_validation->set_rules('lname', 'Lname', 'required|trim');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim');

		if ($this->form_validation->run() == FALSE){
		redirect('profil/profil_siswa');
		
		} else {
				$data = array (
					'nama_guru' => $this->input->post('fname', true). " " . $this->input->post('lname',true),
					'telephone' => $this->input->post('telephone', true),
					'wali_Kelas' => $this->input->post('wali_kelas', true),
					'kelas_id' => $this->input->post('kelas', true),
					'alamat' => $this->input->post('alamat', true)
				);
				$data1 = array (
					'name' => $this->input->post('fname', true). " " . $this->input->post('lname',true),
					'f_name' => $this->input->post('fname', true),
					'l_name' => $this->input->post('lname', true)
				);
		
		$this->db->where('id_siswa',$id_siswa);
		$this->db->update('siswa',$data);

		$this->profil->ubah_profil_user($data1);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
		redirect('profil/profil_siswa');
		}
	}
	//Profil Guest
	public function profile_guest()
	{
		$data['title'] = 'Profil';
		$email=$this->session->userdata('email');
		$data['user'] = $this->profil->user_login($email);

		$data['data_profile_guest']=$this->profil->getProfileGuest();
		$data['users'] = $this->db->get('user')->result_array();
		$data['identitas'] = $this->db->get('identitas')->result_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar1',$data);
		$this->load->view('profilg',$data);
		$this->load->view('templatef/footer');
	}
	
	public function edit_profile_guest()
    {
		$this->form_validation->set_rules('fname', 'Fname', 'required|trim');
		$this->form_validation->set_rules('lname', 'Lname', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		//Form
		$identitas = $this->input->post('identitas');
		$id = $this->input->post('id');
		$name = $this->input->post('fname', true). " " . $this->input->post('lname',true);
		$nomor = $this->input->post('nomor');

		if ($this->form_validation->run() == FALSE){
		redirect('profil/profil_guest');
		
		} else {
			//Siswa
				if ($identitas == 3) {
					$data = array (
						'id'=>$id,
						'f_name' => $this->input->post('fname', true),
						'l_name' => $this->input->post('lname', true),
						'email' => $this->input->post('email', true),
						'identitas_id' => $this->input->post('identitas', true),
						'nomor' => $nomor,
						'role_id' => 3,
						'verifikasi_user' => 3
					);
					$data1 = [
						'user_id' => $id,
						'nisn' => $nomor,
						'nama_siswa' => $name
					];
					$this->profil->ubah_profil_user($data);
					$this->db->insert('siswa', $data1);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Profile has been Update!
					</div>');

					redirect('profil/profile_guest');
			//Guru
				}else if($identitas == 2){
					$data = array (
						'id'=>$id,
						'f_name' => $this->input->post('fname', true),
						'l_name' => $this->input->post('lname', true),
						'email' => $this->input->post('email', true),
						'identitas_id' => $this->input->post('identitas', true),
						'nomor' => $nomor,
						'role_id' => 2,
						'verifikasi_user' => 3
					);
					$data1 = [
						'user_id' => $id,
						'nip' => $nomor,
						'nama_guru' => $name
					];
					$this->profil->ubah_profil_user($data);
					$this->db->insert('guru', $data1);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Profile has been Update!
					</div>');

					redirect('profil/profile_guest');
				}else{
					$data = array (
						'id'=>$id,
						'f_name' => $this->input->post('fname', true),
						'l_name' => $this->input->post('lname', true),
						'email' => $this->input->post('email', true),
						'identitas_id' => $this->input->post('identitas', true),
						'nomor' => $nomor,
						'role_id' => 4,
						'verifikasi_user' => 2
					);
					$this->profil->ubah_profil_user($data);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Profile has been Update!
					</div>');

					redirect('profil/notifikasi_awal');
				}
		}
    }

	public function edit_foto()
    {
		$email=$this->session->userdata('email');
		$role=$this->session->userdata['role_id'];
		
		$data['user'] = $this->profil->user_login($email);
		$nomor = $this->input->post('nomor');
		$name = $this->input->post('name');
			$config['upload_path']   = FCPATH. './assets/images/faces/';
			$config['allowed_types'] = 'png|jpg|jpeg';
			$config['max_size']      = 15090;
			$config['encrypt_name']  = False;
		//   	$config['max_width']     = '1024';
		//   	$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('nomor'));

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$data = array (
				'id'=>$this->input->post('id'),
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email')
			);
			$this->profil->ubah_profil_user($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
		if ( $role ==2 ){
			redirect('profil');
		}else if( $role ==3 ){
			redirect('profil/profil_siswa');
		}else{
			redirect('profil/profile_guest');
		}
		} else {
			$old_document = $this->input->post('image1');
			if ($old_document != 'default.jpg') {
				unlink(FCPATH. './assets/images/faces/' . $old_document);
			}
			$image = $this->upload->data('file_name');
			$data = array (
				'id'=>$this->input->post('id'),
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'image'=>$image
			);
		$this->profil->ubah_profil_user($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profile has been Update!
		</div>');
		if ( $role ==2 ){
			redirect('profil');
		}else if( $role ==3 ){
			redirect('profil/profil_siswa');
		}else{
			redirect('profil/profile_guest');
		}
		}
	}

	public function change_password(){
		$data['title'] = 'Change Password';
		$role=$this->session->userdata['role_id'];
		$email=$this->session->userdata('email');
		$data['user'] = $this->profil->user_login($email);

		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|required|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == FALSE) {
			if ( $this->session->userdata['role_id'] == 2){
				$this->load->view('templatef/header', $data);
				$this->load->view('templatef/navbar', $data);
				$this->load->view('templatef/sidebar', $data);
				$this->load->view('profil/change_passwords', $data);
				$this->load->view('templatef/footer');
			}else if ( $this->session->userdata['role_id'] == 3){
				$this->load->view('templatef/kelas_online/header', $data);
				$this->load->view('templatef/kelas_online/topbar', $data);
				$this->load->view('profil/change_passwordsis', $data);
				$this->load->view('templatef/kelas_online/footer');
			}else {
				redirect('profil');
			}
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong Current Password!
                </div>');
				redirect('profil/change_password');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Current Password cant be same!
                    </div>');
					redirect('profil/change_password');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
				
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password has been Change!
                    </div>');
					if ( $role ==2 ){
						redirect('profil');
					}else if( $role ==3 ){
						redirect('profil/profil_siswa');
					}else{
						redirect('profil/profile_guest');
					}
				}
			}
		}
	}

}