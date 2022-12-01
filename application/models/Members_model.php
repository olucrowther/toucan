<?php

class Members_model extends CI_Model {

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

	public function getSchools(){
		
		$this->db->select('school_name, id');

		$this->db->from('schools');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function addMember($name, $email){

		$this->name = $name;

		$this->email_address = $email;
		
		$this->date_added = date('Y-m-d H:i:s');

		$this->db->insert('members_tbl', $this);

		return $this->db->insert_id();

	}

	public function ifUserExists($email){

		$this->db->from('members_tbl');

		$this->db->where('email_address', $email);

		return $this->db->count_all_results();

	}

	public function getMembersDetails(){

		$this->db->select('a.name, a.email_address, GROUP_CONCAT(b.school) AS school');

		$this->db->from('members_tbl as a');

		$this->db->join('school_attended as b', 'a.id = b.student', 'LEFT OUTER');

		$this->db->group_by('a.id');

		$query = $this->db->get();

		return $query->result_array();

	}
	public function getSchoolDetails(){

		$this->db->select('a.id, a.school_name, count(student) as no_of_students, GROUP_CONCAT(c.name) AS name');

		$this->db->from('schools as a');

		$this->db->join('school_attended as b', 'a.id = b.school', 'LEFT');

		$this->db->join('members_tbl as c', 'c.id = b.student', 'LEFT');

		$this->db->group_by('school_name');

		$query = $this->db->get();

		return $query->result_array();

	}

	public function getSchool($id){

		$this->db->select('school_name');

		$this->db->from('schools');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->row_array();

		return $result['school_name'];

	}
	public function getAllSchools($id){

		$this->db->select('school_name');

		$this->db->from('schools');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->row_array();

		return $result['school_name'];

	}

	public function insertSchool($school, $id){

		$inserts = array('student' => $id, 'school' => $school);

		return $this->db->insert('school_attended', $inserts);
	}

	public function getCountries(){

		$this->db->select('country');

		$this->db->from('schools');

		$query = $this->db->get();

		return $query->result_array();

	}

	public function getSchoolDetailByCountry($s_data){

		$this->db->select('a.id, a.school_name, count(student) as no_of_students, GROUP_CONCAT(c.name) AS name');

		$this->db->from('schools as a');
		
		if($s_data['country'])
			$this->db->where('country', $s_data['country']);

		$this->db->join('school_attended as b', 'a.id = b.school', 'LEFT');

		$this->db->join('members_tbl as c', 'c.id = b.student', 'LEFT');

		$this->db->group_by('school_name');

		$query = $this->db->get();

		return $query->result_array();

	}
}
