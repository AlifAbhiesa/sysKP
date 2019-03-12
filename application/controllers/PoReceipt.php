<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 01/03/2019
 * Time: 19:56
 */
class PoReceipt extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Poreceipt_model');
		$this->load->library('session');
	}

	public function getAll($idPo){
		$list = $this->Poreceipt_model->get_datatables($idPo); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->name;
			$row[] = $field->description;
			$row[] = $field->qty;
			$row[] = $field->price;
			$row[] = '<button onclick="getOneGoods(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="menu-icon mdi mdi-pencil"></i></button>' .
				'<button onclick="deleteShopGoods(\'' . $field->id . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Poreceipt_model->count_all(),
			"recordsFiltered" => $this->Poreceipt_model->count_filtered($idPo),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	public function addData(){
		$idPo = $_POST['idPo'];
		$idReceipt = $_POST['idReceipt'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];

		$data = array(
			'idPo' => $idPo,
			'idReceipt' => $idReceipt,
			'qty' => $qty,
			'price' => $price,
			'createdBy' => $this->session->userdata('idUser'),
			'active' => 'Y',
		);

		$result = $this->Poreceipt_model->addData($data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "failed";
		}
	}

	public function getOne(){
		$id = $_POST['id'];

		$result = $this->Poreceipt_model->getOne($id);

		$data = array();
		$data['id'] = $result[0]['id'];
		$data['idPo'] = $result[0]['idPo'];
		$data['idReceipt'] = $result[0]['idReceipt'];
		$data['qty'] = $result[0]['qty'];
		$data['price'] = $result[0]['price'];

		echo json_encode($data);
	}


	public function updateData()
	{

		$id = $_POST['id'];
		$idPo = $_POST['idPo'];
		$idReceipt = $_POST['idReceipt'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];

		$data = array(
			'idPo' => $idPo,
			'idReceipt' => $idReceipt,
			'qty' => $qty,
			'price' => $price,
		);

		$result = $this->Poreceipt_model->updateData($id,$data);

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

		$result = $this->Poreceipt_model->updateData($id,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}
}
