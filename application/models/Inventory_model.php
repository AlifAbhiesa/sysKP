<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 23/02/2019
 * Time: 9:31
 */
class Inventory_model extends CI_Model
{


	var $table = 'inventory'; //nama tabel dari database
	var $column_order = array('null', 'name', 'qty','availability'); //field yang ada di table user
	var $column_search = array('name'); //field yang diizin untuk pencarian
	var $order = array('idInventory' => 'DESC'); // default order

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
		$this->db->select('goods.name, inventory.idInventory, inventory.qty, inventory.unit, inventory.availability');
		$this->db->join('goods','goods.idGoods = inventory.idGoods','LEFT');
		$where = "inventory.active = 'Y' AND goods.type = '1' OR goods.type = '3'";
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$this->db->select('goods.name, inventory.idInventory, inventory.qty, inventory.unit, inventory.availability');
		$this->db->join('goods','goods.idGoods = inventory.idGoods','LEFT');
		$where = "inventory.active = 'Y' AND goods.type = '1' OR goods.type = '3'";
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('inventory');
		$this->db->where('active','Y');
		return $this->db->get()->result_array();

	}

	public function addData($data){
		$this->db->insert('inventory', $data);
		return $this->db->affected_rows();
	}

	public function getOne($id)
	{
		$this->db->select('*');
		$this->db->from('inventory');
		$this->db->where(array('active' => 'Y', 'idInventory' => $id));
		return $this->db->get()->result_array();

	}

	public function updateData($id, $data){
		$this->db->where('idInventory', $id);
		$this->db->update('inventory', $data);
		return $this->db->affected_rows();
	}


}
