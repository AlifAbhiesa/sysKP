<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 23/02/2019
 * Time: 9:31
 */
class Shopreference_model extends CI_Model
{


	var $table = 'receipt_goods'; //nama tabel dari database
	var $column_search = array('name'); //field yang diizin untuk pencarian
	var $column_order = array('null','name','null'); //field yang diizin untuk pencarian
	var $order = array('name' => 'DESC'); // default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

    public function getReceipt(){
        return $this->db->get('receipt')->result_array();
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

	function get_datatables($receipt, $qty)
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->select('goods.name, goods.description, (qty*'.$qty.') as qty, receipt_goods.unit');
		$this->db->join('receipt', 'receipt.idReceipt = receipt_goods.idReceipt','left');
		$this->db->join('goods', 'goods.idGoods = receipt_goods.idGoods','left');
		$this->db->where(array('receipt_goods.idReceipt' => $receipt, 'receipt_goods.active' => 'Y'));
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($receipt, $qty)
	{
		$this->_get_datatables_query();
		$this->db->select('goods.name, goods.description, (qty*'.$qty.') as qty, receipt_goods.unit');
		$this->db->join('receipt', 'receipt.idReceipt = receipt_goods.idReceipt','left');
		$this->db->join('goods', 'goods.idGoods = receipt_goods.idGoods','left');
		$this->db->where(array('receipt_goods.idReceipt' => $receipt, 'receipt_goods.active' => 'Y'));
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}




}
