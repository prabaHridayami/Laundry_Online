<?php
    class Pages extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            if (! $this->session->userdata('logged')) {
                redirect('member');
            }
            $this->load->model('user', 'regis_model',TRUE);
            $this->load->library(array('session'));
            $this->load->helper(array('url'));
            
        }

        // public function cek_login(){
        //     $cek = $this->data_login->cek_login("admin",$where)->num_rows();
        //      if($cek > 0){

        //     $data_session = array(
        //         'nama' => $username,
        //         'status' => "login"
        //     );

        //    $this->session->set_userdata($data_session);

        //     redirect(base_url("admin"));
        //     }
        // }
        public function view($page = 'dashbor'){
           if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404(); 
            }
            $data['kabupaten'] = $this->regis_model->getKabupaten();
            $this->load->view('pages/'.$page, $data);
        }
        
    }  
?>