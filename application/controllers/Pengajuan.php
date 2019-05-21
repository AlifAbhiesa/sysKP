<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 12/04/2019
 * Time: 6:11
 */
class Pengajuan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('PengajuanWali_model');
		$this->load->model('PengajuanKoordinator_model');
		$this->load->model('Perusahaan_model');
		$this->load->model('Pengajuan_model');
		$this->load->model('Dosen_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/mahasiswa/page_pengajuan', 'title' => 'Pengajuan');
			$data['list_perusahaan'] = $this->Pengajuan_model->getAllPerusahaan();
			$data['list_dosen'] = $this->Dosen_model->getAllDosen();
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}


	public function getAll()
	{

		$idReference = $this->session->userdata('idReference');
		$list = $this->Pengajuan_model->get_datatables($idReference); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->namaPerusahaan;

			// Approval Wali
			if($field->approveWali == "N"){
				$row[] = '<button class="btn btn-danger btn-xs">Rejected</button>';
			}elseif($field->approveWali == "Y"){
				$row[] = '<button class="btn btn-success btn-xs">Approved</button>';
			}else{
				$row[] = '<button class="btn btn-warning btn-xs">Waiting</button>';
			}

			//Approval Perusahaan
			if($field->approvePerusahaan == "N"){
				$row[] = '<button class="btn btn-danger btn-xs">Rejected</button>';
			}elseif($field->approvePerusahaan == "Y"){
				$row[] = '<button class="btn btn-success btn-xs">Approved</button>';
			}else{
				$row[] = '<button onclick="getOne(\'' . $field->idPengajuan . '\')" class="btn btn-warning btn-xs">Waiting</button>';
			}

			//Approval Koordinator
			if($field->approveKoordinator == "N"){
				$row[] = '<button class="btn btn-danger btn-xs">Rejected</button>';
			}elseif($field->approveWali == "Y"){
				$row[] = '<button class="btn btn-success btn-xs">Approved</button>';
			}else{
				$row[] = '<button class="btn btn-warning btn-xs">Waiting</button>';
			}

			//$row[] = '<button onclick="getOne(\'' . $field->idPengajuan . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-upload"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Pengajuan_model->count_all(),
			"recordsFiltered" => $this->Pengajuan_model->count_filtered($idReference),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	public function pengajuanView()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/Wali/page_pengajuan', 'title' => 'Pengajuan');
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
		}
	}


	public function getAllView()
	{
		$idWali = $this->session->userdata('idReference');

		$list = $this->PengajuanWali_model->get_datatables($idWali); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->namaPerusahaan;
			// Approval Wali
			if($field->approveWali == "N"){
				$row[] = '<button class="btn btn-danger btn-xs">Rejected</button>';
			}elseif($field->approveWali == "Y"){
				$row[] = '<button class="btn getAllbtn-success btn-xs">Approved</button>';
			}else{
				$row[] = '<button class="btn btn-warning btn-xs">Waiting</button>';
			}
			//Approval Perusahaan
			if($field->approvePerusahaan == "N"){
				$row[] = '<button class="btn btn-danger btn-xs">Rejected</button>';
			}elseif($field->approveWali == "Y"){
				$row[] = '<button class="btn btn-success btn-xs">Approved</button>';
			}else{
				$row[] = '<button class="btn btn-warning btn-xs">Waiting</button>';
			}

			//Approval Koordinator
			if($field->approveKoordinator == "N"){
				$row[] = '<button class="btn btn-danger btn-xs">Rejected</button>';
			}elseif($field->approveWali == "Y"){
				$row[] = '<button class="btn btn-success btn-xs">Approved</button>';
			}else{
				$row[] = '<button class="btn btn-warning btn-xs">Waiting</button>';
			}
			$row[] = $field->buktiApproval;





			//Approve
			//$row[] = $field->buktiApproval;



			$row[] = '<button onclick="approve(\'' . $field->idPengajuan . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-check"></i></button>'.
				'<button onclick="getOne(\'' . $field->idPengajuan . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->PengajuanWali_model->count_all(),
			"recordsFiltered" => $this->PengajuanWali_model->count_filtered($idWali),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	public function saveApprovePerusahaan(){
		$idPengajuan = $_POST['idPengajuan'];
		$status = $_POST['status'];

		$data = array(
		'approvePerusahaan' => $status,
		'approvePerusahaanAt' => date("Y-m-d"),

		);

		$res = $this->Pengajuan_model->updateData($idPengajuan, $data);

		if($res > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
}
