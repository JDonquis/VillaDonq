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

	function get_one_request($id)
	{	
		$sql="SELECT * FROM request WHERE id=".$id;
		
		$result=$this->db->prepare($sql);
		$result->execute(array());

		$row=$result->fetch(PDO::FETCH_ASSOC);
		
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
		$request->set_representative_DNI($row['representative_DNI']);
		
		
		return $request;
	}

	function insert_requests(Request $request)
	{
		/*Por ahora evitar los campos, estado, ciudad , codigo postal*/

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

	function accept_request($request)
	{

		// INSERT INTO `user` (`id`, `id_position`, `DNI`, `name`, `last_name`, `email`, `password`, `phone`, `photo`, `date_birth`) VALUES (NULL, '4', '124556', 'juanito', 'sanchez', 'juancho070902@gmail.com', '23435', '012453', 'photo', '2022-06-13');

		$sql="INSERT INTO user  (id, id_position, DNI, name, last_name, email, password, phone, photo, date_birth,address) VALUES (NULL, '4', :DNI, :name,:last_name,:email,:password,:phone,:photo,:date_birth,:address)";

		$result=$this->db->prepare($sql);

		$result->execute(array(

			":DNI"=>$request->get_DNI(),":name"=>$request->get_name(),":last_name"=>$request->get_last_name(),":email"=>$request->get_email()
		   ,"password"=>$request->get_DNI(),":date_birth"=>$request->get_date_birth(),":phone"=>$request->get_phone(),":photo"=>$request->get_photo(),":address"=>$request->get_address() ) );

		if ($result->rowCount()!=0)
		{	

			/*I have try to quit triggers on table user and do a insert*/

			$id=$this->db->lastInsertId();

			$sql2=" INSERT INTO student (id,id_user,id_course,representative_name,representative_DNI,representative_phone_number) VALUES (NULL,:id,'1',:rep_name,:rep_DNI,:rep_phone)";

			$result=$this->db->prepare($sql2);

			$result->execute(array(

				":rep_name"=>$request->get_representative_name(), ":rep_phone"=>$request->get_representative_phone_number()
				,":rep_DNI"=>$request->get_representative_DNI(),":id"=>$id ) );
			
			if($result->rowCount()!=0)
			{
				$id2=$this->db->lastInsertId();

				$sql3="INSERT INTO document_s (id, id_student, birt_certificate, certified_notes, certificate_conduct, report_card) VALUES (NULL, :id, :birth_certificate, :certified_notes, :certificate_conduct, :report_card)";

				$result=$this->db->prepare($sql3);

				$result->execute(array(

				":id"=>$id2, ":birth_certificate"=>$request->get_birth_certificate(),":certified_notes"=>$request->get_certified_notes()
				,":certificate_conduct"=>$request->get_certificate_conduct(),":report_card"=>$request->get_report_card() ) );

				if ($result->rowCount()!=0)
				{
					$request->set_id_status(1);

					$sql="UPDATE `request` SET `id_status` = '1' WHERE `request`.`id` = :id ";
					$result=$this->db->prepare($sql);
					$result->execute(array(":id"=>$request->get_id() ) ); 

					if ($result->rowCount()!=0)
						return 1;
					else{ return 2; }
				}	
				
				else{ return 2; }	
				
			}
			else{ return 2; }

		}
            
        
        else{ return 2; }
	}

	function rejected_request($request)
	{
		
		$sql="UPDATE `request` SET `id_status`=2 WHERE `request`.`id`= :id";

		$result=$this->db->prepare($sql);
		$result->execute(array(":id"=>$request->get_id() ) ); 

		return $result->rowCount()!=0? 1 : 2;		
	}
		

	
}



 ?>