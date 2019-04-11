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
			$row[] = $field->nrp;
			$row[] = $field->nama;
			$row[] = $field->noHp;
			$row[] = $field->dwali;
			$row[] = $field->dpmbg;
			$row[] = $field->tanggalDftr;
			$row[] = $field->tempatUslnKp;
			$row[] = $field->tahunAjrn;
			$row[] = $field->semester;
			$row[] = '<button onclick="getOne(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteDosen(\'' . $field->id . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
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
		$nrp = $_POST['nrp'];
		$nama = $_POST['nama'];
		$noHp = $_POST['noHp'];
		$dwali = $_POST['dwali'];
		$dpmbg = $_POST['dpmbg'];
		$tanggalDftr = $_POST['tanggalDftr'];
		$tempatUslnKp = $_POST['tempatUslnKp'];
		$tahunAjrn = $_POST['tahunAjrn'];
		$semester = $_POST['semester'];

		$data = array(
			'nrp' => $nrp,
			'nama' => $nama,
			'noHp' => $noHp,
			'dwali' => $dwali,
			'dpmbg' => $dpmbg,
			'tanggalDftr' => $tanggalDftr,
			'tempatUslnKp' => $tempatUslnKp,
			'tahunAjrn' => $tahunAjrn,
			'semester' => $semester,



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
		$id = $_POST['id'];


		$data = array(
			'active' => 'N',
		);

		$result = $this->Mahasiswa_model->updateData($id, $data);

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

		$result = $this->Mahasiswa_model->getOne($id);

		echo json_encode($result);
	}
	public function updateData()
	{
		$nrp = $_POST['nrp'];
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$noHp = $_POST['noHp'];
		$dwali = $_POST['dwali'];
		$dpmbg = $_POST['dpmbg'];
		$tanggalDftr = $_POST['tanggalDftr'];
		$tempatUslnKp = $_POST['tempatUslnKp'];
		$tahunAjrn = $_POST['tahunAjrn'];
		$semester = $_POST['semester'];


		$data = array(
			'nrp' => $nrp,
			'nama' => $nama,
			'noHp' => $noHp,
			'dwali' => $dwali,
			'dpmbg' => $dpmbg,
			'tanggalDftr' => $tanggalDftr,
			'tempatUslnKp' => $tempatUslnKp,
			'tahunAjrn' => $tahunAjrn,
			'semester' => $semester,
		);

		$result = $this->Mahasiswa_model->updateData($id, $data);

		if ($result > 0) {
			echo "Ok";
		} else {
			echo "Failed";
		}
	}
}

 