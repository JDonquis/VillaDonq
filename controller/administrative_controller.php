<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/release_administrative_model.php";

class Administrative_controller
{	
		
	function __construct()
	{	
	}

	

	static function get_administratives(){

		$release = new Release_administrative();

		$administratives = $release->get_all_administratives();

		return $administratives;
	
	}

		static function get_one($id_user)
	{
		$release = new Release_administrative();

		$administrative = $release->get_one_administrative($id_user);

		return $administrative;
	}


}


 ?>