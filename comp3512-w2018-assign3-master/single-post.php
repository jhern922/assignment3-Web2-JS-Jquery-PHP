<?php
    include 'classes/postFavorite.class.php';
    //session_start();
    include 'includes/config.inc.php';
    $postsDB = new PostsGateway($connection);
    if(!isset($_COOKIE['Success'])) { header("location: login.php"); } 
    else if(!isset($_GET['id']) || empty($_GET['id']))
    {
      header('Location:error.php');
    }
    else if((isset($_GET['id']) && !empty($_GET['id'])) && !$postsDB->IDExists($_GET['id']))
    {
       header('Location:error.php?error=invalidID'); 
    }
    else
    {
       $row = $postsDB->findByID($_GET['id']);
        session_start();
       if(!isset($_SESSION['postFavList'])){
           $_SESSION['postFavList'] = array();
       }
       if(isset($_GET['favorite']) && !empty($_GET['favorite']) && $_GET['favorite'] == 1)
       {
           array_push($_SESSION['postFavList'], array('ID'=>$_GET['id'],'Title'=>$row['Title'],'Path'=>$row['Path']));
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $row['Title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    
    <link rel="stylesheet" href="css/myown.css"/>
    <link href="carousel.css" rel="stylesheet">
    <script src="functions.js" type="text/javascript"></script>
</head>

<body>
    <?php include 'includes/header.inc.php'; ?>
    <?php $results = $postsDB->getRelatedPostImages($_GET['id']); ?>
    <!-- Page Content -->
    <main class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <h1><?php echo $row['Title'];?></h1>
                       <!-- Carousel  -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php $picsRelatedCount = sizeOf($results) + 1; 
        for($i=1;$i<$picsRelatedCount;$i++){?>
        <li data-target="#myCarousel" data-slide-to=<?php echo $i; ?>></li>
        <?php } ?>
      </ol>
      
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src='images/medium/<?php echo $row['Path']; ?>' alt=<?php echo $row['Title']; ?> class='imagecl4'>
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $row['MainImageTitle']; ?></h1>
              <p><a class="btn btn-sm btn-primary" role="button" href="single-image.php?id=<?php echo $row['MainPostImage']; ?>">Learn More</a></p>
            </div>
          </div>
        </div>
        
        <?php foreach ($results AS $pic) { ?>
        <div class="item">
          <img src='images/medium/<?php echo $pic['Path']; ?>' alt=<?php echo $pic['Title']; ?> class='imagecl4'>
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $pic['Title']; ?></h1>
              <p><a class="btn btn-sm btn-primary" role="button" href="single-image.php?id=<?php echo $pic['ImageID']; ?>">Learn More</a></p>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- Carousel end -->
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                  <div class="btn-group" role="group">
                              <a href="single-post.php?id=<?php echo $_GET['id'];?>&favorite=1"><button type='button' id='favItem' class='btn btn-default'><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button></a>
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
            <!-- div alerts start -->
    <div class="alert alert-success collapse" role="alert" id="successAlert">
         Image has been added to favorites! Click <a href="favorites-list.php" class="alert-link">here</a> to see your favorites!
    </div>
    <div class="alert alert-danger collapse" role="alert" id="failureAlert">
          This feature has not been added yet... 
    </div>
     <!-- div alerts end -->
                    <h6>Posted by: <a href="single-user.php?id=<?php echo $row['UserID'];?>"><?php echo $row['FullName'];?></a></h6>
                    <h6><?php echo date("M d, Y", strtotime($row['PostTime']));?></h6>
                    <p class="excerpt"><?php echo $row['Message'];?></p> 
                </div>  <!-- end row -->
            </div><!-- end main content area -->
            </div>
        </div>
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>

    </footer>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/comp3512-w2018-assign1-master/anim.js" type="text/javascript"></script>
</body>

</html>