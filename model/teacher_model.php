<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/persona_model.php";
require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/release_teacher_course_model.php";

class Teacher extends Persona 
{	
	public $work_data;
	public $lessons;

	
	function __construct(){ 

		$this->work_data = new Release_teacher_course();
		$this->lessons = array();
		
	 }

// ----------------------------------------------------------- SETTERS

function set_lessons($id){ $this->lessons = $this->work_data->get_all_one_teacher($id); }

// ----------------------------------------------------------- GETTERS

function get_lessons(){	return $this->lessons; }

}


 ?>

