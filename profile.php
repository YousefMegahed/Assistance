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
    <title>Assistance - Profile.</title>
    <meta charset="UTF-8">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
    <link rel="stylesheet" type="text/css" href="css/style3.css"/>
    <link rel="stylesheet" href="css/font/css/font-awesome.min.css"/>
    <style>
        .w3-center,.cabtalize
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
    
    
    <!-- POST -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        function commentSubmit(){
            if(form1.comments.value == ''){ //exit if one of the field is blank
                alert('You should write something first before post.');
                return;
            }
            var name = form1.name.value;
            var comments = form1.comments.value;
            var xmlhttp = new XMLHttpRequest(); //http request instance

            xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
                if(xmlhttp.readyState==4&&xmlhttp.status==200){
                    document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
                }
            }
            xmlhttp.open('GET', 'insert.php?comments='+comments, true); //open and send http request
            xmlhttp.send();
        }

            $(document).ready(function(e) {
                $.ajaxSetup({cache:false});
                setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
            });
    </script>
    <!-- End of post -->
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

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;margin-bottom:235px;">
    
    <!-- Left Column -->
    <div class="w3-col m3">
        <!-- Profile info -->
        <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container">
                <h4 class="w3-center">                        
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "web");
                        $query = "SELECT firstname,lastname FROM users WHERE email = '".$_SESSION['username']."'";
                        $conc = mysqli_query($link,$query);

                        while ($row = mysqli_fetch_array($conc)) {
                            $fullname = $row['firstname'] . " " .$row['lastname'];
                            echo "$fullname";
                        }
                     ?> 
                </h4>
                <hr/>
                <center>
                    <img src="images/avatar3.png" width="200px" height="200px"/>
                </center>
                <hr/>
                <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "web");
                        $query = "SELECT * FROM users WHERE email = '".$_SESSION['username']."'";
                        $conc = mysqli_query($link,$query);

                        while ($row = mysqli_fetch_array($conc)) {
                            $reg_type = $row['reg_type'];
                            echo "$reg_type";
                        }
                    ?>   
                </p>
                <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> 
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "web");
                        $query = "SELECT * FROM profile_info WHERE email = '".$_SESSION['username']."'";
                        $conc = mysqli_query($link,$query);

                        while ($row = mysqli_fetch_array($conc)) {
                            $loc = $row['location'];
                            echo "$loc";
                        }
                    ?> 
                </p>
                <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "web");
                        $query = "SELECT * FROM profile_info WHERE email = '".$_SESSION['username']."'";
                        $conc = mysqli_query($link,$query);

                        while ($row = mysqli_fetch_array($conc)) {
                            $dob = $row['dob'];
                            echo "$dob";
                        }
                    ?> 
                </p>
            </div>
        </div>

        <br/>

        <!-- Interests --> 
        <div class="w3-card-2 w3-round w3-white w3-hide-small">
            <div class="w3-container">
                <h4>Interests</h4>
                <hr/>
                <p>
                    <span class="w3-tag w3-small w3-theme-d5">Computer science</span>
                    <span class="w3-tag w3-small w3-theme-d4">Graphics</span>
                    <span class="w3-tag w3-small w3-theme-d3">Coding</span>
                    <span class="w3-tag w3-small w3-theme-d2">Java</span>
                    <span class="w3-tag w3-small w3-theme-d1">C#</span>
                    <span class="w3-tag w3-small w3-theme-l1">C++</span>
                </p>
            </div>
        </div>

        <br/>
    </div>
    <!-- End Left Column -->

    <!-- Middle Column -->
    <div class="w3-col m7">
        <div class="w3-row-padding">
            <div class="w3-col m12">
                <div class="w3-card-2 w3-round w3-white">
                    <div class="w3-container w3-padding">
                          <h6 class="w3-opacity">Assistance - Application where pepole can find and help each other within it.</h6>
                          <form name="form1">
                              <textarea name="comments" placeholder="What's in your mind?" cols="90" rows="4"></textarea>
                              <br/>
                              <a href="" onClick="commentSubmit()" class="button"><button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button></a>
                              <!--<button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button>--> 
                          </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Post appears here-->
        <div id="comment_logs">
            <center><p class="w3-opacity">Loading posts...</p></center>
        </div>
    </div>
    <!-- End Middle Column -->

    <!-- Right Column -->
    <div class="w3-col m2">
        <div class="w3-card-2 w3-round w3-white w3-center">
            <div class="w3-container">
                <h4>Location</h4>
                <hr/>
                <div id="map" style="width:200px;height:200px;background:yellow"></div>
                
                <script>
                    function myMap() {
                    var mapOptions = {
                    center: new google.maps.LatLng(51.5, -0.12),
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.HYBRID
                    }
                    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
                <br/>
            </div>
        </div>

        <br/>

        <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
            <p>Advertising</p>
        </div>
        
        <br/>
        
        <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
            <p>Advertising</p>
        </div>
    </div>
    <!-- End Right Column -->

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