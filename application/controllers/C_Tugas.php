<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class C_Tugas extends RestController {
    public function __construct(){
        parent::__construct();
        $this->load->model('M_Data', 'data');
    }
    public function index_get() {
        $kelas_id = $this->get('kelas_id');
        $matpel_id = $this->get('matpel_id');
        if ($kelas_id == '' OR $matpel_id == '') {
            $tugas = $this->db->get('tugas')->result();
        } else {
            $tugas = $this->data->get_tugas($kelas_id, $matpel_id);
        }
        $this->response($tugas,  RestController::HTTP_OK);
    }
}
?>