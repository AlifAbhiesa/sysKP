<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 23/02/2019
 * Time: 9:29
 */


class PoInventory extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Poinventory_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data['list_poInventory'] = $this->Poinventory_model->getAll();
			echo json_encode($data);
			//Ajie's task
		} else {
			//Ajie's task
		}
	}

	public function addData(){
		$idPo = $_POST['idPo'];
		$idInventory = $_POST['idInventory'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];

		$data = array(
		'idPo' => $idPo,
		'idInventory' => $idInventory,
		'qty' => $qty,
		'price' => $price,
		'createdBy' => $this->session->userdata('id'),
		'active' => 'Y',
		);

		$result = $this->Poinventory_model->addData($data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "failed";
		}
	}

	public function getOne(){
		$id = $_POST['id'];

		$result = $this->Poinventory_model->getOne($id);

		$data = array();
		$data['id'] = $result[0]['id'];
		$data['idPo'] = $result[0]['idPo'];
		$data['idInventory'] = $result[0]['idInventory'];
		$data['qty'] = $result[0]['qty'];
		$data['price'] = $result[0]['price'];

		echo json_encode($data);
	}


	public function updateData()
	{

		$id = $_POST['id'];
		$idPo = $_POST['idPo'];
		$idInventory = $_POST['idInventory'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];

		$data = array(
			'idPo' => $idPo,
			'idInventory' => $idInventory,
			'qty' => $qty,
			'price' => $price,
		);

		$result = $this->Poinventory_model->updateData($id,$data);

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

		$result = $this->Poinventory_model->updateData($id,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}
}
