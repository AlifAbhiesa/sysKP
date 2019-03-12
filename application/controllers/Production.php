<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 01/03/2019
 * Time: 19:56
 */
class Production extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Production_model');
		$this->load->model('Po_model');
		$this->load->model('Inventory_model');
		$this->load->model('Goods_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
            $data = array('isi' => 'pages/page_production', 'title' => 'MUR SCM');
            $data['list_po'] = $this->Po_model->getAll();
           // $data['list_poreceipt'] = $this->Po_model->getAll();
            $this->load->view('layout/wrapper',$data);
		} else {
            $this->load->view('pages/page_login');
			//Ajie's task
		}
	}

	public function getAll(){
		$list = $this->Production_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = 'PO ID : '.$field->idPo.' - '.$field->customerName.' At '.$field->createdAt;
			$row[] = $field->name;
			$row[] = $field->qty;
			$row[] = 'Rp. '.$field->hpp;
			$row[] = '<button onclick="getOne(\'' . $field->idProduction . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteGoods(\'' . $field->idProduction . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Production_model->count_all(),
			"recordsFiltered" => $this->Production_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	public function getReceipt(){
		$idPo = $_POST['id'];

		echo $this->Production_model->getRerecipt($idPo);
	}

	public function addData(){

		$idReceipt = $_POST['idReceipt'];
		$idPo = $_POST['idPo'];
		$qty = $_POST['qty'];

		$receipt = $_POST['receipt'];

		$data = array(
			'idReceipt' => $idReceipt,
			'qty' => $qty,
			'idPo' => $idPo,
			'createdBy' => $this->session->userdata('idUser'),
			'active' => 'Y',
		);

		$result = $this->Production_model->addData($data);

		if($result > 0){
			//insert into inventory
			$insertGoods = $this->insertGoods($receipt, $idPo, $qty, $result);
			if($insertGoods == true){
				//update stock inventory
				$updateStock = $this->Production_model->updateStockInventory($qty, $idPo, $idReceipt);
				if($updateStock == true){
					//insert into production goods
					$insertProductionGoods = $this->Production_model->insertProductionGoods($idPo, $idReceipt, $qty, $result);
					if($insertProductionGoods == true){
						echo "Ok";
					}else{
						echo "Failed";
					}
				}else{
					echo "Failed";
				}
			}else{
				echo "Failed";
			}
		}else{
			echo "Failed";
		}
	}

	public function insertGoods($receipt,$idPo, $qty, $idProduction){

		$createdBy = $this->session->userdata('idUser');
		$unit = "pcs";

		$data = array(
			'name' => 'PO ID : '.$idPo.' | Receipt : '.$receipt,
			'description' => 'Barang hasil production',
			'type' => '3',
			'createdBy' => $this->session->userdata('idUser'),
			'active' => 'Y',
		);

		$result = $this->Goods_model->saveData($data, $qty, $idProduction, $createdBy, $unit);

		if($result > 0){
			return true;
		}else{
			echo false;
		}
	}

	public function getOne(){
		$id = $_POST['id'];

		$result = $this->Production_model->getOne($id);

		$data = array();
		$data['idProduction'] = $result[0]['idProduction'];
		$data['idReceipt'] = $result[0]['idReceipt'];
		$data['qty'] = $result[0]['qty'];

		echo json_encode($data);
	}


	public function updateData()
	{

		$idProduction = $_POST['idProduction'];
		$idReceipt = $_POST['idReceipt'];
		$qty = $_POST['qty'];

		$data = array(
			'idReceipt' => $idReceipt,
			'qty' => $qty,
		);

		$result = $this->Production_model->updateData($idProduction,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}

	public function deleteData()
	{
		$id = $_POST['id'];

		$data = array(
			'active' => 'N',
		);

		$result = $this->Production_model->updateData($id,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}
}
