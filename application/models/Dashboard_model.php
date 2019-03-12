<?php
/**
 * Created by PhpStorm.
 * User: debam
 * Date: 03/04/18
 * Time: 13.55
 */

class Dashboard_model extends CI_Model
{

    var $table = 'login'; //nama tabel dari database
    var $column_search = array('username','level'); //field yang diizin untuk pencarian
    var $order = array('idLogin' => 'DESC'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

//	public function login($username, $password)
//	{
//		$login =  $this->db->query("CALL login('" . $username . "','" . $password . "','" . random_string() . "')")->result_array();
//		return $login;
//	}

//    public function login($username, $password)
//    {
//        $this->db->select('*');
//        $this->db->from('login');
//        $this->db->where(array('username' => $username, 'password' => $password, 'active' => 'Y'));
//        $login = $this->db->get()->result_array();
//
//        return $login;
//    }
//
//    // Start Form datatables
//    // Get Data and Search
//    private function _get_datatables_query()
//    {
//
//        $this->db->from($this->table);
//
//        $i = 0;
//
//        foreach ($this->column_search as $item) // looping awal
//        {
//            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
//            {
//
//                if($i===0) // looping awal
//                {
//                    $this->db->group_start();
//                    $this->db->like($item, $_POST['search']['value']);
//                }
//                else
//                {
//                    $this->db->or_like($item, $_POST['search']['value']);
//                }
//
//                if(count($this->column_search) - 1 == $i)
//                    $this->db->group_end();
//            }
//            $i++;
//        }
//
//        if(isset($_POST['order']))
//        {
//            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
//        }
//        else if(isset($this->order))
//        {
//            $order = $this->order;
//            $this->db->order_by(key($order), $order[key($order)]);
//        }
//    }
//
//    function get_datatables()
//    {
//        $this->_get_datatables_query();
//        if($_POST['length'] != -1)
//            $this->db->limit($_POST['length'], $_POST['start']);
//        $this->db->where('active', 'Y');
//        $query = $this->db->get();
//        return $query->result();
//    }
//
//    function count_filtered()
//    {
//        $this->_get_datatables_query();
//        $this->db->where('active', 'Y');
//        $query = $this->db->get();
//        return $query->num_rows();
//    }
//
//    public function count_all()
//    {
//        $this->db->from($this->table);
//        return $this->db->count_all_results();
//    }
//
//
//    //End for Data tables
//
//    //insert data
//    public function saveData($data)
//    {
//        $this->db->insert('tbl_user',$data);
//
//        return $this->db->affected_rows();
//    }
//
//    //getOneData
//    public function getOne($id)
//    {
//        return $result = $this->db->get_where('tbl_user', array('id_user' => $id))->result_array();
//    }
//
//    //update
//    public function updateData($id,$data){
//        $this->db->where('id_user', $id);
//        $this->db->update('tbl_user', $data);
//        return $this->db->affected_rows();
//    }
//
//    // delete change flag
//    public function deleteData($id,$data){
//        $this->db->where('id_user', $id);
//        $this->db->update('tbl_user', $data);
//        return $this->db->affected_rows();
//    }
}
