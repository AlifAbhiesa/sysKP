<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 15/03/2019
 * Time: 19:19
 */

class Sidangkp extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Sidangkp_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/page_sidangkp', 'title' => 'Sys KP');
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}


	public function getAll()
	{
		$list = $this->Sidangkp_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->judulKP;
			$row[] = $field->nrp;
			$row[] = $field->nama;
			$row[] = $field->tglSidang;
			$row[] = $field->penguji;
			$row[] = $field->nilai;
			$row[] = '<button onclick="getOne(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteSidangkp(\'' . $field->id . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Sidangkp_model->count_all(),
			"recordsFiltered" => $this->Sidangkp_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}
	public function sidangkpView()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/Dosen/page_sidangkp', 'title' => 'Sidangkp');
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}


	public function getAllView()
	{
		$list = $this->Sidangkp_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->judulKP;
			$row[] = $field->nrp;
			$row[] = $field->nama;
			$row[] = $field->tglSidang;
			$row[] = $field->penguji;
			$row[] = $field->nilai;
			$row[] = '<button onclick="getOne(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Sidangkp_model->count_all(),
			"recordsFiltered" => $this->Sidangkp_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}
	public function sidangkpView1()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/Koordinator/page_sidangkp', 'title' => 'Sidangkp');
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}


	public function getAllView1()
	{
		$list = $this->Sidangkp_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->judulKP;
			$row[] = $field->nrp;
			$row[] = $field->nama;
			$row[] = $field->tglSidang;
			$row[] = $field->penguji;
			$row[] = $field->nilai;
			$row[] = '<button onclick="getOne(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteSidangkp(\'' . $field->id . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Sidangkp_model->count_all(),
			"recordsFiltered" => $this->Sidangkp_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}
	//add insert code here
	public function addData()
	{
		$judulKP = $_POST['judulKP'];
		$nrp = $_POST['nrp'];
		$nama = $_POST['nama'];
		$tglSidang = $_POST['tglSidang'];
		$penguji = $_POST['penguji'];
		$nilai = $_POST['nilai'];
		
		$data = array(
			'judulKP' => $judulKP,
			'nrp' => $nrp,
			'nama' => $nama,
			'tglSidang' => $tglSidang,
			'penguji' => $penguji,
			'nilai' => $nilai,
			
		);

		$result = $this->Sidangkp_model->addData($data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
	public function deleteData()
	{
		$id = $_POST['id'];
		

		$data = array(
			'active' => 'N',
		);

		$result = $this->Sidangkp_model->updateData($id,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
	public function getOne()
	{
		$id = $_POST['id'];
		

		$data = array(
			'active' => 'N',
		);

		$result = $this->Sidangkp_model->getOne($id);

		echo json_encode($result);
	}
		public function updateData()
	{
		$judulKP = $_POST['judulKP'];
		$id = $_POST['id'];
		$nrp = $_POST['nrp'];
		$nama = $_POST['nama'];
		$tglSidang = $_POST['tglSidang'];
		$penguji= $_POST['penguji'];
		$nilai= $_POST['nilai'];
		

		$data = array(
			'judulKP' => $judulKP,
			'nrp' => $nrp,
			'nama' => $nama,
			'tglSidang' => $tglSidang,
			'penguji' => $penguji,
			'nilai' => $nilai,
		);

		$result = $this->Sidangkp_model->updateData($id,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
}
?>
