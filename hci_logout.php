<?php
session_start();
session_destroy();
unset($_SESSION['username']);
echo "<script type='text/javascript'>alert('Successfully Logout');
            window.location='hci_homepage.php';
            </script>";
?>