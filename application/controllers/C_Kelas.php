<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class C_Kelas extends RestController {
    public function __construct(){
        parent::__construct();
        $this->load->model('M_Data', 'data');
    }
    public function index_get() {
        $nisn = $this->get('nisn');
        if ($nisn == '') {
            $mapel = $this->db->get('matpel')->result();
        } else {
            $this->db->where('nisn', $nisn);
            $mapel = $this->data->get_kelas_online($nisn);
        }
        $this->response($mapel,  RestController::HTTP_OK);
    }
    
}
?>