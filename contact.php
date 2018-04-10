<?php
session_start();
if(!isset($_SESSION['username']))
{
	include 'login__.php';
	die();
}
include('form_process.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Assistance - Contact us.</title>
    <meta charset="UTF-8">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
    <link rel="stylesheet" type="text/css" href="css/style3.css"/>
    <link rel="stylesheet" href="css/font/css/font-awesome.min.css"/>
    <style>
        .bg1 
        {
            background-image: url(images/contactbg.png);
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
        <!-- Contact us -->
        <div class="w3-card-2 w3-round w3-white bg1" style="padding:0.01em 20px;height:680px;">
           <div class="contact" style="font-size:17px;"><br>
                <h2><b>Contact Us.</b></h2><br/>
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    Your name: <input type="text" name="name" style="margin-left:81px;"/>
                    <span class="error"><?= $name_error ?></span>
                    <br/><br/>
                    E-mail: <input type="email" name="email" style="margin-left:114px;"/>
                    <span class="error"><?= $email_error ?></span>
                    <br/><br/>
                    Phone number: <input type="text" name="phone" style="margin-left:50px;"/> 
                    <span class="error"><?= $phone_error ?></span>
                    <br/><br/>
                    Subject: <input type="text" name="subj" style="margin-left:105px;"/>
                    <span class="error"><?= $subj_error ?></span>
                    <br/><br/>
                    Message: <br/> <textarea type="text" name="ques" rows="8" cols="40" style="margin-left:171px;"></textarea>
                    <hr/>
                    <input type="submit" name="send_mail" value="Send" class="w3-button w3-theme" style="margin-left:485px"/>
                </form>
           </div>
        </div>
        <!-- End contact us -->
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