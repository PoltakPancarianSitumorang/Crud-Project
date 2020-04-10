<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model {

	   public function __construct()
		 {
			$this->load->database();
	 	 }

    function get($table)
     {
      $data = $this->db->get($table);
      return $data->result_array();
     }

     public function check_credential()
     {
       $username = set_value('username');
       $password = set_value('password');
       $hasil = $this->db->where('username', $username)
                   ->where('password', $password)
                   ->limit(1)
                   ->get('users');
       if($hasil->num_rows() > 0){
         return $hasil->row();
       } else {
         return array();
       }
     }

		 function insertdata($table,$data)
		 {
			 $insertdata = $this->db->insert($table, $data);
			 return $insertdata;
		 }

		 function deleteDatausers($table, $id_user)
		 {
			 $this->db->where('id_user', $id_user);
			 $delete = $this->db->delete($table);
			 return $delete;
		 }

		 function editDatausers($table, $data, $id_user)
		{
			$this->db->where('id_user', $id_user);
			$editusers = $this->db->update($table, $data);
			return $editusers;
		}

		function getEditusers($table, $id_user)
		{
			$this->db->where('id_user', $id_user);
			$data = $this->db->get($table);
			return $data->row();
		}

		public function join()
		{
	    $this->db->select('*');
	    $this->db->from('group','users');
	    $this->db->join('users', 'group.id_group = users.group');
	  	$query = $this->db->get(); // Tampilkan semua data tbl_order
			return $query->result_array();
  	}



   }
