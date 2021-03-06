<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 15/03/2019
 * Time: 19:19
 */

class Dosen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dosen_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/page_dosen', 'title' => 'SysKP');
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}


	public function getAll()
	{
		$list = $this->Dosen_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->nip;
			$row[] = $field->nama;
			$row[] = $field->email;
			$row[] = '<button onclick="getOne(\'' . $field->idDosen . '\')" idDosen="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteDosen(\'' . $field->idDosen . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Dosen_model->count_all(),
			"recordsFiltered" => $this->Dosen_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	//add insert code here
	public function addData()
	{
		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];

		$data = array(
			'nip' => $nip,
			'nama' => $nama,
			'email' => $email,


		);

		$result = $this->Dosen_model->addData($data);

		if ($result > 0) {
			echo "Ok";
		} else {
			echo "Failed";
		}
	}
	public function deleteData()
	{
		$idDosen = $_POST['idDosen'];


		$data = array(
			'active' => 'N',
		);

		$result = $this->Dosen_model->updateData($idDosen, $data);

		if ($result > 0) {
			echo "Ok";
		} else {
			echo "Failed";
		}
	}
	public function getOne()
	{
		$idDosen = $_POST['idDosen'];


		$data = array(
			'active' => 'N',
		);

		$result = $this->Dosen_model->getOne($idDosen);

		echo json_encode($result);
	}
	public function updateData()
	{
		$idDosen = $_POST['idDosen'];
		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];

		$data = array(
			'nip' => $nip,
			'nama' => $nama,
			'email' => $email,

		);

		$result = $this->Dosen_model->updateData($idDosen, $data);

		if ($result > 0) {
			echo "Ok";
		} else {
			echo "Failed";
		}
	}
}

