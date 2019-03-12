<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 19/02/2019
 * Time: 15:29
 */

class ReceiptGoods extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Receiptgoods_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			//Ajie's task
		} else {
			//Ajie's task
		}
	}

	public function getAll($idReceipt){
		$list = $this->Receiptgoods_model->get_datatables($idReceipt); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->name;
			$row[] = $field->description;
			$row[] = $field->qty.' '.$field->unit;
//			$row[] = '<button onclick="getOneGoods(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="menu-icon mdi mdi-pencil"></i></button>' .
//				'<button onclick="deleteShopGoods(\'' . $field->id . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Receiptgoods_model->count_all(),
			"recordsFiltered" => $this->Receiptgoods_model->count_filtered($idReceipt),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

    public function addData(){
        $idReceipt = $_POST['idReceipt'];
        $idGoods = $_POST['idGoods'];
        $qty = $_POST['qty'];
        $unit = $_POST['unit'];

        if($unit == "Ons"){
        	$unit = "gram";
        	$qty = (double)$qty*100;
		}

		if($unit == "Kg"){
        	$unit = "gram";
        	$qty = (double)$qty*1000;
		}

		if($unit == "Liter"){
        	$unit = "ml";
        	$qty = (double)$qty*1000;
		}

        $data = array(
            'idReceipt' => $idReceipt,
            'idGoods' => $idGoods,
            'qty' => $qty,
            'unit' => $unit,
            'createdBy' => $this->session->userdata('idUser'),
            'active' => 'Y',
        );

        $result = $this->Receiptgoods_model->addData($data);

        if($result > 0){
            echo "Ok";
        }else{
            echo "Failed";
        }
    }

	public function getOne(){
		$id = $_POST['id'];

		$result = $this->Receiptgoods_model->getOne($id);

		$data = array();
		$data['id'] = $result[0]['id'];
		$data['idReceipt'] = $result[0]['idReceipt'];
		$data['idGoods'] = $result[0]['idGoods'];
		$data['qty'] = $result[0]['qty'];
		$data['unit'] = $result[0]['unit'];

		echo json_encode($data);
	}

	public function updateData(){
		$id = $_POST['id'];
		$idReceipt = $_POST['idReceipt'];
		$idGoods = $_POST['idGoods'];
		$qty = $_POST['qty'];
		$unit = $_POST['unit'];

		$data = array(
			'idReceipt' => $idReceipt,
			'idGoods' => $idGoods,
			'qty' => $qty,
			'unit' => $unit,
			'active' => 'Y',
		);

		$result = $this->Receiptgoods_model->updateData($id,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}

	public function deleteData(){
		$id = $_POST['id'];

		$data = array(
			'active' => 'N',
		);

		$result = $this->Receiptgoods_model->updateData($id,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "Failed";
		}
	}

	public function getGoodsByPO(){
		$idPo = $_POST['id'];

		echo $this->Shopgoods_model->getGoodsByPO($idPo);
	}


}
