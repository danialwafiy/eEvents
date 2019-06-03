<!----------------------PHP--------------------------->
<?php
include('hci_index.php');

$username="";
$password="";

if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    
    $result=mysqli_query($con,"SELECT * from hci_users where username='$username' and password='$password'");
    $row = mysqli_fetch_array($result);
    $num=mysqli_num_rows($result);
    if($num!=0){
            $_SESSION["username"]=$username;
            $_SESSION["type"]=$row["type"];
            echo "<script type='text/javascript'>alert('Login Successful');
            window.location='hci_homepage.php';
            </script>";
    }
    else
    { 
                echo "<script type='text/javascript'>alert('Wrong username or password.');
            </script>";
    }
}
?>
<!----------------------CSS--------------------------->
<style>
.contact-form{
    background: #fff;
    margin-top: 5%;
    margin-bottom: 5%;
    width: 50%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    background-color:#0075FF;
}
.contact-form .btnContact {
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

.btnContact:hover {
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
</style>
<!----------------------HTML--------------------------->
<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post" style="text-align:center;" >
                <h3>Login</h3>
               <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Enter A Username " value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Enter A Password " value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btnContact" value="Login" />
                        </div>
                    </div>
                </div>
            </form>
                       <p style="float:right">Don't have an account yet? <a href="hci_registerUser.php">Register Here</a></p>

</div>