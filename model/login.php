<?php 
class login {

private $email;
private $password;
private $exn;

function __construct($email,$password)
{
	//set data
   
  $this->setdata($email,$password);

	// connect db 
  $this->concdata();

	// get data
  $this->getdata();
}

  private function setdata($email,$password)
  {
  	$this->email=$email;
  	$this->password=$password;
  }
 private function concdata()
 {
  include 'model/DataBase.php';
   $inc = './includes/inc.php';
   $this->exn = new DataBase($inc);
 } 

  function getdata()
 {
 	$link = mysqli_connect("localhost", "root", "", "web");
 	$query = "SELECT * FROM `users` WHERE `email` ='$this->email' AND `pass`='$this->password'";
    
 	$conc = mysqli_query($link,$query);
 	if(mysqli_num_rows($conc) > 0)
 	{
 		return true ;
 	}
 	else
 	{
 		throw new Exception("username or password is invalid, pleas try again");
 		
 	}
 }

 function close()
 {
 	$this->exn->close();
 }

}










?>