<?php
include('hci_dbcon.php'); 
session_start();    
?>
<!----------------------CSS--------------------------->
<style>
    
body{
  margin:0px !important;
  position: relative !important;
  padding:0px!important;
     background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    
      
} 
  
.navbar-inverse {
  background-color:#F8F9FA	!important;
  border:none!important;    
  border-bottom: 1px solid #ddd !important;   
  width:100%;
  border-radius: 0 !important;
 padding-right:20px;    
    margin-bottom:0px!important;
    padding-bottom:0px !important
     
}
.a-1{
  color:black!important;
  font-size: 15px;
}

.dropdown-menu {
  min-width:50% !important;
} 
    .navbar-nav{
        width:100%
    }
    .nav-item{
        float:right !important;
    }
    .cf-index{
        padding:0px !important;
        margin-bottom:0px !important; 
    }
.navbar-inverse .navbar-nav > .open > a,
.navbar-inverse .navbar-nav > .open > a:hover,
.navbar-inverse .navbar-nav > .open > a:focus {
  color: #fff;
  background-color: white !important;
}   
    .logo1{
        width:110px;
        height:70px;
        margin-bottom:-5px !important;
        margin-top:-5px !important
    }
        .logo2{
        width:110px;
        height:30px;
        margin-bottom:-5px !important;
        margin-top:15px
            
    }

</style>    
<!----------------------HTML--------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">    
  <link href="https://fonts.googleapis.com/css?family=Caveat|Knewave" rel="stylesheet">    
</head>
<body>  
<div class="container-fluid cf-index">
    <nav class="navbar navbar-inverse">
        
    <ul class="nav navbar-nav">   

    <?php
    if(!empty($_SESSION['username'])==NULL) { 
      echo '<li class="nav-item">
      <a class="a-1" style="margin-top:5px" id="myLink" href="hci_login.php">Login</a></li>';
        }
        elseif($_SESSION["username"] != NULL && $_SESSION["type"] == "student" ){
         echo '<li class="dropdown nav-item" style="margin-top:5px"><a class="dropdown-toggle a-1" style="text-transform:capitalize" data-toggle="dropdown" href="#">Hey '.$_SESSION["username"]. '<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a class="a-1" href="hci_profile.php">My Profile</a></li>
          <li><a class="a-1" href="hci_logout.php">Logout</a></li>
        </ul>
        </li>';   
        }
        elseif($_SESSION["username"] != NULL && $_SESSION["type"] == "admin" ){
         echo '<li class="dropdown nav-item" style="margin-top:5px"><a class="dropdown-toggle a-1" data-toggle="dropdown" style="text-transform:capitalize" href="#">Hey '.$_SESSION["username"]. '<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a class="a-1" href="hci_manageEvent.php">Manage Event</a></li>
          <li><a class="a-1" href="hci_logout.php">Logout</a></li>
        </ul>
        </li>';   
        }
        ?> 
        <li class="nav-item"><a class="a-1" href="hci_homepage.php" style="margin-top:5px">Home</a></li>
        <div style="float:left">
        <li class="nav-item"><img class="logo1" src="images/logo.png"></li>
        </div>
    </ul>
    </nav>
</div>
    
</body>
</html>
<!----------------------JS--------------------------->
<script>   
</script> 
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="bootstrap  /dist/js/bootstrap.min.js"></script> 
