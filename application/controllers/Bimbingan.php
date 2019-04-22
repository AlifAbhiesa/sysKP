<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 15/03/2019
 * Time: 19:19
 */

class Bimbingan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Bimbingan_model');
		$this->load->model('BimbinganMhsw_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/page_bimbingan', 'title' => 'Bimbingan');
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}


	public function getAll()
	{
		$list = $this->Bimbingan_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->idKerjaPraktek1;
			$row[] = $field->materiBimbingan;
			$row[] = '<button onclick="getOne(\'' . $field->idBimbingan . '\')" idBimbingan="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteBimbingan(\'' . $field->idBimbingan . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Bimbingan_model->count_all(),
			"recordsFiltered" => $this->Bimbingan_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}
	public function bimbinganView()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/Mahasiswa/page_bimbingan', 'title' => 'Bimbingan');
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}
	public function getAllView()
	{
		$list = $this->BimbinganMhsw_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->idKerjaPraktek1;
			$row[] = $field->materiBimbingan;
			$row[] = '<button onclick="getOne(\'' . $field->idBimbingan . '\')" idBimbingan="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteBimbingan(\'' . $field->idBimbingan . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->BimbinganMhsw_model->count_all(),
			"recordsFiltered" => $this->BimbinganMhsw_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}
	//add insert code here
	public function addData()
	{
		$idKerjaPraktek1 = $_POST['idKerjaPraktek1'];
		$materiBimbingan = $_POST['materiBimbingan'];

		$data = array(
			'idKerjaPraktek1' => $idKerjaPraktek1,
			'materiBimbingan' => $materiBimbingan,


		);

		$result = $this->Bimbingan_model->addData($data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
	
	public function deleteData()
	{
		$idBimbingan = $_POST['idBimbingan'];
		

		$data = array(
			'active' => 'N',
		);

		$result = $this->Bimbingan_model->updateData($idBimbingan,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
		public function getOne()
	{
		$idBimbingan = $_POST['idBimbingan'];
		

		$data = array(
			'active' => 'N',
		);

		$result = $this->Bimbingan_model->getOne($idBimbingan);

		echo json_encode($result);
	}
		public function updateData()
	{
		$idBimbingan = $_POST['idBimbingan'];
		$idKerjaPraktek1 = $_POST['idKerjaPraktek1'];
		$materiBimbingan = $_POST['materiBimbingan'];
		

		$data = array(
			'idkerjaPraktek1' => $idkerjaPraktek1,
			'materiBimbingan' => $materiBimbingan,
		);

		$result = $this->Bimbingan_model->updateData($idBimbingan,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
}
?>
