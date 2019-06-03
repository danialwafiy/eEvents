<?php
$con=mysqli_connect("localhost","root","","hciDB");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id']; 

$result=mysqli_query($con,"DELETE FROM hci_events WHERE id='$id'");
if($result){
    echo "<script type='text/javascript'>alert('Event Removed!');
            window.location='hci_manageEvent.php';
            </script>";
}
else
    {
       echo("Error description: " . mysqli_error($con));   
    }
?> 