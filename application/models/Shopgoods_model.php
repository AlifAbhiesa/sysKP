<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 23/02/2019
 * Time: 9:31
 */
class Shopgoods_model extends CI_Model
{


	var $table = 'shop_goods'; //nama tabel dari database
	var $column_search = array('name','description'); //field yang diizin untuk pencarian
	var $column_order = array('null','name','description'); //field yang diizin untuk pencarian
	var $order = array('id' => 'DESC'); // default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function getGoods(){
		return $this->db->get('goods')->result_array();
	}

	public function getMarket(){
		return $this->db->get('shopping')->result_array();
	}

	//start of datables
	private function _get_datatables_query()
	{

		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) // looping awal
		{
			if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{

				if($i===0) // looping awal
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if(isset($_POST['order']))
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($idShopping)
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->select('name, description, qty, shop_goods.unit, price, id');
		$this->db->join('shopping', 'shopping.idShopping = shop_goods.idShopping','left');
		$this->db->join('goods', 'goods ON goods.idGoods = shop_goods.idGoods','left');
		$this->db->where(array('shop_goods.active' => 'Y', 'shop_goods.idShopping' => $idShopping));
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($idShopping)
	{
		$this->_get_datatables_query();
		$this->db->select('name, description, qty, shop_goods.unit, price, id');
		$this->db->join('shopping', 'shopping.idShopping = shop_goods.idShopping','left');
		$this->db->join('goods', 'goods ON goods.idGoods = shop_goods.idGoods','left');
		$this->db->where(array('shop_goods.active' => 'Y', 'shop_goods.idShopping' => $idShopping));
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function addData($data, $idGoods, $qty){
		$this->db->insert('shop_goods', $data);
		$this->db->query('call updateStock('.$idGoods.','.$qty.')');
		return $this->db->affected_rows();
	}

	public function getOne($id)
	{
		$this->db->select('*');
		$this->db->from('shop_goods');
		$this->db->where(array('active' => 'Y', 'id' => $id));
		return $this->db->get()->result_array();

	}

	public function updateData($id, $data){
		$this->db->where('id', $id);
		$this->db->update('shop_goods', $data);
		return $this->db->affected_rows();
	}

	public function getGoodsByPO($idPo){

		$receipt="<option > --- pilih --- </option>";
		$this->db->select('goods.idGoods, goods.name');
		$this->db->from('goods');
		$this->db->join('receipt_goods','receipt_goods.idGoods = goods.idGoods','LEFT');
		$this->db->join('receipt','receipt.idReceipt = receipt_goods.idReceipt','LEFT');
		$this->db->join('po_receipt','po_receipt.idReceipt = receipt.idReceipt','LEFT');
		$this->db->join('po','po.idPo = po_receipt.idPo','LEFT');
		$this->db->where(array(
			'po.idPo' => $idPo,
			'goods.active' => 'Y',
			'receipt.active' => 'Y',
			'receipt_goods.active' => 'Y',
			'po.active' => 'Y',
			));
		$result= $this->db->get();

		foreach ($result->result_array() as $data ){
			$receipt.= "<option value='$data[idGoods]'>$data[name]</option>";
		}

		return $receipt;
	}


}
