<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 23/02/2019
 * Time: 9:31
 */
class Production_model extends CI_Model
{


	var $table = 'production_goods'; //nama tabel dari database
	var $column_order = array('null', 'name', 'qty','null'); //field yang ada di table user
	var $column_search = array('name'); //field yang diizin untuk pencarian
	var $order = array('idProduction' => 'DESC'); // default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	private function _get_datatables_query()
	{

		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) // looping awal
		{
			if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{

				if ($i === 0) // looping awal
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->select('po.idPo,
       po.customerName,
       po.createdAt,
       receipt.name,
       production.idProduction,
       production.qty,
       sum(production_goods.price*production_goods.qty) AS hpp');

		$this->db->join('production','production_goods.idproduction = production.idproduction','LEFT');
		$this->db->join('receipt','production.idreceipt = receipt.idreceipt','LEFT');
		$this->db->join('po','production.idPo = po.idPo','LEFT');
		$this->db->join('receipt_goods','receipt_goods.idgoods = production_goods.idgoods','LEFT');
		$this->db->where(array('production.active' => 'Y'));
		$this->db->group_by('production.idproduction ');
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$this->db->select('po.idPo,
       po.customerName,
       po.createdAt,
       receipt.name,
       production.idProduction,
       production.qty,
       sum(production_goods.price*production_goods.qty) AS hpp');

		$this->db->join('production','production_goods.idproduction = production.idproduction','LEFT');
		$this->db->join('receipt','production.idreceipt = receipt.idreceipt','LEFT');
		$this->db->join('po','production.idPo = po.idPo','LEFT');
		$this->db->join('receipt_goods','receipt_goods.idgoods = production_goods.idgoods','LEFT');
		$this->db->where(array('production.active' => 'Y'));
		$this->db->group_by('production.idproduction ');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function addData($data){
		$this->db->insert('production', $data);
		return $this->db->insert_id();
	}

	public function getOne($id)
	{
		$this->db->select('*');
		$this->db->from('production');
		$this->db->where(array('active' => 'Y', 'idProduction' => $id));
		return $this->db->get()->result_array();
	}

	public function updateData($id, $data){
		$this->db->where('idProduction', $id);
		$this->db->update('production', $data);
		return $this->db->affected_rows();
	}

	public function getRerecipt($idPo){
		$receipt="";
		$this->db->select('po_receipt.idReceipt, receipt.name');
		$this->db->from('po_receipt');
		$this->db->order_by('id','ASC');
		$this->db->join('po','po.idPo = po_receipt.idPo','LEFT');
		$this->db->join('receipt','receipt.idReceipt = po_receipt.idReceipt','LEFT');
		$this->db->where(array('po.idPo' => $idPo, 'po_receipt.active' => 'Y'));
		$result= $this->db->get();

		foreach ($result->result_array() as $data ){
			$receipt.= "<option value='$data[idReceipt]'>$data[name]</option>";
		}

		return $receipt;
	}

	public function updateStockInventory($qty,$idPo,$idReceipt){

		$this->db->select('Sum(( inventory.qty ) - ( receipt_goods.qty * '.$qty.' )) AS qtySisa,
       inventory.idInventory, inventory.idGoods');
		$this->db->from('receipt_goods');
		$this->db->join('inventory','receipt_goods.idgoods = inventory.idgoods','LEFT');
		$this->db->join('receipt','receipt.idreceipt = receipt_goods.idreceipt','LEFT');
		$this->db->join('po_receipt','po_receipt.idreceipt = receipt.idreceipt','LEFT');
		$this->db->group_by('receipt_goods.id');
		$this->db->where(array('receipt.idreceipt' => $idReceipt, 'po_receipt.idpo' => $idPo));
		$result= $this->db->get();

		$resultFinal = 0;

		foreach ($result->result_array() as $data ){
			$qty = $data['qtySisa'];
			$idInventory = $data['idInventory'];
			$data2 = array(
				'qty' => $qty,
			);
			$resultFinal = $this->updateStock($data2,$idInventory);
		}

		if($resultFinal > 0){
			return true;
		}else{
			false;
		}
	}

	public function updateStock($data2,$idInventory){
		$this->db->where('idInventory', $idInventory);
		$this->db->update('inventory', $data2);

		return $this->db->affected_rows();
	}

	public function insertProductionGoods($idPo, $idReceipt, $qty, $idProduction){

		$this->db->select('receipt_goods.idGoods, (receipt_goods.qty*'.$qty.') AS qty, receipt_goods.unit, shop_goods.price');
		$this->db->from('receipt_goods');
		$this->db->join('receipt','receipt.idreceipt = receipt_goods.idreceipt','LEFT');
		$this->db->join('goods','receipt_goods.idGoods = goods.idGoods','LEFT');
		$this->db->join('po_receipt','receipt.idreceipt = po_receipt.idreceipt','LEFT');
		$this->db->join('po','po.idpo = po_receipt.idpo','LEFT');
		$this->db->join('shopping','shopping.idpo = po.idpo','LEFT');
		$this->db->join('shop_goods','shop_goods.idGoods = receipt_goods.idGoods','LEFT');
		$this->db->where(array('po.idPo' => $idPo, 'po_receipt.idReceipt' => $idReceipt));
		$this->db->group_by('shop_goods.id');
		$result= $this->db->get();

		$resultFinal = 0;

		foreach ($result->result_array() as $data ){
			$idGoods = $data['idGoods'];
			$qtyQuery = $data['qty'];
			$unit = $data['unit'];
			$price = $data['price'];

			$data2 = array(
				'idGoods' => $idGoods,
				'qty' => $qtyQuery,
				'unit' => $unit,
				'price' => $price,
				'idProduction' => $idProduction,
				'createdBy' => $this->session->userdata('idUser'),
				'active' => 'Y',
			);
			$resultFinal = $this->insertDataProductionGoods($data2);
		}

		if($resultFinal > 0){
			return true;
		}else{
			return false;
		}
	}

	public function insertDataProductionGoods($data){
		$this->db->insert('production_goods', $data);
		return $this->db->affected_rows();
	}


}
