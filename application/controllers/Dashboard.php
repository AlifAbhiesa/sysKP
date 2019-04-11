<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Dashboard_model');
        $this->load->helper('string');
    }

    public function index(){
        $username = $this->session->userdata('username');
        if(!empty($username)){
            $data = array('isi' => 'pages/page_dashboard', 'title' => 'MUR SCM');
            $this->load->view('layout/wrapper',$data);
        }else{
            $this->load->view('pages/page_login');
//            $data = array('isi' => 'pages/page_dashboard', 'title' => 'MUR SCM');
//            $this->load->view('layout/wrapper',$data);
        }

    }


}
