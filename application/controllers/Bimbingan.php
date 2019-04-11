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
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/page_bimbingan', 'title' => 'SysKP');
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
			$row[] = $field->id_bimbingan;
			$row[] = $field->materi;
			$row[] = '<button onclick="getOne(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteBbg(\'' . $field->id . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
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

	//add insert code here
	public function addData()
	{
		$nrp = $_POST['id_bimbingan'];
		$nama = $_POST['materi'];

		$data = array(
			'id_bimbingan' => $id_bimbingan,
			'materi' => $materi,


		);

		$result = $this->Bimbingan_model->addData($data);

		if ($result > 0) {
			echo "Ok";
		} else {
			echo "Failed";
		}
	}
	public function deleteData()
	{
		$id = $_POST['id'];


		$data = array(
			'active' => 'N',
		);

		$result = $this->Bimbingan_model->updateData($id, $data);

		if ($result > 0) {
			echo "Ok";
		} else {
			echo "Failed";
		}
	}
	public function getOne()
	{
		$id = $_POST['id'];


		$data = array(
			'active' => 'N',
		);

		$result = $this->Bimbingan_model->getOne($id);

		echo json_encode($result);
	}
	public function updateData()
	{
		$id_bimbingan = $_POST['id_bimbingan'];
		$id = $_POST['id'];
		$materi = $_POST['materi'];

		$data = array(
			'id_bimbingan' => $id_bimbingan,
			'materi' => $materi,
		);

		$result = $this->Bimbingan_model->updateData($id, $data);

		if ($result > 0) {
			echo "Ok";
		} else {
			echo "Failed";
		}
	}
}

 