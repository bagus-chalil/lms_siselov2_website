<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class C_Login extends RestController {
    public function __construct(){
        parent::__construct();
        $this->load->model('M_Data','data');
    }

	//Menampilkan data Kelas    
    public function index_post(){
        $email = $this->input->post('email',TRUE);
		$password = $this->input->post('password',TRUE);

        $user = $this->data->user_login($email);

        if($user){
			if($user->is_active == 1 ){
				//cek password
				if(password_verify($password, $user->password)){
						
					$status = true;
                    $this->response
					(['error'=>false, 'message'=>'exist',
							'id' => $user->id,
							'email' => $user->email,
							'role_id' => $user->role_id,
							'nisn' => $user->nisn,
							'nama_guru' => $user->nama_guru,
							'kelas' => $user->nama_kelas,
							'kelas_id' => $user->kelas_id,
							'name' => $user->name,
							'f_name' => $user->f_name,
							'l_name' => $user->l_name,
							'image' => $user->image,
							'wali_kelas' => $user->wali_kelas
						],RestController::HTTP_OK);
					
				}else{
                    $this->response(['error'=>true, 'message'=>'failed'], 401);
				}
			}else{
                $this->response(['error'=>true, 'message'=>'failed'], 401);
			}
		}else{
            $this->response(['error'=>true, 'message'=>'failed'], 401);
		}
    }
    
}
?>