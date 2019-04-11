<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login extends CI_Controller{
        function __construct(){
        	parent::__construct();
        	$this->load->library('session');
            $this->load->model('Login_model');
            $this->load->helper('string');
//          header('Content-Type: application/json');
        }

        public function index(){
        	$this->load->view('pages/page_login');
        }

        public function login(){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $response = $this->Login_model->login($username, $password);
            //Saving Session
            if(count($response) > 0){
				$loginData2 = array(
					"username" => $response[0]['username'],
					"level" => $response[0]['level'],
					"idUser" => $response[0]['id']
				);
				$this->session->set_userdata($loginData2);
				echo "Ok";
            }else{
                echo "Failed";
            }
        }

        public function Logout(){
			$this->session->sess_destroy();
			redirect('Login/', 'refresh');
        }

    }
