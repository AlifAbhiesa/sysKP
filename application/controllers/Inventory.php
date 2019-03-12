<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 23/02/2019
 * Time: 9:29
 */


class Inventory extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Inventory_model');
		$this->load->library('session');
	}

	public function index()
	{

		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/page_inventory', 'title' => 'MUR SCM');
			$this->load->view('layout/wrapper',$data);
			//Ajie's task
		} else {
			$this->load->view('pages/page_login');
			//Ajie's task
		}
	}

	public function getAll(){
		$list = $this->Inventory_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->name;
			$row[] = number_format($field->qty). ' ' .$field->unit;
			$row[] = $field->availability;
			$row[] = '<button onclick="getOne(\'' . $field->idInventory . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteGoods(\'' . $field->idInventory . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Inventory_model->count_all(),
			"recordsFiltered" => $this->Inventory_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}



	public function addData(){
		$idGoods = $_POST['idGoods'];
		$idProduction = $_POST['idProduction'];
		$availability = $_POST['availability'];
		$qty = $_POST['qty'];
		$unit = $_POST['unit'];

		$data = array(
			'idGoods' => $idGoods,
			'idProduction' => $idProduction,
			'availability' => $availability,
			'qty' => $qty,
			'unit' => $unit,
			'createdBy' => $this->session->userdata('idUser'),
			'active' => 'Y',
		);

		$result = $this->Inventory_model->addData($data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "failed";
		}
	}

	public function getOne(){
		$id = $_POST['idInventory'];

		$result = $this->Inventory_model->getOne($id);

		$data = array();
		$data['idInventory'] = $result[0]['idInventory'];
		$data['idGoods'] = $result[0]['idGoods'];
		$data['idProduction'] = $result[0]['idProduction'];
		$data['availability'] = $result[0]['availability'];
		$data['qty'] = $result[0]['qty'];
		$data['unit'] = $result[0]['unit'];

		echo json_encode($data);
	}


	public function updateData()
	{

		$idInventory = $_POST['idInventory'];
		$idGoods = $_POST['idGoods'];
		$idProduction = $_POST['idProduction'];
		$availability = $_POST['availability'];
		$qty = $_POST['qty'];
		$unit = $_POST['unit'];

		$data = array(
			'idGoods' => $idGoods,
			'idProduction' => $idProduction,
			'availability' => $availability,
			'qty' => $qty,
			'unit' => $unit,
		);

		$result = $this->Inventory_model->updateData($idInventory,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}

	public function deleteData()
	{
		$idInventory = $_POST['idInventory'];

		$data = array(
			'active' => 'N',
		);

		$result = $this->Inventory_model->updateData($idInventory,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}
}
