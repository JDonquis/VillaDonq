<?php 

class Login_users
{	
	

	private $db;
		
	function __construct()
	{
		require_once "../model/Database.php";
		$this->db=Database::Connect();
		
	}

	public function verify_user($user,$password){

			try{

			$sql="SELECT id,id_position,DNI,email,password FROM user WHERE DNI=:user OR email=:user and password=:password";


			$username=htmlentities(addslashes($user));
			$password=htmlentities(addslashes($password));

			$result=$this->db->prepare($sql);

			$result->bindValue(":user",$username);
			$result->bindValue(":password",$password);

			$result->execute();

			$nregistros=$result->rowCount();

			if($nregistros==0)
			{	
				$result->closeCursor();
				$result=null;
				return 0;
			}
			else{

				$data=array(0,0);
				$row=$result->fetch(PDO::FETCH_ASSOC);
				$data[0]=$row['id'];
				$data[1]=$row['id_position'];
				$result->closeCursor();
				$result=null;
				return $data;
			}


			}catch(Exception $e){

				die("Error: ".$e->getMessage());
			}

	}

	}


 ?>