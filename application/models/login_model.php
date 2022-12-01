<?php

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	private $_limit;

	private $_pageNumber;

	private $_offset;

	// setter getter functionf

	public function setLimit($limit) {

		$this->_limit = $limit;

	}

	public function setPageNumber($pageNumber) {

		$this->_pageNumber = $pageNumber;

	}

	public function setOffset($offset) {

		$this->_offset = $offset;

	}

    public function login_user($email, $password){

        $this->db->select('*');

        $this->db->from('admin_tbl');

        $this->db->where('email', $email);

        $this->db->where('password', $password);

        $query = $this->db->get();

        return $query->row_array();
    }

}