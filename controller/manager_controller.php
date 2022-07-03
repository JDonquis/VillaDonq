<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/release_manager_model.php";

class Manager_controller
{
	
	function __construct()
	{	
	}



	static function get_managers()
	{

		$release = new Release_manager();

		$managers = $release->get_all_manager();

		return $managers;
	
	}

	static function get_one($id_user)
	{
		$release = new Release_manager();

		$manager = $release->get_one_manager($id_user);

		return $manager;
	}

}

 ?>