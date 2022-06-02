<?php 
require_once "request_model.php";

class Release_request
{	
	
	protected $db;
		
	function __construct()
	{
		require_once "database.php";
		$this->db=Database::Connect();
		
	}

	/*Recive a parameter: 
	0 -> all request, dont matter status request
	1 -> all request accepted
	2 -> all request rejected 
	3 -> all request no checks 
	*/
	function get_all_request($m)
	{	
		$requests=array();
		$c=0;

		switch ($m) {
			case 0:
				$sql="SELECT * FROM request ORDER BY id DESC";
				break;
			case 1:
			
			$sql="SELECT * FROM request WHERE id_status=1 ORDER BY id DESC";

			break;

			case 2:

			$sql="SELECT * FROM request WHERE id_status=2 ORDER BY id DESC";

			break;

			case 3:

			$sql="SELECT * FROM request WHERE id_status=3 ORDER BY id DESC";

			break;		
			
			default:
				$sql="SELECT * FROM request ORDER BY id DESC";
				break;
		}
		

		$result=$this->db->prepare($sql);
		$result->execute(array());

		while ($row=$result->fetch(PDO::FETCH_ASSOC))
		{
			$request=new Request();

			$request->set_id($row['id']);
			$request->set_id_status($row['id_status']);
			$request->set_name($row['name']);
			$request->set_last_name($row['last_name']);
			$request->set_phone($row['phone_number']);
			$request->set_email($row['email']);
			$request->set_DNI($row['DNI']);
			$request->set_address($row['address']);
			$request->set_age($row['age']);
			$request->set_date_birth($row['date_birth']);
			$request->set_birth_certificate($row['birth_certificate']);
			$request->set_report_card($row['report_card']);
			$request->set_certified_notes($row['certified_notes']);
			$request->set_certificate_conduct($row['certificate_conduct']);
			$request->set_photo($row['photo']);
			$request->set_representative_name($row['representative_name']);
			$request->set_representative_phone_number($row['representative_phone_number']);


			$requests[$c]=$request;
			$c++;

		}
		return $requests;
	}


	function insert_requests(Request $request)
	{
		/*Por ahora evitar los campos, estado, ciudad , codigo postal*/

		// INSERT INTO `request` (`id`, `id_status`, `name`, `last_name`, `DNI`, `age`, `date_birth`, `email`, `phone_number`, `birth_certificate`, `report_card`, `certified_notes`, `certificate_conduct`, `photo`, `address`, `representative_name`, `representative_DNI`, `representative_phone_number`) VALUES (NULL, '3', 'Don Quijote', 'De la mancha', '123456', '12', '2022-05-09', 'donquijote@gmail.com', '1234564', 'foto1', 'foto2', 'foto3', 'foto4', 'foto5', 'en algun lugar de la mancha', 'Juan Vicente Gomez', '654897213', '123455'); 

		$sql="INSERT INTO request (id, id_status, name, last_name, DNI, age, date_birth, email, phone_number, birth_certificate, report_card, certified_notes, certificate_conduct, photo, address, representative_name, representative_DNI, representative_phone_number) VALUES (NULL, '3', :name, :last_name,:DNI,:age,:date_birth,:email,:phone_number,:birth_certificate,:report_card,:certified_notes,:certificate_conduct,:photo,:address, :representative_name,:representative_DNI,:representative_phone_number)";

		 $result=$this->db->prepare($sql);

		$result->execute(array(

			":name"=>$request->get_name(),":last_name"=>$request->get_last_name(),":DNI"=>$request->get_DNI(),
			":age"=>$request->get_age(),":date_birth"=>$request->get_date_birth(),":email"=>$request->get_email(),
			":phone_number"=>$request->get_phone(),":birth_certificate"=>$request->get_birth_certificate(),":report_card"=>$request->get_report_card(),
			":certified_notes"=>$request->get_certified_notes(),":certificate_conduct"=>$request->get_certificate_conduct(),":photo"=>$request->get_photo(),
			":address"=>$request->get_address(),":representative_name"=>$request->get_representative_name(),":representative_DNI"=>$request->get_representative_DNI(),
			":representative_phone_number"=>$request->get_representative_phone_number()  ) );

		if ($result->rowCount()!=0)
            return 1;  
        
        else{
            return 2;
        }

	}
	

	function get_id($p)
	{
		if($p=="LAST")
		{
			$sql="SELECT MAX(id) as id FROM request";
			
		}
		else if($p=="FIRST")
		{
			$sql="SELECT MIN(id) as id FROM request";
		}

			$result=$this->db->prepare($sql);
			$result->execute(array());

			$row=$result->fetch(PDO::FETCH_ASSOC);

			return $row["id"];

	}

	/*	function get_one_request($id_user)
	{	
		$persona=new Personal();
		$c=0;

		$sql="SELECT personal.id,personal.id_user,user.DNI,user.name,user.last_name,user.email,user.password,user.phone,user.photo,user.date_birth FROM personal INNER JOIN user ON personal.id_user = user.id WHERE user.id=".$id_user;

		$result=$this->db->prepare($sql);
		$result->execute();

		$row=$result->fetch(PDO::FETCH_ASSOC);
		
			
			$persona->set_id($row['id']);
			$persona->set_id_user($row['id_user']);
			$persona->set_DNI($row['DNI']);
			$persona->set_name($row['name']);
			$persona->set_last_name($row['last_name']);
			$persona->set_email($row['email']);
			$persona->set_password($row['password']);
			$persona->set_phone($row['phone']);
			$persona->set_date_birth($row['date_birth']);
			$persona->set_photo($row['photo']);

		
		return $persona;
	}

	*/


	/*function get_allcategories()
	{
		$categories=array();
		$count=0;
		$sql="SELECT name FROM category";

		$result=$this->db->prepare($sql);
		$result->execute(array());

		while ($row=$result->fetch(PDO::FETCH_ASSOC))
		{	
			$categories[$count]=$row["name"];
			$count++;
			

		}
		return $categories;


	}

	
*/
}



 ?>