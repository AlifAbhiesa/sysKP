<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 15/03/2019
 * Time: 19:19
 */

class KP extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('KP_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/Koordinator/page_kp', 'title' => 'KP');
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}


	public function getAll()
	{
		$list = $this->KP_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->idPengajuan;
			$row[] = $field->idMahasiswa;
			$row[] = $field->idPembimbing;
			$row[] = $field->idPenguji;
			$row[] = $field->judulKerjaPraktek;
			$row[] = $field->pembimbingPerusahaan;
			$row[] = '<button onclick="getOne(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteKP(\'' . $field->id . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->KP_model->count_all(),
			"recordsFiltered" => $this->KP_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	//add insert code here
	public function addData()
	{
		$idPengajuan = $_POST['idPengajuan'];
		$idMahasiswa = $_POST['idMahasiswa'];
		$idPembimbing = $_POST['idPembimbing'];
		$idPenguji = $_POST['idPenguji'];
		$judulKerjaPraktek = $_POST['judulKerjaPraktek'];
		$pembimbingPerusahaan = $_POST['pembimbingPerusahaan'];
		
		$data = array(
			'idPengajuan' => $idPengajuan,
			'idMahasiswa' => $idMahasiswa,
			'idPembimbing' => $idPembimbing,
			'idPenguji' => $idPenguji,
			'judulKerjaPraktek' => $judulKerjaPraktek,
			'pembimbingPerusahaan' => $pembimbingPerusahaan,
			
		);

		$result = $this->KP_model->addData($data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
	public function deleteData()
	{
		$idKerjaPraktek = $_POST['id'];
		

		$data = array(
			'active' => 'N',
		);

		$result = $this->KP_model->updateData($idKerjaPraktek,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
	public function getOne()
	{
		$idKerjaPraktek = $_POST['id'];
		

		$data = array(
			'active' => 'N',
		);

		$result = $this->KP_model->getOne($idKerjaPraktek);

		echo json_encode($result);
	}
		public function updateData()
	{
		$idPengajuan = $_POST['idPengajuan'];
		$idKerjaPraktek = $_POST['id'];
		$idMahasiswa = $_POST['idMahasiswa'];
		$idPembimbing = $_POST['idPembimbing'];
		$idPenguji = $_POST['idPenguji'];
		$judulKerjaPraktek = $_POST['judulKerjaPraktek'];
		$pembimbingPerusahaan = $_POST['pembimbingPerusahaan'];
		

		$data = array(
			'idPengajuan' => $idPengajuan,
			'idMahasiswa' => $idMahasiswa,
			'idPembimbing' => $idPembimbing,
			'idPenguji' => $idPenguji,
			'judulKerjaPraktek' => $judulKerjaPraktek,
			'pembimbingPerusahaan' => $pembimbingPerusahaan,
		);

		$result = $this->KP_model->updateData($idKerjaPraktek,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
}
?>
