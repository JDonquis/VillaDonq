<?php 

class Teacher_course
{
	$id_matter;
	$id_course;
	$id_section;

	funtion __construct(){}

	// ---------------------------------------------------- SETTERS -----------------------------------------------

	function set_id_matter($id){ $this->id_matter = $id; }

	function set_id_course($id){ $this->id_course = $id; }

	function set_id_section($id){ $this->id_section = $id; }

// ---------------------------------------------------- GETTERS -----------------------------------------------

	function get_id_matter(){ return $this->id_matter; }

	function get_id_course(){ return $this->id_course; }

	function get_id_section(){ return $this->id_section; }	

}


 ?>