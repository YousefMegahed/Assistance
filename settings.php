<?php
session_start();
if(!isset($_SESSION['username']))
{
	include 'login__.php';
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Assistance - Account settings.</title>
    <meta charset="UTF-8">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
    <link rel="stylesheet" type="text/css" href="css/style3.css"/>
    <link rel="stylesheet" href="css/font/css/font-awesome.min.css"/>
    <style>
        .cabtalize
        {
            text-transform: capitalize;
        }
        .bg
        {
            background-color: #e4e4e4;
        }
        .w3-bar .d{
        	float: right;
        }
        html,body,h1,h2,h3,h4,h5 {font-family: sans-serif }
    </style>
    <!-- End of CSS -->
</head>

<body class="bg">

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
        <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Assistance</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
        <a href="profile.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Profile"><i class="fa fa-user"></i></a>
        <a href="<?php echo "logout.php" ?>" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 d">Logout</a>
        <a href="<?php echo "settings.php" ?>" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 d">Account settings</a>
        <a href="<?php echo "contact.php" ?>" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 d">Contact us</a>
    </div>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:95%;margin-top:100px;margin-bottom:229px;">
    
    <div class="m3">
        <!-- Full name -->
        <div class="w3-card-2 w3-round w3-white" style="padding:0.01em 20px;height:480px;">
           <div class="upname" style="font-size:17px;"><br>
                <h2><b>Update Name.</b></h2><br/>
                <form action="" method="post">
                Your current name:
                        <?php
                            $link = mysqli_connect("localhost", "root", "", "web");
                            $query = "SELECT firstname,lastname FROM users WHERE email = '".$_SESSION['username']."'";
                            $conc = mysqli_query($link,$query);

                            while ($row = mysqli_fetch_array($conc)) {
                                $fname = $row['firstname'];
                                $lname = $row['lastname'];
                                echo "<b class='cabtalize'> $fname " . " $lname </b>";
                            }
                        ?>    
                    <hr/>
                    Enter your new first name: <input type="text" name="fname" style="margin-left:50px;" required/>
                    <hr/>
                    Enter your new last name: <input type="text" name="lname" style="margin-left:50px;" required/>
                    <hr/>
                    Enter your password: <input type="password" name="pass" style="margin-left:86px;" required/>
                    <a href="settings.php"><input type='button' value='Cancel' class='w3-button w3-theme' style='float:right;margin-right:15px'/></a>
                    <input type="submit" value="Save Changes" name="update_name" class="w3-button w3-theme" style="float:right;margin-right:15px"/>
                </form>
                <?php
                    if(isset($_POST['update_name'])){
                        $fname = $_POST["fname"];
                        $lname = $_POST["lname"];
                        $pass = $_POST["pass"];
                        
                        $link = mysqli_connect("localhost", "root", "", "web");
                        $query = "UPDATE users SET firstname = '$fname', lastname = '$lname' WHERE email = '".$_SESSION['username']."'";
                        $query2 = "SELECT `pass` FROM `users` WHERE pass = '$pass'";
                        $conc2 = mysqli_query($link,$query2);
                        $row = mysqli_fetch_row($conc2);
                        if( $row > 0)
                        {
                            $conc = mysqli_query($link,$query);
                            if($conc) {
                                header("Refresh: 1.5;");
                                echo("<br/><h4>Your name changed successfully.</h4>");
                            }
                        }
                        else {
                            echo '<script type="text/javascript">alert("You have entered an invalid password, Please try again.");</script>';
                            //echo("<br/><h5>Password is incorrect, Please try again.</h5>");
                        }
                    }
                ?>
           </div>
        </div>
        <!-- End full name -->
        
        <!-- Email -->
        <div class="w3-card-2 w3-round w3-white" style="padding:0.01em 20px;height:480px;margin-top:2%;">
           <div class="upemail" style="font-size:17px;"><br>
                <h2><b>Update E-mail.</b></h2><br/>
                <form action="" method="post">
                    Primary e-mail: <?php echo"<b>".$_SESSION['username']."</b>"?>
                    <hr/>
                    Enter your new e-mail: <input type="text" name="email" style="margin-left:50px;" required/>
                    <hr/>
                    Enter your password: <input type="password" name="pass" style="margin-left:59px;" required/>
                    <a href="settings.php"><input type='button' value='Cancel' class='w3-button w3-theme' style='float:right;margin-right:15px'/></a>
                    <input type="submit" value="Save Changes" name="update_email" class="w3-button w3-theme" style="float:right;margin-right:15px"/>
                </form>
           </div>
            <?php
                if(isset($_POST['update_email'])){
                    $email = $_POST["email"];
                    $pass = $_POST["pass"];
                    
                    $link = mysqli_connect("localhost", "root", "", "web");
                    $query1 = "UPDATE users SET email = '$email' WHERE email = '".$_SESSION['username']."'"; // users
                    $query2 = "UPDATE comments SET email = '$email' WHERE email = '".$_SESSION['username']."'"; // post
                    $query3 = "UPDATE profile_info SET email = '$email' WHERE email = '".$_SESSION['username']."'"; // profile
                    $query4 = "SELECT `pass` FROM `users` WHERE pass = '$pass'"; // pass check
                    
                    $conc1 = mysqli_query($link,$query4);
                    $row = mysqli_fetch_row($conc1);
                    
                    $query5 = "SELECT email FROM `users` WHERE email='$email'"; // email check
                    $accountExists =  mysqli_query($link,$query5);

                    if(mysqli_num_rows($accountExists) != 0) 
                        
                    {
                        echo '<script type="text/javascript">alert("The email you entered is already exists, Please try again.");</script>';
                    } 
                    else 
                    {
                        if( $row > 0)
                        {
                            $users = mysqli_query($link,$query1);
                            $post = mysqli_query($link,$query2);
                            $profile = mysqli_query($link,$query3);
                            
                            if($users || $post || $profile){
                                header('Location:logout.php');
                                echo("<br/><h4>Your e-mail changed successfully.</h4>");
                            }
                            else {
                                echo '<script type="text/javascript">alert("Something went wrong.");</script>';
                            }
                        }
                        else {
                            echo '<script type="text/javascript">alert("You have entered an invalid password, Please try again.");</script>';
                            //echo("<br/><h5>Password is incorrect, Please try again.</h5>");
                        }
                    }
                }
            ?>
        </div>
        <!-- End email -->
        
        <!-- Password -->
        <div class="w3-card-2 w3-round w3-white" style="padding:0.01em 20px;height:480px;margin-top:2%;">
           <div class="uppass" style="font-size:17px;"><br>
                <h2><b>Update Password.</b></h2><br/>
                <form action="" method="post">
                    Old password: <input type="password" name="oldpass" style="margin-left:138px;" required/>
                    <hr/>
                    Enter your new password: <input type="password" name="newpass" style="margin-left:50px;" required/>
                    <hr/>
                    Repeat new password: <input type="password" name="re_newpass" style="margin-left:73px;" required/>
                    <a href="settings.php"><input type='button' value='Cancel' class='w3-button w3-theme' style='float:right;margin-right:15px'/></a>
                    <input type="submit" value="Save Changes" name="update_pass" class="w3-button w3-theme" style="float:right;margin-right:15px"/>
                </form>
           </div>
            <?php
                if(isset($_POST['update_pass'])){
                    $oldpass = $_POST["oldpass"];
                    $newpass = $_POST["newpass"];
                    $repass = $_POST["re_newpass"];
                    
                    $link = mysqli_connect("localhost", "root", "", "web");
                    $query = "UPDATE users SET pass = '$newpass' , re_pass ='$repass' WHERE email = '".$_SESSION['username']."'";
                    $query2 = "SELECT `pass` FROM `users` WHERE pass = '$oldpass'";
                    $conc2 = mysqli_query($link,$query2);
                    $row = mysqli_fetch_row($conc2);
                    if($newpass == $repass)
                    {
                        if( $row > 0)
                        {
                            $conc = mysqli_query($link,$query);
                            if($conc){
                                echo("<br/><h4>Your password changed successfully.</h4>");
                            }
                        }
                        else {
                            echo '<script type="text/javascript">alert("You have entered an invalid old password, Please try again.");</script>';
                            //echo("<br/><h5>Password is incorrect, Please try again.</h5>");
                        }
                    }
                    else {
                        echo '<script type="text/javascript">alert("Your password and confirmation password do not match, Please try again.");</script>';
                        //echo("<br/><b><h5>Password not matched, Please try again.</h5><b>");
                    }
                }
            ?>
        </div>
        <!-- End password -->
        
        <!-- Info -->
        <div class="w3-card-2 w3-round w3-white" style="padding:0.01em 20px;height:480px;margin-top:2%;">
           <div class="upname" style="font-size:17px;"><br>
                <h2><b>Update Profile info.</b></h2><br/>
                <form action="" method="post">
                    Enter your location: <input type="text" name="loc" style="margin-left:71px;" required/>
                    <hr/>
                    Enter your date of birth: <input type="text" name="dob" style="margin-left:40px;" required/>
                    <hr/>
                    Enter your new password: <input type="password" name="pass" style="margin-left:20px;" required/>
                    <a href="settings.php"><input type='button' value='Cancel' class='w3-button w3-theme' style='float:right;margin-right:15px'/></a>
                    <input type="submit" value="Save Changes" name="save_info" class="w3-button w3-theme" style="float:right;margin-right:15px"/>
                </form>
                <?php
                    if(isset($_POST['save_info'])){
                        $loc = $_POST["loc"];
                        $dob = $_POST["dob"];
                        $pass = $_POST["pass"];
                        
                        $link = mysqli_connect("localhost", "root", "", "web");
                        $query = "UPDATE profile_info SET location = '$loc', dob = '$dob' WHERE email = '".$_SESSION['username']."'";
                        $query2 = "SELECT `pass` FROM `users` WHERE pass = '$pass'";
                        $conc2 = mysqli_query($link,$query2);
                        $row = mysqli_fetch_row($conc2);
                        if( $row > 0)
                        {
                            $conc = mysqli_query($link,$query);
                            if($conc) {
                                echo("<br/><h4>Your information changed successfully.</h4>");
                            }
                        }
                        else {
                            echo '<script type="text/javascript">alert("You have entered an invalid password, Please try again.");</script>';
                            //echo("<br/><h5>Password is incorrect, Please try again.</h5>");
                        }
                    }
                ?>
           </div>
        </div>
        <!-- End Info -->
    </div>
<!-- End Page Container -->
</div>
    
<br/>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
    <center>
        <h6>Copyrights &copy; 2017 - 2018 All Rights Reserved.</h6>
    </center>
</footer>

<footer class="w3-container w3-theme-d5">
    <center>
        <p>Powered by Sculptor.</p>
    </center>
</footer>
<!-- End of footer -->
</body>
</html> 