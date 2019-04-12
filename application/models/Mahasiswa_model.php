<?php
/**
 * Created by PhpStorm.
 * User: xcode
 * Date: 03/08/18
 * Time: 13.55
 */

class Mahasiswa_model extends CI_Model
{

	var $table = 'mahasiswa'; //nama tabel dari database
	var $column_search = array('nrp'); //field yang diizin untuk pencarian
	var $order = array('idMahasiswa' => 'DESC'); // default order

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
		$this->db->where(array('active' => 'Y'));
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$this->db->where(array('active' => 'Y'));
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	//insert code here !
	public function addData($data)
	{
		$this->db->insert('mahasiswa', $data);
		return $this->db->affected_rows();
	}
	public function updateData($idMahasiswa, $data)
	{
		$this->db->where('idMahasiswa', $idMahasiswa);
		$this->db->update('mahasiswa', $data);
		return $this->db->affected_rows();
	}
	public function getOne($idMahasiswa)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where(array('idMahasiswa' => $idMahasiswa));

		return $this->db->get()->result_array();
	}
}
