<?php
    include 'includes/config.inc.php';
    $imagesDB = new ImagesGateway($connection);
    $DBGateway = $imagesDB;
    if(!isset($_COOKIE['Success'])) { header("location: login.php"); } 
    else if(!isset($_GET['id']) || empty($_GET['id']))
    {
      header('Location:error.php');
    }
    else if((isset($_GET['id']) && !empty($_GET['id'])) && !$imagesDB->IDExists($_GET['id']))
    {
       header('Location:error.php?error=invalidID'); 
    }
    else
    {
       $row = $imagesDB->findByID($_GET['id']);
       session_start();
       if(!isset($_SESSION['imageFavList'])){
           $_SESSION['imageFavList'] = array();
       }
       if(isset($_GET['favorite']) && !empty($_GET['favorite']) && $_GET['favorite'] == 1)
       {
           //this will not check whether or not there are duplicate favorites
        array_push($_SESSION['imageFavList'], array('ID'=>$row['ImageID'],'Title'=>$row['Title'],'Path'=>$row['Path']));
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $row['ImageTitle']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    
    <link rel="stylesheet" href="css/myown.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/comp3512-w2018-assign1-master/imgPreview.js" type="text/javascript"></script>
</head>

<body>
    <?php include 'includes/header.inc.php';?>
    <!-- Page Content -->
    <main class="container">
            <!-- div alerts start -->
    <div class="alert alert-success collapse" role="alert" id="successAlert">
         Image has been added to favorites! Click <a href="favorites-list.php" class="alert-link">here</a> to see your favorites!
    </div>
    <div class="alert alert-danger collapse" role="alert" id="failureAlert">
          This feature has not been added yet... 
    </div>
     <!-- div alerts end -->
        <div class="row">
             <?php include 'includes/left.inc.php'; ?>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8">                                                
                        <img class="img-responsive" src="images/medium/<?php echo $row['Path']; ?>" alt=<?php echo $row["Title"];?>> 
                        <p class="description"><?php echo $row["descrip"]; ?></p>
                        <div id="map" class="col-md-4"></div>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLsRJ-w6LkrM_sAcEp8IuGzjxm77Jc9oQ&callback=initMap"></script>
                        <script>
                        var long = parseFloat(<?php echo $row['Longitude']; ?>);
                        var latitude = parseFloat(<?php echo $row['Latitude']; ?>);
                        function initMap() {
                            var uluru = {lat: latitude, lng: long}; 
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 4,
                                center: uluru 
                            });
                            var marker = new google.maps.Marker({
                                position: uluru,
                                map: map
                            });
                        }
                        </script>
                    </div>

                    <div class="col-md-4">                                                
                        <h2><?php echo $row["ImageTitle"]; ?></h2>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <ul class="details-list">
                                    <li>By: <a href="single-user.php?id=<?php echo $row['UserID']; ?>"><?php echo $row['FirstName'].' '.$row['LastName']; ?></a></li>
                                    <li>Country: <a href="single-country.php?id=<?php echo $row['ISO']; ?>"><?php echo $row['CountryName'] ?></a></li>
                                    <li>City: <?php echo $row["AsciiName"]; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                              <a href="single-image.php?id=<?php sleep(5); echo $row['ImageID'];?>&favorite=1"><button type='button' id='favItem' class='btn btn-default'><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button></a>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" id='futureBtn'  class="btn btn-default"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" id='futureBtn' class="btn btn-default"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" id='futureBtn' class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </div>  <!-- end right-info column -->
                </div>  <!-- end row -->
            </div>  <!-- end main content area -->
        </div>
       
    </main>
     <script src="functions.js" type="text/javascript"></script>
    <?php include 'includes/footer.inc.php'; ?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/comp3512-w2018-assign1-master/anim.js" type="text/javascript"></script>
</body>

</html>