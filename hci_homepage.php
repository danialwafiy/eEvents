<!----------------------PHP--------------------------->
<?php 
include 'hci_index.php';
?>
<!---------------------CSS--------------------------->
<style>
    .con-caro{
        margin-top:0px !important;
        padding:0px !important;
    }
.gallery-title
{   
    color: #ffffff; 
    font-family: 'Raleway',sans-serif; 
    font-size: 40px; 
    font-weight: 800; 
    line-height: 72px; 
    margin: 0 0 24px; 
    text-align: center; 
    text-transform: uppercase;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #00C4FE;
    border-radius: 5px;
    text-align: center;
    color: #343CB5;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #00C4FE;
    border-radius: 5px;
    text-align: center;
    color: #343CB5;
    background-color: #00C4FE;

}
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
    margin-left:0px;
}
    .container-1{
        width:90%;
        margin-left:5%;
        margin-right:5%;
        text-align: center !important;

}
    .img1{
        height:200;
        width:330px
    }
    .img-carousel{
        width:100% !important;
        height:500px !important;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
        
    }   
    .p1{
        color: white; 
        font-family: 'Raleway',sans-serif; 
        font-size: 20px; 
        font-weight: 100;
        font-style: italic;
        text-align: center;
        text-transform: capitalize;
        background-color:black;
        width:50%;
        margin-left:25%;
        margin-right:25%;
    }
    
</style>
<!----------------------HTML--------------------------->
<link href="https://fonts.googleapis.com/css?family=Caveat|Knewave" rel="stylesheet"> 
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
            
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="images/8.jpg" alt="Chicago" class="img-carousel">                
            </div>
            <div class="item">
              <img src="images/7.jpg" alt="Chania" class="img-carousel">                                
            </div>
            <div class="item">
              <img src="images/9.jpg" alt="New York" class="img-carousel">
            </div>
          </div>
        </div> 
        <br><br><br>
        <div class="container-1">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">EXPLORE EVENTS IN UTHM!</h1>
        </div>

        <div align="center">
            <button class="btn btn-default filter-button" data-filter="all">All</button>
            <button class="btn btn-default filter-button" data-filter="Exhibition">Exhibition</button>
            <button class="btn btn-default filter-button" data-filter="Festival">Festival</button>
            <button class="btn btn-default filter-button" data-filter="Sport">Sports</button>
            <button class="btn btn-default filter-button" data-filter="Talk">Talk</button>
            
        </div>
        <br/>
            <div class="container" style="height:800">
             <?php               
                $query = "SELECT * from hci_events";
                $result = mysqli_query($con,$query);
                if($result){
                while($row = mysqli_fetch_array($result)){
                    echo ' <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter '.$row["category"].'">
                        <div class="row">
                        <a href="hci_event.php?id='.$row["id"].'"><img src="events/'.$row["image"].'" class="img-responsive img-thumbnail img1"></a>
                        </div>
                        <div class="row">
                        <p class="p1">' . $row["name"] . '</p>
                        </div>
                    </div>';
                    }
                }
            ?></div>
            <!-- <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div> -->
        </div>
    </div>
<!----------------------JS--------------------------->
<script>
    $('.carousel').carousel({
    pause: "false"
});
$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('9000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('9000');
            $('.filter').filter('.'+value).show('9000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");
$('.dropdown-toggle').dropdown()
    
});
</script>
