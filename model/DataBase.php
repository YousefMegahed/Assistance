<?php


class DataBase{
	private $host;
	private $user;
	private $pass;
	private $database;

	function __construct($filename)
	{

    if(is_file($filename) ) include $filename;
    else throw new Exception("Something went wrong.");


    $this->host=$host;
    $this->user=$user;
    $this->pass=$pass;
    $this->database=$database;
    $this->connect();
    
	}
	//connect the server
	private function connect()
	{
		if(!mysqli_connect($this->host,$this->user,$this->pass,$this->database))
		{
			throw new Exception("Error Processing Request not connected.");
		}
		
			
	}

	function close()
	{
		mysql_close();
	}
}
		


?>