<?php
session_start();
require("db/db.php");
$result = mysqli_query($con, "SELECT * FROM comments WHERE email = '".$_SESSION['username']."' order by date_publish desc");
$result2 = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_SESSION['username']."'");

while($row2=mysqli_fetch_array($result2)){
    $fullname = $row2['firstname'] . " " .$row2['lastname'];
}
while($row=mysqli_fetch_array($result)){
 echo "<div class='w3-container w3-card-2 w3-white w3-round w3-margin'>";
 echo "<span class='w3-right w3-opacity'>". $row['date_publish'] ."</span><br/>";
 echo "<a class='w3-right w3-opacity' href='delete.php?id=" . $row['id'] . "'><img title='Delete post' src='images/delete.png' style='width:30px;height:30px;'/></a>";
 echo "<h4 class='cabtalize'>". $fullname ."</h4><hr/>";
 echo "<p>" . $row['comments'] . "</p>";
 echo "<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i>  Like</button> ";
 echo "<button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>  Comment</button>";
 echo "</div>";
}
mysqli_close($con);

?>