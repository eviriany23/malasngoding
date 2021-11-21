<?php
class Upload extends CI_Controller{
    
    function __construct(){
        parent::__construct();
            $this->load->helper(array('form', 'url'));
    }

    public function index(){
        $this->load->view('v_upload', array('error' => ' ' ));
    }

    public function aksi_upload(){
        $config['upload_path']      = './gambar/';
        $config['allowed_types']    = 'gif|jpg|png'; // file yang di perbolehkan
        $config['max_size']         = 200;  // maksimal ukuran
        $config['max_width']        = 1400; //lebar maksimal
        $config['max_height']       = 768;  //tinggi maksimal
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('berkas')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('v_upload', $error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('v_upload_sukses', $data);
        }
    }
}