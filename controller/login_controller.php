<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/login_model.php";
require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/routes/routes.php";

class Login_controller{

	private $login;

	function __construct()
	{	
		$this->login = new Login_users();
	}

	

	public function verify($u,$p)
	{

		
		$n = $this->login->verify_user($u,$p);
		
			if($n[0] != 0){
					
					session_start();

					$_SESSION['username'] = $u;
					$_SESSION['password'] = $p;
					$_SESSION['id'] = $n[0];
					$_SESSION['id_position'] = $n[1];

					header("location:".WORKSPACE_INDEX);
					exit();

			}
			else{			
 
				header("location:".URL_VIEWS."login.php?try=1");
				exit();
			}
	
	}

	// public function type_user($id)
	// {
	// 	$type=$this->login->search_type($id);

	// 	return $type==0?false:$type;

	// }


}



	if(isset($_POST['username']) and isset($_POST['password']))
	{
		
		$login = new Login_controller();
		$login->verify($_POST['username'], $_POST['password']);
	}



	

 ?>