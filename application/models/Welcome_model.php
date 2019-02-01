<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	function AddLocation($data= array()){
		$this->db->insert('location',$data);
		return true;
	}


	function Lastlocation(){
		$this->db->select('*');
		$this->db->limit(1,0);
		$this->db->order_by('id','DESC');
		$res = $this->db->get('location')->result_array();
		return $res;
	}
}
