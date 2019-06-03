<?php
include("hci_index.php");
$username=$_SESSION['username'];
$result1=mysqli_query($con,"SELECT * from hci_users where username='$username'");
$row1 = mysqli_fetch_array($result1);

$result2=mysqli_query($con,"SELECT * from hci_attend where user_id='$username'");


$editUsername="";
$editPassword="";
$editEmail="";
if(isset($_POST["submit"])){
    $editUsername=$_POST["username"];
    $editPassword=$_POST["password"];
    $editEmail=$_POST["email"];
    
    $result=mysqli_query($con,"UPDATE hci_users SET password='$editPassword', email='$editEmail' WHERE username='$username'");
    if($result){
        echo "<script type='text/javascript'>alert('Profile Updated');
            window.location='hci_profile.php';
            </script>";
    }
}
?>

<style>
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
    height:450px;
}
    .profile-section{
        width:80%;
    }
    h4{
        color: black; 
        font-family: 'Raleway',sans-serif; 
        font-size: 15px; 
        font-weight: 100; 
    }
    
.editBTN {
    width: 40%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    background-color:#0075FF;
}

.editBTN:hover {
    background-color: #3048BB;
    color: white;
}
    h3{
    color: #0062cc;
    font-family: 'Raleway',sans-serif; 
    font-size: 40px; 
    font-weight: 800; 
    text-align: center; 
    text-transform: uppercase;
    }
    
body.modal-open #info{
    -webkit-filter: blur(3px);
    -moz-filter: blur(3px);
    -o-filter: blur(3px);
    -ms-filter: blur(3px);
    filter: blur(15px);
}
  
.modal-backdrop {background: #226CCE;}
.modal-box {
    -webkit-box-shadow:inset 0 0 10px 0 rgba(0,0,0,.1);
    box-shadow:inset 0 0 10px 0 rgba(0,0,0,.1);
    -webkit-border-radius: 30px;
    border-radius: 30px;
    margin-top: 5%;
}
    
</style>


<!------ Include the above in your HEAD tag ---------->
<br><br>
<div class="row" style="width:100%">
    <div class="container" id="info">              
        <div class="col-md-5 emp-profile" style="background-color:white; margin-right:100px; margin-left:60px" > 
                <h3>My Profile</h3>
                  <hr>
                  <div class="container profile-section">    
                  <h4 style="float:left; text-align:left; font-weight:bold;">Username:</h4>  <h4 style="text-align:right"><?php echo $row1["username"]; ?></h4><br>
                  <h4 style="float:left; text-align:left; font-weight:bold;">Password:</h4>  <h4 style="text-align:right"><?php echo $row1["password"]; ?></h4><br>
                  <h4 style="float:left; text-align:left; font-weight:bold;">Email:</h4>  <h4 style="text-align:right"><?php echo $row1["email"]; ?></h4>
                  </div>
                  <hr>        
                <center><br><button class="editBTN" data-toggle="modal" data-target="#myModal">Edit</button></center>
        </div> 
        <div class="col-md-5 emp-profile" style="background-color:white;"> 
                <h3 style="font-size:35px !important">Attending Events</h3><bR>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>View</th>
                    </tr>
                    
                        <?php
                            while($row2 = mysqli_fetch_array($result2)){
                            echo '<tr>';    
                            echo '<td>#</td>';
                            echo '<td>' .$row2['event_name']. '</td>';
                            echo '<td><a href="hci_event.php?id='.$row2["event_id"].'"><span class="badge" style="background-color:#275FC8">View</span></a></td>';
                            echo '</tr>';    
                            }
                            ?>
                </table>
            </bR>
        </div>        
    </div>    
</div>    



<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Edit Profile</h2>
        </div>
        <div class="modal-body">
          <form method="post">
          <b>Username:</b> <input type="text" name="username" class="form-control" placeholder="" value="<?php echo $row1["username"]; ?>"  disabled/>
          <br>      
          <b>Password:</b> <input type="text" name="password" class="form-control" placeholder="" value="<?php echo $row1["password"]; ?>" />
          <br>
          <b>Email:</b> <input type="text" name="email" class="form-control" placeholder="" value="<?php echo $row1["email"]; ?>" />  
         <div class="modal-footer">
         <hr>     
          <input type="submit" class="btn btn-default" name="submit" value="Submit" />
        </div>      
          </form>
        </div>
      </div>
    </div>
  </div>
  
</div>
