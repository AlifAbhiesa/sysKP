<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 19/02/2019
 * Time: 8:31
 */

class Receipt extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Receipt_model');
		$this->load->library('session');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		if (!empty($username)) {
            $data = array('isi' => 'pages/page_receipt', 'title' => 'MUR SCM');
            $data['list_goods'] = $this->Receipt_model->getGoods();
            $this->load->view('layout/wrapper',$data);
            // show data
            //Ajie's task
        }else{
            $this->load->view('pages/page_login');
            //Ajie's task
        }
	}

	public function getAll(){
		$list = $this->Receipt_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->name;
			$row[] = $field->description;
			$row[] = '<button onclick="getOne(\'' . $field->idReceipt . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteReceipt(\'' . $field->idReceipt . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Receipt_model->count_all(),
			"recordsFiltered" => $this->Receipt_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}
	//insert data

	public function addData()
	{
		$idReceipt = null;
		$name = $_POST['name'];
		$description = $_POST['description'];

		$data2 = array(
			'idReceipt' => $idReceipt,
			'name' => $name,
			'description' => $description,
			'active' => 'Y',
			'createdBy' => $this->session->userdata('idUser'),
		);

		$result = $this->Receipt_model->saveData($data2);
		if($result > 0){
			echo $result;
		}else{
			echo "Failed";
		}
	}

	//getOneData
	public function getOne()
	{
		$id = $_POST['idReceipt'];
		$result = $this->Receipt_model->getOne($id);

		$data = array();
		$data['idReceipt'] = $result[0]['idReceipt'];
		$data['name'] = $result[0]['name'];
		$data['description'] = $result[0]['description'];
		echo json_encode($data);


	}

	//updateData

	public function updateData()
	{

		$idReceipt = $_POST['idReceipt'];
		$name = $_POST['name'];
		$description = $_POST['description'];

		$data = array(
			'name' => $name,
			'description' => $description,
		);

		$result = $this->Receipt_model->updateData($idReceipt,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}

	//delete
	public function deleteData()
	{
		$idReceipt = $_POST['idReceipt'];

		$data = array(
			'active' => 'N',
		);

		$result = $this->Receipt_model->deleteData($idReceipt,$data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "failed";
		}
	}
}
