<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 23/02/2019
 * Time: 9:31
 */
class Poinventory_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('po_inventory');
		$this->db->where('active','Y');
		return $this->db->get()->result_array();

	}

	public function addData($data){
		$this->db->insert('po_inventory', $data);
		return $this->db->affected_rows();
	}

	public function getOne($id)
	{
		$this->db->select('*');
		$this->db->from('po_inventory');
		$this->db->where(array('active' => 'Y', 'id' => $id));
		return $this->db->get()->result_array();

	}

	public function updateData($id, $data){
		$this->db->where('id', $id);
		$this->db->update('po_inventory', $data);
		return $this->db->affected_rows();
	}


}
