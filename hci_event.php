<!----------------PHP---------------------------->
<?php 
include 'hci_index.php';
error_reporting(0);
$name=$_SESSION['username'];
$id = (isset($_GET['id']) ? $_GET['id'] : 0); 
$result = mysqli_query($con,"SELECT * from hci_events where id='$id'");
$row = mysqli_fetch_array($result);
$starttime=$row["starttime"];
$stime = date('h:i A', strtotime($starttime));
$endtime=$row["endtime"];
$etime = date('h:i A', strtotime($endtime));



$result2 = mysqli_query($con,"SELECT * from hci_attend where user_id='$name' and event_id='$id'");
$num=mysqli_num_rows($result2);

$attendid=0;
if(isset($_POST['submit'])){
    $currentseat=$row["seats"];
    $latestseat=$currentseat-1;
    $attendid=uniqid();
    $eventname=$row["name"];
    
    $query="INSERT into hci_attend (attend_id,event_id,user_id,event_name) values ('$attendid','$id','$name','$eventname');";
    $query.="UPDATE hci_events SET seats='$latestseat' where id='$id'";
    $result1=mysqli_multi_query($con,$query);
    
    echo "<script type='text/javascript'>
        alert('Event Booked! We will notify you through email.');
          window.location='hci_event.php?id=$id';
            </script>";    
}
?>
<!----------------CSS---------------------------->
<!---CAROUSEL REFERENCE= "https://codepen.io/ygoex/pen/meeaGw"---->
<style>

.con-table{
        padding-bottom:100px;
        width:70%;
        margin-left:15%;
        margin-right:15%;
    }

 
  .img5 {
    max-height: 300px;
    margin: auto auto;
    max-width: 100%;
        border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
      margin-left:100px
  }

    .input-display{
        border:none;
    }
    .goingBTN{
        background-color: white;
        border: 2px solid black;
        border-radius: 5%;
        color:black;
        padding:10 10px
    }
    .goingBTN:hover {
        background-color: #3340B7;
        color: white;
    }
    
    .h1-1{
    color: #ffffff; 
    font-family: 'Raleway',sans-serif; 
    font-size: 50px; 
    font-weight: 800; 
    text-align: center; 
    text-transform: uppercase;
    }
    p{
        color: white; 
        font-family: 'Raleway',sans-serif; 
        font-size: 18px; 
        font-weight: 100; 
    }
    .glyphicon {
    font-size: 30px;
    }
    hr{
        color:#F8F9FA;
        background-color: #F8F9FA;
        height: 3px;
        width:350px
    }
    .container-1{
        width:80%;
        margin-left:10%;
        margin-right:10%;
    }
    .h2{
        color: #ffffff; 
    font-family: 'Raleway',sans-serif; 
    font-size: 40px; 
    font-weight: 800; 
    text-align: center; 
    text-transform: uppercase;
    }
    a{
        color:black;
    }
    .nav-tabs > li {
    float:none;
    display:inline-block;
    zoom:1;
}

.nav-tabs {
    text-align:center;
}
    .info{
        font-size:60px;
        color:white;
    }
</style>
<!----------------HTML---------------------------->

<html>
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <body>
        <div class="container-1" style="text-align:center">
            <h1 class="h1-1"><?php echo $row["name"]; ?></h1>
            <p style="font-style:italic"><?php echo $row["tagline"]; ?></p>
        </div>
        <br><br>
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-6">
                <div class="col-md-6" style="text-align:center">
                <img class="img5" src="events/<?php echo $row["image"]; ?>">        
                </div>
                <div class="col-md-6 mx-auto" style="text-align:center;margin-top:-10px">
                    <div class="h2">
                    <div class="glyphicon glyphicon-tag"></div> STATUS : <?php echo $row["status"];?>
                    </div>    
                    <p>Participation fee is RM<?php echo $row["amount"]; ?>.</p>
                    <div class="h2">
                    <div class="glyphicon glyphicon-bed"> </div> SEATS : <?php echo $row["seats"];?>
                    </div> 
                    <p>Current available seats.</p>
                    <hr>
                    <div class="h2">
                    <form method="post"  onsubmit="return confirm('Do you really want to book this event?');">
                    <?php
                        if($num==0 && $name!=NULL && $name!="admin"){
                            echo '<input type="submit" class="goingBTN" name="submit" value="I Am Going">';
                        }
                        elseif($num!=0 && $name!=NULL && $name!="admin"){
                            echo '<input type="submit" class="goingBTN" style="cursor: not-allowed;" name="submit" value="I Am Going" id="myBtn">';
                        }
                        elseif($name=="admin"){
                            echo '<input type="submit" class="goingBTN" style="cursor: not-allowed;" name="submit" value="I Am Going" id="myBtn">';
                        }                        
                        else{
                            echo '<input type="submit" class="goingBTN" style="cursor: not-allowed;" name="submit" value="I Am Going" onclick="loginalert();"';                            
                        }
                    ?>
                    </form>    
                    </div>
                </div>
            </div>
        </div>
        </div>   

<hr style="width:100%; height:0px"><br>
<div class="container" style="text-align:center;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <span><p><?php echo $row["location"];?></p></span><i class="glyphicon glyphicon-home info"><br><span><p style="margin-top:15px; font-weight:700;">UTHM</p></span></i>                   
                </div> 
                <div class="col-md-3">
                    <span><p style="font-weight:700;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date( "d.m.Y" , strtotime ( $row["startdate"]));?></p></span><i class="glyphicon glyphicon-calendar info"><br><span><p style="margin-top:15px; font-weight:700;">🏁 <?php echo date( "d.m.Y" , strtotime ( $row["enddate"]));?></p></span></i>
                </div>
                <div class="col-md-3">
                    <span><p style="font-weight:700;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stime; ?></p></span><i class="glyphicon glyphicon-time info"><br><span><p style="margin-top:15px; font-weight:700;">🏁 <?php echo $etime;?></p></span></i>
                </div> 
                <div class="col-md-3">
                    <span><p style="font-weight:700;"><?php echo $row["contactname"];?></p></span><i class="glyphicon glyphicon-phone info"><br><span><p style="margin-top:15px; font-weight:700;"><?php echo $row["contactnum"];?></p></span></i>                    
                </div>
            </div>             
        </div>
</div>
<hr style="width:100%; height:0px; margin-bottom:100px">        
        
    </body>
</html>
<!------------------------------JAVASCRIPT ---------------------------->       
<script>
document.getElementById("myBtn").disabled = true;
function loginalert(){
    confirm("Please login first.")
}
function confirmbook(){
    confirm("Do you want to book this event?");
}    

</script>