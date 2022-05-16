<?php 

require_once "../model/release_directive_model.php";



class Directive_controller
{
	
	function __construct()
	{	
	}



	static function get_Directors()
	{

		$release=new Release_directive();

		$directors=$release->get_all_directive();

		return $directors;
	
	}

	static function get_one($id_user)
	{
		$release=new Release_directive();

		$director=$release->get_one_directive($id_user);

		return $director;
	}

}


$directors=Directive_controller::get_Directors();

$directors2=Directive_controller::get_one(5);

print_r($directors);

print_r($directors2);






 ?>