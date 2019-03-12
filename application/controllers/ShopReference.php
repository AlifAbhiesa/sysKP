<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 23/02/2019
 * Time: 9:29
 */


class ShopReference extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Shopreference_model');
		$this->load->library('session');
	}

	public function index()
	{

		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data = array('isi' => 'pages/page_reference', 'title' => 'MUR SCM');
			$data['list_receipt'] = $this->Shopreference_model->getReceipt();
			$this->load->view('layout/wrapper',$data);
			//Ajie's task
		} else {
			//Ajie's task
		}
	}

	public function getAll(){
		$receipt = $_POST['receipt'];
		$qty = $_POST['qty'];

		$list = $this->Shopreference_model->get_datatables($receipt, $qty); //getAllData

		//echo $receipt;
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->name;
			$row[] = $field->description;
			$row[] = $field->qty.' '.$field->unit;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Shopreference_model->count_all(),
			"recordsFiltered" => $this->Shopreference_model->count_filtered(1, 5),
			"data" => $data,
		);
		//JSON output
		echo json_encode($output);
	}






}
