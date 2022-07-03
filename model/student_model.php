<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/persona_model.php";

class Student extends Persona
{
	private $course;

	function __construct()
	{
	}

	/*---------------------------------------------------------Setters---------------------------------------------------*/
	
		function set_course($p) { $this->course=$p; }
		

	/*---------------------------------------------------------Getters---------------------------------------------------*/

		function get_course() {	return $this->course; }
}



 ?>