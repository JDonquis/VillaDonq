<?php 

require_once "./model/Login_model.php";


class Login_controller{

	private $login;

	function __construct()
	{	
		$this->login=new Login_users();
	}

	

	public function verify($u,$p)
	{

		
		$n=$this->login->verify_user($u,$p);
		
			if($n[0]!=0){
					
					session_start();

					$_SESSION['username']=$u;
					$_SESSION['password']=$p;
					$_SESSION['id']=$n[0];
					$_SESSION['id_position']=$n[1];

					header("location:./views/workspace.php");
					exit();

			}
			else{			

				header("location:./views/login.php");
				exit();
			}
	
	}

	public function type_user($id)
	{
		$type=$this->login->search_type($id);

		return $type==0?false:$type;

	}


}


 ?>