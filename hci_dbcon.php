<!----------------------PHP--------------------------->
<?php
$con=mysqli_connect("localhost","root","","hciDB");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>