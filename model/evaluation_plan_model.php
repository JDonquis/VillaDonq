<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/release_activity_model.php";

class Evaluation_plan
{	
	private $id;
	private $id_teacher;
	private $name_teacher;
	private $id_lapse;
	private $activities;
	private $a; 
	
	function __construct()
	{
		$this->a = new Release_activity;
		$this->activities = array();
	}

// -------------------------------------------------------------SETTERS-----------------------------------------------------
	
	function set_id($id){ $this->id = $id; }

	function set_id_teacher($id){ $this->id_teacher= $id; }

	function set_id_lapse($id){ $this->id_lapse = $id; }

	function set_name_teacher($n,$a){ $this->name_teacher = $n." ".$a; }

	function set_activities($id_plan){ $this->activities = $this->a->get_activities($id_plan); }


// -------------------------------------------------------------GETTERS-----------------------------------------------------

	function get_id(){ return $this->id; }

	function get_id_teacher(){ return $this->id_teacher; }

	function get_id_lapse(){ return $this->id_lapse; }

	function get_activities(){ return $this->activities; }

}



 ?>