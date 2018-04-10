<?php
 

class register {
	//`id`, `firstname`, `lastname`, `email`, `reg_type`, `gender`, `pass`, `re_pass`

	
	private $firstname;
	private $lastname;
	private $email;
	private $reg_type;
	private $gender;
	private $pass;
	private $re_pass;

	private $cxn;


	function __construct($firstname,$lastname,$email,$reg_type,$gender,$pass,$re_pass)
	{
		//set 
         $this->setdata($firstname,$lastname,$email,$reg_type,$gender,$pass,$re_pass);

		//connect
        $this->conect();
       

       //getdata

       $this->getdataa();
	}

	private function setdata($firstname,$lastname,$email,$reg_type,$gender,$pass,$re_pass)
	{
		$this->firstname=$firstname;
		$this->lastname=$lastname;
		$this->email=$email;
		$this->reg_type=$reg_type;
		$this->gender=$gender;
		$this->pass=$pass;
		$this->re_pass=$re_pass;
	}

	private function conect()
	{
       include 'model/DataBase.php';
       $inc = './includes/inc.php';
       $this->cxn = new DataBase($inc);
	}

	function getdataa()
	{
       
		$link = mysqli_connect("localhost", "root", "", "web");

		$query = "INSERT INTO `users`(`id`, `firstname`, `lastname`, `email`, `reg_type`, `gender`, `pass`, `re_pass`) VALUES ('','$this->firstname','$this->lastname','$this->email','$this->reg_type','$this->gender','$this->pass','$this->re_pass')";

		$conc = mysqli_query($link,$query);

         if($conc)
         {
         	echo  "Register succsusfully";
         }
         else throw new Exception("Error Processing  ");
         
	}

	function close()
    {
 	$this->cxn->close();
    }
}
?>