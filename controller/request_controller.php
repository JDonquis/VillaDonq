<?php 


require_once "../model/release_request_model.php";

class Request_controller
{
	
	function __construct()
	{	
	}



	static function get_Requests($status=0)
	{

		$release=new Release_request();

		$request=$release->get_all_request($status);

		return $request;
		
	}
/*
	static function get_one($DNI)
	{
		$release=new Release_request();

		$request=$release->get_one_request($DNI);

		return $request;
	}
	
*/
}


$request=Request_controller::get_Requests(3);



print_r($request);





 ?>