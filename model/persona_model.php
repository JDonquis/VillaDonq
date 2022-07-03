<?php 


class Persona 
{
	protected $id;
	protected $id_user;
	protected $DNI;
	protected $name;
	protected $last_name;
	protected $email;
	protected $password;
	protected $phone;
	protected $date_birth;
	protected $photo;

	function __construct()
	{
	}



	/*---------------------------------------------------------Setters---------------------------------------------------*/

		function set_id($p)
		{
			$this->id=$p;
		}
		function set_id_user($p)
		{
			$this->id_user=$p;
		}
		function set_DNI($p)
		{
			$this->DNI=$p;
		}
		function set_name($p)
		{
			$this->name=$p;
		}
		function set_last_name($p)
		{
			$this->last_name=$p;
		}
		
		function set_email($p)
		{
			$this->email=$p;
		}
		function set_password($p)
		{
			$this->password=$p;
		}
		function set_phone($p)
		{
			$this->phone=$p;
		}
		function set_date_birth($p)
		{
			$this->date_birth=$p;
		}
		function set_photo($p)
		{
			$this->photo=$p;
		}


		

		/*---------------------------------------------------------Getters---------------------------------------------------*/

		function get_id()
		{
			return $this->id;
		}
		function get_id_user()
		{
			return $this->id_user;
		}
		function get_DNI()
		{
			return $this->DNI;
		}
		function get_name()
		{
			return $this->name;
		}
		function get_last_name()
		{
			return $this->last_name;
		}
		function get_email()
		{
			return $this->email;
		}
		function get_password()
		{
			return $this->password;
		}
		function get_phone()
		{
			return $this->phone;
		}
		function get_date_birth()
		{
			return $this->date_birth;
		}
		function get_photo()
		{
			return $this->photo;
		}
}


 ?>