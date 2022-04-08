<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('M_User','user');
	}
	//User Role
	public function index()
	{
		$data['title'] = "Role";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('role',$data);
		$this->load->view('templatea/footer');
	}
	public function addrole()
	{
		$this->db->insert('user_role', ['role' => $this->input->post('role')]);
		$this->session->set_flashdata('message', '<div class="alert alert-success"
		role="alert">New Role Added !!!</div>');
		redirect('User');
	}
	public function delete_role($id)
	{
		$delete = $this->user->Mdelete_role($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger"
		role="alert">Delete Role Success !!!</div>');
		redirect('User');
	}
	public function roleAccess($role_id)
	{
		$data['title'] = "Role Access Change";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('user/role_access');
		$this->load->view('templatea/footer',$data);
	}
	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];
		$result = $this->db->get_where('user_access_menu', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-primary"
		role="alert">Access Role Change !!!</div>');
	}

	//User Level
	public function user_level() {
		$data['title'] = "User level";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->user->get_user_role_verifikasi();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('user/v_user_awal');
		$this->load->view('templatea/footer',$data);
	}

	public function view_user($id) {
		$data['title'] = "User level";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['users'] = $this->user->get_user_level_siswa($id);
		$data['userg'] = $this->user->get_user_level_guru($id);

		$data['role'] = $this->user->get_user_role()->result_array();
		$data['kelas']=$this->db->get('kelas')->result_array();
		$data['guru']=$this->db->get('guru')->result_array();
		$data['matpel']=$this->db->get('matpel')->result_array();
		$data['role_id']=$id;
		
		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('user/v_user');
		$this->load->view('templatea/footer',$data);
	}
	public function add_roleLevel()
    {
        $data = array (
            'nip'=>$this->input->post('nisn'),
            'nama_guru'=>$this->input->post('name'),
            'emails'=>$this->input->post('emails'),
            'matpel_id'=>$this->input->post('matpel')
        );
		$data1 = array (
			'id'=>$this->input->post('id'),
			'role_id'=>$this->input->post('user_id')
		);
		$this->db->insert('guru',$data);
		$this->user->ubah_userLevel1($data1);
		$this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">SubMenu Successful Edit !!!</div>');
        redirect('user/view_user');
    }
	public function edit_data_user_siswa()
    {
		$id = $this->input->post('user_id');
		$kode = $this->input->post('role_id');
		$name = $this->input->post('name');
        $data = array (
            'nama_siswa'=>$name,
			'nisn'=>$this->input->post('nisn'),
			'kelas_id'=>$this->input->post('kelas'),
			'wali_kelas'=>$this->input->post('wali')
        );
		$data1 = array (
			'nomor'=>$this->input->post('nisn')
		);
		$this->db->where('user_id',$id);
		$this->db->update('siswa', $data);
        $this->user->ubah_userLevel($data1);

		$this->session->set_flashdata('message', '<div class="alert alert-primary"
		role="alert">Edit data user <b>'.$name.'</b> ,has been successfull !!!</div>');
        redirect('user/view_user/'.$kode);
    }
	public function edit_data_user_guru()
    {
		$id = $this->input->post('user_id');
		$kode = $this->input->post('role_id');
		$name = $this->input->post('name');
        $data = array (
            'nama_guru'=>$name,
			'nip'=>$this->input->post('nip'),
			'matpel_id'=>$this->input->post('matpel')
        );
		$data1 = array (
			'nomor'=>$this->input->post('nip')
		);
		$this->db->where('user_id',$id);
		$this->db->update('guru', $data);
        $this->user->ubah_userLevel($data1);

		$this->session->set_flashdata('message', '<div class="alert alert-primary"
		role="alert">Edit data user <b>'.$name.'</b> ,has been successfull !!!</div>');
        redirect('user/view_user/'.$kode);
    }

	//User Verifikasi
	public function verifikasi_user() {
		$data['title'] = "User Verification";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->user->get_user_role_verifikasi();
		// $data['kelas']=$this->db->get('kelas')->result_array();
		// $data['guru']=$this->db->get('guru')->result_array();
		// $data['matpel']=$this->db->get('matpel')->result_array();

		// var_dump($data['role']);die;

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('user/verifikasi');
		$this->load->view('templatea/footer',$data);
	}
	public function change_verifikasi_user($id)
	{
		$data['title'] = "User Verification";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['users'] = $this->user->get_user_verifikasi($id);
		$data['users1'] = $this->db->get('user')->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('user/verifikasi_user');
		$this->load->view('templatea/footer',$data);
	}
	public function verified_user_siswa()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$nisn = $this->input->post('nomor');
		$verifikasi_user = $this->input->post('verifikasi_user');
		$role_id = $this->input->post('identitas');
		$kode = $this->input->post('identitas');

		$data = [
			'id' => $id,
			'role_id' => $role_id,
			'verifikasi_user' => $verifikasi_user
		];
		$data1 = [
			'user_id' => $id,
			'nisn' => $nisn,
			'nama_siswa' => $name
		];
		
		$this->db->where('id',$id);
		$this->db->update('user', $data);
		$this->db->insert('siswa', $data1);
		
		$this->session->set_flashdata('message', '<div class="alert alert-primary"
		role="alert">Verifikasi user <b>'.$name.'</b> ,has been successfull !!!</div>');
		redirect('user/change_verifikasi_user/'.$kode);
	}
	public function verified_user_guru()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$nip = $this->input->post('nomor');
		$verifikasi_user = $this->input->post('verifikasi_user');
		$role_id = $this->input->post('identitas');
		$kode = $this->input->post('identitas');

		$data = [
			'id' => $id,
			'role_id' => $role_id,
			'verifikasi_user' => $verifikasi_user
		];
		$data1 = [
			'user_id' => $id,
			'nip' => $nip,
			'nama_guru' => $name
		];
		
		$this->db->where('id',$id);
		$this->db->update('user', $data);
		$this->db->insert('guru', $data1);
		
		$this->session->set_flashdata('message', '<div class="alert alert-primary"
		role="alert">Verifikasi user <b>'.$name.'</b> ,has been successfull !!!</div>');
		redirect('user/change_verifikasi_user/'.$kode);
	}
}