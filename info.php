<?php
session_start();
if(!isset($_SESSION['username']))
{
	include 'login__.php';
	die();
} 
else 
{
    $link = mysqli_connect("localhost", "root", "", "web");
    $query = "SELECT `email` FROM `profile_info` WHERE email = '".$_SESSION['username']."'";
    $conc = mysqli_query($link,$query);
    $row = mysqli_fetch_row($conc);
    if( $row > 0){
        header('Location:index.php'); 
    }
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
        <a href="<?php echo "logout.php" ?>" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 d">Logout</a>
    </div>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:95%;margin-top:100px;margin-bottom:241px;">
    
    <div class="m3">
        <div class="w3-card-2 w3-round w3-white" style="padding:0.01em 20px;height:480px;">
           <div class="upname" style="font-size:17px;"><br>
                <h2><b>Profile information.</b></h2><br/>
                <form action="" method="post">
                    Enter your location: <input type="text" name="loc" style="margin-left:61px;" required/>
                    <hr/>
                    Enter your date of birth: <input type="text" name="dob" style="margin-left:30px;" required/>
                    <hr/>
                    <input type="submit" value="Save Changes" name="save_info" class="w3-button w3-theme" style="float:right;margin-right:15px"/>
                    <p><b>Important notes:</b> You should fill the inputs of your information first before join the website.</p>
                </form>
                <?php
                    if(isset($_POST['save_info'])){
                        $loc = $_POST["loc"];
                        $dob = $_POST["dob"];
                        
                        $link = mysqli_connect("localhost", "root", "", "web");
                        $query = "INSERT INTO `profile_info`(`email`, `location`, `dob`) VALUES ('".$_SESSION['username']."','$loc','$dob')";
                        $conc = mysqli_query($link,$query);
                        if($conc) {
                            header("Location: profile.php");
                        }
                        else {
                            echo '<script type="text/javascript">alert("Something went wrong.");</script>';
                    }
                 }
                ?>
           </div>
        </div>
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