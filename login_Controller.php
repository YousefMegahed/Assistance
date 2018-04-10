<?php     

if($_POST)
{
	if(isset($_POST['log']) And $_POST['log']=='Login')
	{
		$email = $_POST['username'];
		$pass = $_POST['password'];
        

        try{
        include 'model/login.php';
		$log = new Login($email,$pass);
		if($log == true)
		{
			session_start();
			$_SESSION['username']=$email;
            $link = mysqli_connect("localhost", "root", "", "web");
            $query = "SELECT `email` FROM `profile_info` WHERE email = '".$_SESSION['username']."'";
            $conc = mysqli_query($link,$query);
            $row = mysqli_fetch_row($conc);
            if( $row > 0)
            {
			     header('Location:index.php'); 
            } else {
                 header('Location:info.php');
            }
		}
	}
	catch(Exception $exc)
     {
	echo $exc->getMessage();
      }

	}


	if(isset($_POST['regi']) And $_POST['regi'] == 'Sign up now !')
	{
       $firstname=$_POST['fname'];
       $lastname=$_POST['lname'];
       $email=$_POST['email'];
       $typereg=$_POST['reg_as'];
       $gender=$_POST['reg_ass'];
       $password=$_POST['password'];
       $password1=$_POST['password1'];

        try{

        include 'model/register.php';
		$log = new register($firstname,$lastname, $email,$typereg,$gender,$password,$password1);
	}
	catch(Exception $exc)
     {
	echo $exc->getMessage();
      }
	}
}






?>