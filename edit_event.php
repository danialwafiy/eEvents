<!----------------------PHP--------------------------->
<?php
include 'hci_index.php';
$id= $_GET["id"];
$query = "SELECT * from hci_events WHERE id = '$id'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);


if(isset($_POST['submit'])){
    
    $id="";
    $category="";
    $name="";
    $description="";
    $tagline="";
    $location="";
    $organizer="";
    $contactname="";
    $contactnum="";
    $status="";
    $amount="";
    $sdate="";
    $edate="";
    $stime="";
    $etime="";
    
    $id=mysqli_real_escape_string($con,$_POST['id']);
    $category=mysqli_real_escape_string($con,$_POST['category']);
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $description=mysqli_real_escape_string($con,$_POST['description']);
    $tagline=mysqli_real_escape_string($con,$_POST['tagline']);
    $location=mysqli_real_escape_string($con,$_POST['location']);
    $organizer=mysqli_real_escape_string($con,$_POST['organizer']);
    $contactname=mysqli_real_escape_string($con,$_POST['contactname']);
    $contactnum=mysqli_real_escape_string($con,$_POST['contactnum']);
    $status=mysqli_real_escape_string($con,$_POST['status']);
    $amount=mysqli_real_escape_string($con,$_POST['amount']);
    $sdate=mysqli_real_escape_string($con,$_POST['sdate']);
    $edate=mysqli_real_escape_string($con,$_POST['edate']);
    $stime=mysqli_real_escape_string($con,$_POST['stime']);
    $etime=mysqli_real_escape_string($con,$_POST['etime']);

    $image = $_FILES['image']['name'];
    
 	$image_target = "events/".basename($image);
    
    $result=mysqli_query($con,"UPDATE hci_events SET id='$id',category='$category',name='$name',description='$description',tagline='$tagline',location='$location',organizer='$organizer',contactname='$contactname',contactnum='$contactnum',status='$status',amount='$amount',startdate='$sdate',enddate='$edate',starttime='$stime',endtime='$etime' where id='$id'");
        
    if($result){
        move_uploaded_file($_FILES['image']['tmp_name'], $image_target);
        echo "<script type='text/javascript'>alert('Event Updated');
            window.location='hci_manageEvent.php';
            </script>";
    }
    else
    {
       echo("Error description: " . mysqli_error($con));
    }
}
?>
<!------ Include the above in your HEAD tag ---------->
<style>
.addBTN {
    width: 40%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    background-color:#0075FF;
    float:right;
}

.addBTN:hover {
    background-color: #3048BB;
    color: white;
}
    .h1-title{
         color: white;
    font-family: 'Raleway',sans-serif; 
    font-size: 40px; 
    font-weight: 800; 
    text-align: center; 
    text-transform: uppercase;
    padding-bottom:20px;
    }
</style>
<div class="container">
        <h1 class="h1-title"> Edit Event &nbsp&nbsp<a style="color:white" href="hci_manageEvent.php"><i class="glyphicon glyphicon-share"></i></a></h1>
    <form class="well form-horizontal" method="post" enctype="multipart/form-data">
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Event ID</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span><input id="fullName" name="id" class="form-control" required="true" value="<?php echo $row["id"]; ?>" type="text"></div>
                            </div>
                         </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">Event Category</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-th"></i></span>
                                  <select class="selectpicker form-control" name="category" value="<?php echo $row["category"]; ?>">
                                     <option value="Exhibition">Exhibition</option>
                                     <option value="Festival">Festival</option>
                                     <option value="Sport">Sport</option> 
                                     <option value="Talk Show">Talk Show</option>  
                                  </select>
                               </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Event Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span><input id="addressLine2" name="name" class="form-control" required="true" value="<?php echo $row["name"]; ?>" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Event Description</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><textarea cols="40" rows="5" name="description"><?php echo $row["description"]; ?></textarea></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Event Tagline</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-text-width"></i></span><input id="state" name="tagline" placeholder="" class="form-control" required="true" value="<?php echo $row["tagline"]; ?>" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Event Location</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="postcode" name="location" placeholder="" class="form-control" required="true" value="<?php echo $row["location"]; ?>" type="text"></div>
                            </div>
                         </div>
                        
                         <div class="form-group">
                            <label class="col-md-4 control-label">Event Organizer</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span><input id="email" name="organizer" placeholder="" class="form-control" required="true" value="<?php echo $row["organizer"]; ?>" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Contact Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="phoneNumber" name="contactname" placeholder="" class="form-control" required="true" value="<?php echo $row["contactname"]; ?>" type="text"></div>
                            </div>
                         </div>
                      </fieldset>
                </td>
                <td colspan="1">
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Contact Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="fullName" name="contactnum" placeholder="" class="form-control" required="true" value="<?php echo $row["contactnum"]; ?>" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-flag"></i></span>
                                  <select class="selectpicker form-control" name="status" value="<?php echo $row["status"]; ?>">
                                     <option value="Pay">Pay</option>
                                     <option value="Free">Free</option>
                                  </select>
                               </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Amount</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span><input id="addressLine2" name="amount" placeholder="" class="form-control" required="true" value="<?php echo $row["amount"]; ?>" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Start Date</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="city" name="sdate" placeholder="" class="form-control" required="true" value="<?php echo $row["startdate"]; ?>" type="date"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">End Date</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="state" name="edate" placeholder="" class="form-control" required="true" value="<?php echo $row["enddate"]; ?>" type="date"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Start Time</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span><input id="postcode" name="stime" placeholder="" class="form-control" required="true" value="<?php echo $row["starttime"]; ?>" type="time"></div>
                            </div>
                         </div>
                        
                         <div class="form-group">
                            <label class="col-md-4 control-label">End Time</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span><input id="email" name="etime" placeholder="" class="form-control" required="true" value="<?php echo $row["endtime"]; ?>" type="time"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Image</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><input type="file" name="image">
                                </div>
                            </div>
                         </div>
                      </fieldset>
                      <br> 
                      <input type="submit" name="submit" class="addBTN" value="EDIT" />
                  
                </td>
             </tr>
          </tbody>
       </table> </form>
    </div>