<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/manager_model.php";

class Release_manager
{	

	protected $db;
	
		
	function __construct()
	{
		require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/database.php";
		$this->db=Database::Connect();

	
		
	}

	
	function get_all_manager()
	{	
		$managers=array();
		$c=0;

		$sql="SELECT manager.id,manager.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM manager INNER JOIN user ON manager.id_user = user.id WHERE user.id_position=3";

		$result=$this->db->prepare($sql);
		$result->execute(array());

		while ($row=$result->fetch(PDO::FETCH_ASSOC))
		{
			$manager=new Manager();

			$manager->set_id($row['id']);
			$manager->set_id_user($row['id_user']);
			$manager->set_DNI($row['DNI']);
			$manager->set_name($row['name']);
			$manager->set_last_name($row['last_name']);
			$manager->set_email($row['email']);
			$manager->set_password($row['password']);
			$manager->set_phone($row['phone']);
			$manager->set_date_birth($row['date_birth']);
			$manager->set_photo($row['photo']);

			$managers[$c]=$manager;
			$c++;

		}
		
		

		return $managers;
	}

	function get_one_manager($id_user)
	{	
		$manager=new Manager();
		$c=0;

		$sql="SELECT manager.id,manager.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM manager INNER JOIN user ON manager.id_user = user.id WHERE user.id_position=3 and user.id=".$id_user;

		$result=$this->db->prepare($sql);
		$result->execute();

		$row=$result->fetch(PDO::FETCH_ASSOC);
		
					
			$manager->set_id($row['id']);
			$manager->set_id_user($row['id_user']);
			$manager->set_DNI($row['DNI']);
			$manager->set_name($row['name']);
			$manager->set_last_name($row['last_name']);
			$manager->set_email($row['email']);
			$manager->set_password($row['password']);
			$manager->set_phone($row['phone']);
			$manager->set_date_birth($row['date_birth']);
			$manager->set_photo($row['photo']);

		
		return $manager;
	}

	



}



 ?>