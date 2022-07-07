<?php 

class Teacher_course
{
	public $id_matter;
	public $name_matter;
	public $id_course;
	public $name_course;
	public $id_section;

	function __construct(){}

	// ---------------------------------------------------- SETTERS -----------------------------------------------

	function set_id_matter($id){ $this->id_matter = $id; }

	function set_name_matter($n){ $this->name_matter = $n; }

	function set_id_course($id){ $this->id_course = $id; }

	function set_name_course($n){ $this->name_course = $n; }

	function set_id_section($id){ $this->id_section = $id; }

// ---------------------------------------------------- GETTERS -----------------------------------------------

	function get_id_matter(){ return $this->id_matter; }

	function get_name_matter(){ return $this->name_matter; }

	function get_id_course(){ return $this->id_course; }

	function get_name_course(){ return $this->name_course; }

	function get_id_section(){ return $this->id_section; }	

}


 ?>