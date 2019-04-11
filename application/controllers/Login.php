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

            	// Level 1 = mahasiswa
				// Level 2 = dosen
				// Level 3 = Dosen wali
				// Level 4 = Koordinator

				$loginData2 = array(
					"username" => $response[0]['username'],
					"level" => $response[0]['level'],
					"idLogin" => $response[0]['idLogin'],
					"idReference" => $response[0]['idReference']
				);


				$this->session->set_userdata($loginData2);
				if($this->session->userdata('level') == 1){
					echo "Mahasiswa";
				}elseif($this->session->userdata('level') == 2){
					echo "Dosen";
				}elseif($this->session->userdata('level') == 3){
					echo "Dosen Wali";
				}elseif ($this->session->userdata('level') == 4){
					echo "Koordinator";
				}else{
					echo "Admin";
				}

            }else{
                echo "Failed";
            }
        }

        public function Logout(){
			$this->session->sess_destroy();
			redirect('Login/', 'refresh');
        }

    }
?>
