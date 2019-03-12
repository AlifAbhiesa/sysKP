<?php
/**
 * Created by PhpStorm.
 * User: xcode
 * Date: 03/08/18
 * Time: 13.55
 */

class Goods_model extends CI_Model
{

	var $table = 'goods'; //nama tabel dari database
	var $column_search = array('name','description'); //field yang diizin untuk pencarian
	var $column_order = array('null','name','description','type'); //field yang diizin untuk pencarian
	var $order = array('idGoods' => 'DESC'); // default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

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

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$where = 'active ="Y" AND type = "1" OR type = "2"';
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$this->db->where('active', 'Y');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	public function getAll(){
		$this->db->select('*');
		$this->db->from('goods');
		$this->db->where('active','Y');
		return $this->db->get()->result_array();
	}


	//CRUD function

	public function getOne($id){
		$this->db->select('*');
		$this->db->from('goods');
		$this->db->where(array('active' => 'Y','idGoods' => $id));
		return $this->db->get()->result_array();
	}

	public function saveData($data, $qty, $idProduction, $createdBy, $unit){
		$this->db->insert('goods',$data);
		$id = $this->db->insert_id();
		$this->db->query('call insertInventory('.$id.','.$createdBy.','.$qty.','.$idProduction.',"'.$unit.'")');
		return $this->db->affected_rows();
	}

	public function updateData($id,$data){
		$this->db->where('idGoods', $id);
		$this->db->update('goods', $data);
		return $this->db->affected_rows();
	}

	public function deleteData($id,$data){
		$this->db->where('idGoods', $id);
		$this->db->update('goods', $data);
		return $this->db->affected_rows();
	}

}
