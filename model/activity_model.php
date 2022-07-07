<?php 


class Activity
{
	private $id;
	private $id_plan;
	private $title;
	private $description;
	private $strategy;
	private $value;

	function __construct()
	{
		
	}

	// ------------------------------------------------------- SETTERS ---------------------------------------------------------

	function set_id($id){ $this->id = $id; }

	function set_id_plan($id){ $this->id_plan = $id; }

	function set_title($t){ $this->title = $t; }

	function set_description($t){ $this->description = $t; }

	function set_strategy($t){ $this->strategy = $t; }

	function set_id_plan($n){ $this->value = $n; }

	// ------------------------------------------------------- GETTERS ---------------------------------------------------------

	function get_id(){ return $this->id; }

	function get_id_plan(){ return $this->id_plan; }

	function get_title(){ return $this->title; }

	function get_description(){ return $this->description; }

	function get_strategy(){ return $this->strategy; }

	function get_id_plan(){ return $this->value; }

}


 ?>