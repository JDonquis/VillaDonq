<?php 

class Request
{
	private $id;
	private $id_status;
	private $name;
	private $last_name;
	private $phone;
	private $email;
	private $DNI;
	private $address;
	private $age;
	private $date_birth;
	private $birth_certificate;
	private $report_card;
	private $certified_notes;
	private $certificate_conduct;
	private $photo;
	private $city;
	private $state;
	private $representative_DNI;
	private $representative_name;
	private $representative_phone_number;

	function __construct()
	{
	}



	/*---------------------------------------------------------Setters---------------------------------------------------*/
	
		function set_id($p)
		{
			$this->id=$p;
		}

		function set_id_status($p)
		{
			$this->id_status=$p;
		}
		
		function set_name($p)
		{
			$this->name=$p;
		}

		function set_last_name($p)
		{
			$this->last_name=$p;
		}

		function set_phone($p)
		{
			$this->phone=$p;
		}

		function set_email($p)
		{
			$this->email=$p;
		}

		function set_DNI($p)
		{
			$this->DNI=$p;
		}
	
	
		function set_address($p)
		{
			$this->address=$p;
		}
	
		function set_age($p)
		{
			$this->age=$p;
		}
	
		function set_date_birth($p)
		{
			$this->date_birth=$p;
		}
		function set_photo($p)
		{
			$this->photo=$p;
		}


		function set_birth_certificate($p)
		{
			$this->birth_certificate=$p;
		}


		function set_report_card($p)
		{
			$this->report_card=$p;
		}


		function set_certified_notes($p)
		{
			$this->certified_notes=$p;
		}


		function set_certificate_conduct($p)
		{
			$this->certificate_conduct=$p;
		}

		function set_city($p)
		{
			$this->city=$p;
		}

		function set_state($p)
		{
			$this->state=$p;
		}

		function set_representative_DNI($p)
		{
			$this->representative_DNI=$p;
		}

		function set_representative_name($p)
		{
			$this->representative_name=$p;
		}


		function set_representative_phone_number($p)
		{
			$this->representative_phone_number=$p;
		}

		/*---------------------------------------------------------Getters---------------------------------------------------*/

		
		function get_id()
		{
			return $this->id;
		}

		function get_id_status()
		{
			return $this->id_status;
		}
		
			function get_name()
		{
			return $this->name;
		}

		function get_last_name()
		{
			return $this->last_name;
		}

		function get_phone()
		{
			return $this->phone;
		}

		function get_email()
		{
			return $this->email;
		}

		function get_DNI()
		{
			return $this->DNI;
		}
	
	
		function get_address()
		{
			return $this->address;
		}
	
		function get_age()
		{
			return $this->age;
		}
	
		function get_date_birth()
		{
			return $this->date_birth;
		}
		function get_photo()
		{
			return $this->photo;
		}


		function get_birth_certificate()
		{
			return $this->birth_certificate;
		}


		function get_report_card()
		{
			return $this->report_card;
		}


		function get_certified_notes()
		{
			return $this->certified_notes;
		}


		function get_certificate_conduct()
		{
			return $this->certificate_conduct;
		}

		function get_city()
		{
			return $this->city;
		}

		function get_state()
		{
			return $this->state;
		}

		function get_representative_DNI()
		{
			return $this->representative_DNI;
		}



		function get_representative_name()
		{
			return $this->representative_name;
		}


		function get_representative_phone_number()
		{
			return $this->representative_phone_number;
		}

		function get_status()
		{	
			$status="";

			if ($this->id_status==1)
			{	
				$status="Aceptado";
				return $status;	
			}
			else if($this->id_status==2)
			{
				$status="Rechazado";
				return $status;		
			}

			else if($this->id_status==3)
			{
				$status="Sin revisar";
				return $status;		
			}
			
		}
		
	

}



 ?>