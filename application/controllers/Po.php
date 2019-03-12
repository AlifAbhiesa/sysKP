<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 23/02/2019
 * Time: 9:29
 */


class Po extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Po_model');
		//$this->load->model('Receipt_model');
		$this->load->library('session');
	}

	public function index()
	{

		$username = $this->session->userdata('username');
		if (!empty($username)) {
            $data = array('isi' => 'pages/page_po', 'title' => 'MUR SCM');
            $data['list_receipt'] = $this->Po_model->getReceipt();
            $this->load->view('layout/wrapper',$data);
			//Ajie's task
		} else {
            $this->load->view('pages/page_login');
			//Ajie's task
		}
	}

	public function getAll(){
		$list = $this->Po_model->get_datatables(); //getAllData
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->customerName;
			$row[] = $field->customerAddress;
			$row[] = $field->customerPhone;
			$row[] = $field->createdAt;
			$row[] = '<a href="'.base_url('public/imagePo/files/').$field->photo.'"><img src="'.base_url('public/imagePo/files/').$field->photo.'" width="100px" height="100px"></a>';
			$row[] = '<button onclick="getOne(\'' . $field->idPo . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
				'<button onclick="deleteGoods(\'' . $field->idPo . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Po_model->count_all(),
			"recordsFiltered" => $this->Po_model->count_filtered(),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}

	public function addData(){
		$customerName = $_POST['customerName'];
		$customerAddress = $_POST['customerAddress'];
		$customerPhone = $_POST['customerPhone'];
		$photo = $_POST['photo'];

		$data = array(
			'customerName' => $customerName,
			'customerAddress' => $customerAddress,
			'customerPhone' => $customerPhone,
			'photo' => $photo,
			'createdBy' => $this->session->userdata('idUser'),
			'active' => 'Y',
		);

		$result = $this->Po_model->addData($data);

		if($result > 0){
			echo "Ok";
		}else{
			echo "failed";
		}
	}

	public function getOne(){
		$id = $_POST['idPo'];

		$result = $this->Po_model->getOne($id);

		$data = array();
		$data['idPo'] = $result[0]['idPo'];
		$data['photo'] = $result[0]['photo'];
		$data['customerName'] = $result[0]['customerName'];
		$data['customerAddress'] = $result[0]['customerAddress'];
		$data['customerPhone'] = $result[0]['customerPhone'];

		echo json_encode($data);
	}


	public function updateData()
	{
		$idPo = $_POST['idPo'];

		$customerName = $_POST['customerName'];
		$customerAddress = $_POST['customerAddress'];
		$customerPhone = $_POST['customerPhone'];
		$photo = $_POST['photo'];

		$data = array(
			'customerName' => $customerName,
			'customerAddress' => $customerAddress,
			'customerPhone' => $customerPhone,
			'photo' => $photo,
		);

		$result = $this->Po_model->updateData($idPo,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}

	public function deleteData()
	{
		$idPo = $_POST['idPo'];

		$data = array(
			'active' => 'N',
		);

		$result = $this->Po_model->updateData($idPo,$data);

		if($result > 0){
			echo "Ok";

		}else{
			echo "failed";
		}
	}


}
