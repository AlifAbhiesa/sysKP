<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 15/03/2019
 * Time: 19:19
 */

class Perusahaan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Perusahaan_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/page_perusahaan', 'title' => 'Sys KP');
			$this->load->view('layout/wrapper', $data);
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}


	public function getAll()
	{
		$list = $this->Perusahaan_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->namaPerusahaan;
			$row[] = $field->alamatPerusahaan;
			$row[] = $field->emailPerusahaan;
			$row[] = $field->fax;
			$row[] = '<button onclick="getOne(\'' . $field->idPerusahaan . '\')" idPerusahaan="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deletePerusahaan(\'' . $field->idPerusahaan . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Perusahaan_model->count_all(),
			"recordsFiltered" => $this->Perusahaan_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}
	//add insert code here
	public function addData()
	{
		$namaPerusahaan = $_POST['namaPerusahaan'];
		$alamatPerusahaan = $_POST['alamatPerusahaan'];
		$emailPerusahaan = $_POST['emailPerusahaan'];
		$fax = $_POST['fax'];

		$data = array(
			'namaPerusahaan' => $namaPerusahaan,
			'alamatPerusahaan' => $alamatPerusahaan,
			'emailPerusahaan' => $emailPerusahaan,
			'fax' => $fax,


		);

		$result = $this->Perusahaan_model->addData($data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
	
	public function deleteData()
	{
		$idPerusahaan = $_POST['idPerusahaan'];
		

		$data = array(
			'active' => 'N',
		);

		$result = $this->Perusahaan_model->updateData($idPerusahaan,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
		public function getOne()
	{
		$idPerusahaan = $_POST['idPerusahaan'];
		

		$data = array(
			'active' => 'N',
		);

		$result = $this->Perusahaan_model->getOne($idPerusahaan);

		echo json_encode($result);
	}
		public function updateData()
	{
		$idPerusahaan = $_POST['idPerusahaan'];
		$namaPerusahaan = $_POST['namaPerusahaan'];
		$alamatPerusahaan = $_POST['alamatPerusahaan'];
		$emailPerusahaan = $_POST['emailPerusahaan'];
		$fax = $_POST['fax'];
		

		$data = array(
			'namaPerusahaan' => $namaPerusahaan,
			'alamatPerusahaan' => $alamatPerusahaan,
			'emailPerusahaan' => $emailPerusahaan,
			'fax' => $fax,
		);

		$result = $this->Perusahaan_model->updateData($idPerusahaan,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}
}
?>
