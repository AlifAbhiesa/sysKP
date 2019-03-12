<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 19/02/2019
 * Time: 11:25
 */

class Goods extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('Goods_model');
		$this->load->library('session');
	}

	public function index(){
		$username = $this->session->userdata('username');

		if(!empty($username)){
            $data = array('isi' => 'pages/page_goods', 'title' => 'MUR SCM');
            $this->load->view('layout/wrapper',$data);
			// show data
//			$data['list_goods'] = $this->Goods_model->getAll();
//			echo json_encode($data);
			//Ajie's task
		}else{
            $this->load->view('pages/page_login');
			//Ajie's task
		}
	}

	public function getAll(){
		$list = $this->Goods_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->name;
			$row[] = $field->description;
			$row[] = $field->type;
			$row[] = '<button onclick="getOne(\'' . $field->idGoods . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteGoods(\'' . $field->idGoods . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Goods_model->count_all(),
			"recordsFiltered" => $this->Goods_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	public function addData()
	{
		$idGoods = null;
		$name = $_POST['name'];
		$description = $_POST['description'];
		$type = $_POST['type'];
		$unit = $_POST['unit'];

		$data2 = array(
			'idGoods' => $idGoods,
			'name' => $name,
			'description' => $description,
			'unit' => $unit,
			'active' => 'Y',
			'type' => $type,
			'createdBy' => $this->session->userdata('idUser'),
		);

		$createdBy = $this->session->userdata('idUser');

		$result = $this->Goods_model->saveData($data2, 0, 'null', $createdBy, $unit);
		if($result > 0){
			echo "Ok";
		}else{
			echo "failed";
		}
	}

	//getOneData
	public function getOne()
	{
		$id = $_POST['idGoods'];
		$result = $this->Goods_model->getOne($id);

		$data = array();
		$data['idGoods'] = $result[0]['idGoods'];
		$data['name'] = $result[0]['name'];
		$data['description'] = $result[0]['description'];
		$data['type'] = $result[0]['type'];
		$data['unit'] = $result[0]['unit'];
		echo json_encode($data);
	}

	//updateData

	public function updateData()
	{
		$idGoods = $_POST['idGoods'];
		$name = $_POST['name'];
		$description = $_POST['description'];
		$type = $_POST['type'];
		$unit = $_POST['unit'];

		$data2 = array(
			'name' => $name,
			'description' => $description,
			'type' => $type,
			'unit' => $unit,
		);

		$result = $this->Goods_model->updateData($idGoods,$data2);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}

	//delete
	public function deleteData()
	{
		$idGoods = $_POST['idGoods'];

		$data = array(
			'active' => 'N',
		);

		$result = $this->Goods_model->deleteData($idGoods,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "failed";
		}
	}

}



