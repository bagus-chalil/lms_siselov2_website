<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->library(['datatables', 'form_validation']);// Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->load->model('M_Soal', 'soal');
		$this->form_validation->set_error_delimiters('','');
        if ( $this->session->userdata['role_id'] != 2 ){
			redirect('templatef/blocked');
		}
	}

	public function output_json($data, $encode = true)
	{
        if($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function index()
	{
        $data['title'] = 'Bank Soal';
		$email=$this->session->userdata('email');
		$data['user'] = $this->soal->user_login($email);
        $nip=$data['user']['nomor'];
        
        
        if ($data['user']['role_id'] ==1){
            $data['matpel'] = $this->master->getAllMatpel();
        }else{
            //Jika bukan maka matkul dipilih otomatis sesuai matkul dosen
            $data['matpel'] = $this->soal->getMatpelGuru($nip);
        }
		$this->load->view('templatef/_templates/dashboard/_header.php', $data);
		$this->load->view('data',$data);
		$this->load->view('templatef/_templates/dashboard/_footer.php');
    }
    
    public function detail($id)
    {
       
        $data['title'] = 'Detail Soal Ujian';
		$email=$this->session->userdata('email');
		$data['user'] = $this->soal->user_login($email);
        $data['soal'] = $this->soal->getSoalById($id);

        $this->load->view('templatef/_templates/dashboard/_header.php', $data);
		$this->load->view('detail',$data);
		$this->load->view('templatef/_templates/dashboard/_footer.php');
    }
    
    public function add()
	{
		$data['title'] = 'Halaman Upload Soal Ujian';
		$email=$this->session->userdata('email');
		$data['user'] = $this->soal->user_login($email);
        $nip=$data['user']['nomor'];

		if ($data['user']['role_id'] ==1){
			$data['guru'] = $this->soal->getAllGuru();
		}else{
			$data['guru'] = $this->soal->getMatpelGuru($nip);
		}

		$this->load->view('templatef/_templates/dashboard/_header.php', $data);
		$this->load->view('add',$data);
		$this->load->view('templatef/_templates/dashboard/_footer.php');
	}

    public function edit($id)
	{
        $data['title'] = 'Halaman Edit Soal Ujian';
		$email=$this->session->userdata('email');
		$data['user'] = $this->soal->user_login($email);
        $nip=$data['user']['nomor'];
        $data['soal']=$this->soal->getSoalById($id);

		if ($data['user']['role_id'] ==1){
			$data['guru'] = $this->soal->getAllGuru();
		}else{
			$data['guru'] = $this->soal->getMatpelGuru($nip);
		}

		$this->load->view('templatef/_templates/dashboard/_header.php', $data);
		$this->load->view('edit',$data);
		$this->load->view('templatef/_templates/dashboard/_footer.php');
	}

	public function data($id=null, $guru=null)
	{
		$this->output_json($this->soal->getDataSoal($id, $guru), false);
    }

    public function validasi()
    {
        $email=$this->session->userdata('email');
		$data['user'] = $this->soal->user_login($email);
        if($data['user']['role_id'] ==1){
            $this->form_validation->set_rules('guru_id', 'Guru', 'required');
        }
        // $this->form_validation->set_rules('soal', 'Soal', 'required');
        // $this->form_validation->set_rules('jawaban_a', 'Jawaban A', 'required');
        // $this->form_validation->set_rules('jawaban_b', 'Jawaban B', 'required');
        // $this->form_validation->set_rules('jawaban_c', 'Jawaban C', 'required');
        // $this->form_validation->set_rules('jawaban_d', 'Jawaban D', 'required');
        // $this->form_validation->set_rules('jawaban_e', 'Jawaban E', 'required');
        $this->form_validation->set_rules('jawaban', 'Kunci Jawaban', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot Soal', 'required|max_length[2]');
    }

    public function file_config()
    {
        $allowed_type 	= [
            "image/jpeg", "image/jpg", "image/png", "image/gif",
            "audio/mpeg", "audio/mpg", "audio/mpeg3", "audio/mp3", "audio/x-wav", "audio/wave", "audio/wav",
            "video/mp4", "application/octet-stream"
        ];
        $config['upload_path']      = FCPATH.'uploads/bank_soal/';
        $config['allowed_types']    = 'jpeg|jpg|png|gif|mpeg|mpg|mpeg3|mp3|wav|wave|mp4';
        $config['encrypt_name']     = TRUE;
        
        $this->upload->initialize($config);
    }
    
    public function save()
    {
        $method = $this->input->post('method', true);
        $this->validasi();
        $this->file_config();
		$email=$this->session->userdata('email');
		$data['user'] = $this->soal->user_login($email);

		$role=$data['user']['role_id'];

        
        if($this->form_validation->run() === FALSE){
            $method==='add'? $this->add() : $this->edit();
        }else{
            $data = [
                'soal'      => $this->input->post('soal', true),
                'jawaban'   => $this->input->post('jawaban', true),
                'bobot'     => $this->input->post('bobot', true),
            ];
            
            $abjad = ['a', 'b', 'c', 'd', 'e'];
            
            // Inputan Opsi
            foreach ($abjad as $abj) {
                $data['opsi_'.$abj]    = $this->input->post('jawaban_'.$abj, true);
            }

            $i = 0;
            foreach ($_FILES as $key => $val) {
                $img_src = FCPATH.'./uploads/bank_soal/';
                $getsoal = $this->soal->getSoalById($this->input->post('id_soal', true));
                
                $error = '';
                if($key === 'file_soal'){
                    if(!empty($_FILES['file_soal']['name'])){
                        if (!$this->upload->do_upload('file_soal')){
                            $error = $this->upload->display_errors();
                            show_error($error, 500, 'File Soal Error');
                            exit();
                        }else{
                            if($method === 'edit'){
                                if(!unlink($img_src.$getsoal->file)){
                                    show_error('Error saat delete gambar <br/>'.var_dump($getsoal), 500, 'Error Edit Gambar');
                                    exit();
                                }
                            }
                            $data['file'] = $this->upload->data('file_name');
                            $data['tipe_file'] = $this->upload->data('file_type');
                        }
                    }
                }else{
                    $file_abj = 'file_'.$abjad[$i];
                    if(!empty($_FILES[$file_abj]['name'])){    
                        if (!$this->upload->do_upload($key)){
                            $error = $this->upload->display_errors();
                            show_error($error, 500, 'File Opsi '.strtoupper($abjad[$i]).' Error');
                            exit();
                        }else{
                            if($method === 'edit'){
                                if(!unlink($img_src.$getsoal->$file_abj)){
                                    show_error('Error saat delete gambar', 500, 'Error Edit Gambar');
                                    exit();
                                }
                            }
                            $data[$file_abj] = $this->upload->data('file_name');
                        }
                    }
                    $i++;
                }
            }
                
            if($role ==1){
                $pecah = $this->input->post('guru_id', true);
                $pecah = explode(':', $pecah);
                $data['guru_id'] = $pecah[0];
                $data['matpel_id'] = end($pecah);
            }else{
                $data['guru_id'] = $this->input->post('guru_id', true);
                $data['matpel_id'] = $this->input->post('matpel_id', true);
            }

            if($method==='add'){
                //push array
                $data['created_on'] = time();
                $data['updated_on'] = time();
                //insert data
                $this->soal->create('tb_soal', $data);
            }else if($method==='edit'){
                //push array
                $data['updated_on'] = time();
                //update data
                $id_soal = $this->input->post('id_soal', true);
                $this->soal->update('tb_soal', $data, 'id_soal', $id_soal);
            }else{
                show_error('Method tidak diketahui', 404);
            }
            redirect('soal');
        }
    }


    public function delete()
    {
        $chk = $this->input->post('checked', true);
        
        // Delete File
        foreach($chk as $id){
            $abjad = ['a', 'b', 'c', 'd', 'e'];
            $path = FCPATH.'uploads/bank_soal/';
            $soal = $this->soal->getSoalById($id);
            // Hapus File Soal
            if(!empty($soal->file)){
                if(file_exists($path.$soal->file)){
                    unlink($path.$soal->file);
                }
            }
            //Hapus File Opsi
            $i = 0; //index
            foreach ($abjad as $abj) {
                $file_opsi = 'file_'.$abj;
                if(!empty($soal->$file_opsi)){
                    if(file_exists($path.$soal->$file_opsi)){
                        unlink($path.$soal->$file_opsi);
                    }
                }
            }
        }

        if(!$chk){
            $this->output_json(['status'=>false]);
        }else{
            if($this->master->delete('tb_soal', $chk, 'id_soal')){
                $this->output_json(['status'=>true, 'total'=>count($chk)]);
            }
        }
    }
}