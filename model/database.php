<?php 

require_once "../../config.php";

class Database
{
	private static $connection;

	public static function Connect()
	{

		try 
		{
			self::$connection=new PDO('mysql:host='.HOST.';dbname='.DB_NAME.''.';charset=UTF8',USER,PASSWORD);
			self::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			self::$connection->exec("SET CHARACTER SET utf8");

		} catch (Exception $e) {
			
			echo "Error: ".$e->getMessage();
		}
		
		return self::$connection;
	}

	public static function Desconnect()
	{	
		self::$connection=null;

		return self::$connection; 
	}

}




 ?>