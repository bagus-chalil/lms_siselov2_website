<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
	parent::__construct();
	$this->load->model('M_Login','login');
	$this->load->library('form_validation');

	}

	public function index()
	{
		error_reporting(0);
		if ( $this->session->userdata['role_id'] == 1){
			redirect('admin');
		}else if ( $this->session->userdata['role_id'] == 2){
			redirect('guru');
		}else if ( $this->session->userdata['role_id'] == 3){
			redirect('kelas');
		}
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		
		if ($this->form_validation->run() == FALSE){
			$data['title']="Login- LMS SISELO V2";
			$this->load->view('templatef/header',$data);
			$this->load->view('login',$data);
			$this->load->view('templatef/header');
		}else{
			$this->_login();
		}
	}
	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->login->user_login($email);
		
		if($user){
			if($user['is_active'] == 1 ){
				//cek password
				if(password_verify($password, $user['password'])){
					$data = [
						'id' => $user['id'],
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'nisn' => $user['nisn'],
						'nip' => $user['nip'],
						'id_guru' => $user['id_guru'],
						'kelas' => $user['kelas_id'],
						'name' => $user['name']
					];
					$status = true;
					$this->session->set_userdata($data);
					if ($user['verifikasi_user'] ==3){
						if ($user['role_id'] ==1){
							redirect('admin');
						}else if($user['role_id'] ==2){
							redirect('website/guru');
						}else if($user['role_id'] ==3){
							redirect('kelas');
						}else{
							$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">
							Your Account does not exist!
							</div>');
							redirect('login');
						}
					}else {
						redirect('website');
					}
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">
					Your Password is Incorrect !
					</div>');	
				redirect('login');
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">
				Your Email dont Activated !
				</div>');	
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">
			Your Account dont register !
			</div>');
			redirect('login');
		}
	}
	public function awal(){
		error_reporting(0);
		if ( $this->session->userdata['role_id'] == 1){
			redirect('admin');
		}else if ( $this->session->userdata['role_id'] == 2){
			redirect('guru');
		}else if ( $this->session->userdata['role_id'] == 3){
			redirect('kelas');
		}else if ( $this->session->userdata['role_id'] == 4){
			redirect('website');
		}
		$this->load->view('landing_page');
	} 
	public function pengumuman(){
		error_reporting(0);
		if ( $this->session->userdata['role_id'] == 1){
			redirect('admin');
		}else if ( $this->session->userdata['role_id'] == 2){
			redirect('guru');
		}else if ( $this->session->userdata['role_id'] == 3){
			redirect('kelas');
		}
		$data['pengumuman'] = $this->login->get_pengumuman();
		$this->load->view('pengumuman',$data);
	} 
	public function logout($id){
		$data = array (
			'id' => $id,
			'last_login' => time()
		);
		$this->db->where('id',$id);
		$this->db->update('user',$data);
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('nisn');
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('id_guru');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('kelas_id');

		$this->session->set_flashdata('message','<div class="alert alert-primary text-center" role="alert">
		   Thank you, You Have been Logout !
		   </div>');
		   redirect('login');
	} 
	public function logout1(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('nisn');
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('kelas_id');

		$this->session->set_flashdata('message','<div class="alert alert-primary text-center" role="alert">
		   Thank you, You Have been Logout !
		   </div>');
		   redirect('login');
	} 

}