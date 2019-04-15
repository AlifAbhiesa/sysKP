<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 15/03/2019
 * Time: 19:19
 */

class Mahasiswa extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/page_mahasiswa', 'title' => 'SysKP');
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}


	public function getAll()
	{
		$list = $this->Mahasiswa_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->idDosenWali;
			$row[] = $field->nama;
			$row[] = $field->nrp;
			$row[] = $field->nohp;
			$row[] = $field->transkrip;
			$row[] = '<button onclick="getOne(\'' . $field->idMahasiswa . '\')" idMahasiswa="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteMahasiswa(\'' . $field->idMahasiswa . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Mahasiswa_model->count_all(),
			"recordsFiltered" => $this->Mahasiswa_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	//add insert code here
	public function addData()
	{
		$idDosenWali = $_POST['idDosenWali'];
		$nama = $_POST['nama'];
		$nrp = $_POST['nrp'];
		$nohp = $_POST['nohp'];
		$transkrip = $_POST['transkrip'];

		$data = array(
			'idDosenWali' => $idDosenWali,
			'nama' => $nama,
			'nrp' => $nrp,
			'nohp' => $nohp,
			'transkrip' => $transkrip,


		);

		$result = $this->Mahasiswa_model->addData($data);

		if ($result > 0) {
			echo "Ok";
		} else {
			echo "Failed";
		}
	}
	public function deleteData()
	{
		$idMahasiswa = $_POST['idMahasiswa'];


		$data = array(
			'active' => 'N',
		);

		$result = $this->Mahasiswa_model->updateData($idMahasiswa, $data);

		if ($result > 0) {
			echo "Ok";
		} else {
			echo "Failed";
		}
	}
	public function getOne()
	{
		$idMahasiswa = $_POST['idMahasiswa'];


		$data = array(
			'active' => 'N',
		);

		$result = $this->Mahasiswa_model->getOne($idMahasiswa);

		echo json_encode($result);
	}
	public function updateData()
	{
		$idMahasiswa = $_POST['idMahasiswa'];
		$idDosenWali = $_POST['idDosenWali'];
		$nrp = $_POST['nrp'];
		$nama = $_POST['nama'];
		$nohp = $_POST['nohp'];
		$transkrip = $_POST['transkrip'];

		$data = array(
			'idDosenWali' => $idDosenWali,
			'nama' => $nama,
			'nrp' => $nrp,
			'nohp' => $nohp,
			'transkrip' => $transkrip,

		);

		$result = $this->Mahasiswa_model->updateData($idMahasiswa, $data);

		if ($result > 0) {
			echo "Ok";
		} else {
			echo "Failed";
		}
	}
}
