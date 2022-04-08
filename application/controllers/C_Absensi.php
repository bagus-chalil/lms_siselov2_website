<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class C_Absensi extends RestController {
    public function __construct(){
        parent::__construct();
        $this->load->model('M_Data', 'data');
    }
    public function index_get() {
        $nisn = $this->get('nisn');
        
        if ($nisn == '') {
            $absensi = $this->db->get('absensi')->result();
        } else {
            $absensi = $this->data->get_absensi($nisn);
        }
        $this->response($absensi,  RestController::HTTP_OK);
    }
    //Mengirim atau menambah data kontak baru
	function index_post() {
        $data = [
			'absen_id'	=> $this->input->post('absen_id'),
			'nisn'		=> $this->input->post('nisn'),
			'tgl_absen_siswa'=> time(),
			'status'	=> 1
		];
		$insert = $this->db->insert('absensi_siswa',$data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>