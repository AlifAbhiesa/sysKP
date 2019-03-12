<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 23/02/2019
 * Time: 9:29
 */


class Shop extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Shop_model');
		$this->load->library('session');
	}

	public function index()
	{

		$username = $this->session->userdata('username');

		if (!empty($username)) {
            $data = array('isi' => 'pages/page_shop', 'title' => 'MUR SCM');
            $data['list_po'] = $this->Shop_model->getPo();
            $data['list_goods'] = $this->Shop_model->getGoods();
			$this->load->view('layout/wrapper',$data);
			//Ajie's task
		} else {
            $this->load->view('pages/page_login');
			//Ajie's task
		}
	}

	public function getAll(){
		$list = $this->Shop_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->market;
			$row[] = $field->createdAt;
			$row[] = $field->updatedAt;
			$row[] = '<button onclick="getOne(\'' . $field->idShopping . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="mdi mdi-pencil"></i></button>' .
				'<button onclick="deleteShop(\'' . $field->idShopping . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="mdi mdi-delete"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Shop_model->count_all(),
			"recordsFiltered" => $this->Shop_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	public function addData(){
		$market = $_POST['marketName'];
		$idPo = $_POST['idPo'];

		$data = array(
		'market' => $market,
		'idPo' => $idPo,
		'createdBy' => $this->session->userdata('idUser'),
		'active' => 'Y',
		);

		$result = $this->Shop_model->addData($data);

		echo $result;
	}

	public function getOne(){
		$id = $_POST['idShopping'];

		$result = $this->Shop_model->getOne($id);

		$data = array();
		$data['idShopping'] = $result[0]['idShopping'];
		$data['market'] = $result[0]['market'];
		$data['idPo'] = $result[0]['idPo'];

		echo json_encode($data);
	}


	public function updateData()
	{

		$idShopping = $_POST['idShopping'];
		$market = $_POST['marketName'];
		$idPo = $_POST['idPo'];

		$data = array(
			'market' => $market,
			'idPo' => $idPo,
		);

		$result = $this->Shop_model->updateData($idShopping,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}

	public function deleteData()
	{
		$idShopping = $_POST['idShopping'];

		$data = array(
			'active' => 'N',
		);

		$result = $this->Shop_model->updateData($idShopping,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}
}
