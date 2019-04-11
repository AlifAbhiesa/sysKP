<?php
/**
 * Created by PhpStorm.
 * User: xcode
 * Date: 03/08/18
 * Time: 13.55
 */

class Login_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where(array('username' => $username, 'password' => $password, 'active' => 'Y'));
		$login = $this->db->get()->result_array();
		//$login = $this->db->query("select * from m_access where uName = '$username' and uPass = '$password'")->result_array();
		return $login;
	}
}
