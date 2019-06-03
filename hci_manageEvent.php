<?php 
include 'hci_index.php';
?>
<style>

.button-add {
    width: 15%;
    border: none;
    border-radius: 1rem;
    padding: 1%;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    background-color:#06B6F7;
}

.button-add:hover {
    background-color: #3048BB;
    color: white;
} 
    h2{
    color: white;
    font-family: 'Raleway',sans-serif; 
    font-size: 40px; 
    font-weight: 800; 
    text-align: center; 
    text-transform: uppercase;
    }
    
</style>
<div class="container">
<div class="row">
   <div class="col-md-12">
    <h2>Manage Event</h2>
       <br>
       <div class="container" style="text-align:center">
       <button class="button-add" onclick="location.href = 'add_event.php';">Add Event</button>
        </div>   
       <br><br>
      <div class="table-responsive">
        <table id="mytable" style="width:100%; color:black;" class="table table-bordred table-striped"> 
           <thead>
               <th>Event Name</th>
               <th>Start Date</th>
               <th>Organizer</th>
               <th>Contact Number</th>
               <th>Edit</th>
               <th>Delete</th>
            </thead>
            <tbody>
            <?php               
                $query = "SELECT * from hci_events";
                $result = mysqli_query($con,$query);
                if($result){
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['startdate'] . "</td>";
                    echo "<td>" . $row['organizer'] . "</td>";
                    echo "<td>" . $row['contactnum'] . "</td>";
                    echo "<td><a href=\"edit_event.php?id=".$row['id']."\"><span style='font-size:20px;color:#00FF00' class='glyphicon glyphicon-pencil'></span></a></td>";
                    echo "<td><a onclick=\"return confirm('Do you really want to REMOVE this event?')\" href=\"delete_event.php?id=".$row['id']."\"><span style='font-size:20px;color:red' class='glyphicon glyphicon-trash'></span></a></td>";
                    echo "</tr>";
                    }
                }
            ?>    
            </tbody>        
        </table>    
    </div>         
  </div>
</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>

<script>
$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable inp ut[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});

</script>