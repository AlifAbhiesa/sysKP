<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 02/06/2018
 * Time: 18:03
 */


class User extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->library('session');
	}

	public function index(){
		$username = $this->session->userdata('username');
		if(!empty($username)){
            $data = array('isi' => 'pages/page_user', 'title' => 'MUR SCM');
            $this->load->view('layout/wrapper',$data);
		}else{
            $this->load->view('pages/page_login');
			//Ajie's task
		}
	}


	public function getAll(){
		$list = $this->Users_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->username;
			$row[] = $field->level;
			$row[] = $field->createdAt;
			$row[] = '<button onclick="getOne(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteUser(\'' . $field->id . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Users_model->count_all(),
			"recordsFiltered" => $this->Users_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	//insert data

	public function addUser()
	{
		$idUsers = null;
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$level = $_POST['level'];

		$data2 = array(
			'idUsers' => $idUsers,
			'username' => $username,
			'password' => $password,
			'level' => $level,
			'active' => 'Y',
			'createdBy' => $this->session->userdata('idUser'),
		);

		$result = $this->Users_model->saveData($data2);
		if($result > 0){
			echo "Ok";
		}else{
			echo "failed";
		}
	}

	//getOneData
	public function getOne()
	{
		$id = $_POST['idUser'];
		$result = $this->Users_model->getOne($id);

		$data = array();
		$data['idUsers'] = $result[0]['idUsers'];
		$data['username'] = $result[0]['username'];
		$data['level'] = $result[0]['level'];
		echo json_encode($data);


	}

	//updateData

	public function updateData()
	{

		$idUsers = $_POST['idUsers'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$level = $_POST['level'];

		$data2 = array(
			'username' => $username,
			'password' => $password,
			'level' => $level,
		);

		$result = $this->Users_model->updateData($idUsers,$data2);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}

	//delete
	public function deleteData()
	{
		$id_user = $this->encryption->decrypt($_POST['idUsers']);

		$data = array(
			'active' => 'N',
		);

		$result = $this->Users_model->deleteData($id_user,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "failed";
		}
	}

	//reset password
	public function Respas(){
		$id_user = $this->encryption->decrypt($_POST['idUsr']);
		$oldpassword = md5($_POST['oldpassword']);
		$newpassword = $_POST['newpassword'];

		$result = $this->Users_model->getOneReset($id_user,$oldpassword);

		if(!empty($result[0]['username'])){

			$data = array(
				'password' => md5($newpassword),
			);

			$this->Users_model->setPassword($id_user, $data);

			echo "Ok";
		}else{
			echo "Failed";
		}
	}

}
