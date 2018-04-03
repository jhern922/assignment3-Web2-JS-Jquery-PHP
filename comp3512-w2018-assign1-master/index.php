<!DOCTYPE html>
<html lang="en">
<?php if(!isset($_COOKIE['Success'])) { header("location: login.php"); } ?>
<head>
    <meta charset="utf-8">
    <title>Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    
    <link rel="stylesheet" href="css/myown.css"/>
    <link rel="stylesheet" href="css/index.css"/>
</head>

<body>
    <?php include 'includes/header.inc.php';?>
    <!-- Page Content -->
    <main class="container-fluid" id ="addMargin">
        <div class="col-md-2 col-md-offset-1" id="move">
            <img src="/comp3512-w2018-assign1-master/images/userpp2.png" class="img-responsive" id="myown" />
            <br>
            <h5>Select an Option:</h5>
        </div>
        <div class="col-sm-8 " id="marginBottom">
        <div class="item tm1">
            <a href="browse-countries.php"><img src="/comp3512-w2018-assign1-master/images/misc/home_countries.jpg"></a>
            <p>Browse Countries</p>
        </div>
        <div class="item tm2">
            <a href="browse-images.php"><img src="/comp3512-w2018-assign1-master/images/misc/home_images.jpg"></a>
            <p>Browse Images</p>
        </div>
        <div class="item tm3">
            <a href="browse-users.php"><img src="/comp3512-w2018-assign1-master/images/misc/home_users.jpg"></a>
            <p>Browse Users</p>
        </div>
        <div class="item tm4">
            <a href="browse-posts.php"><img src="/comp3512-w2018-assign1-master/images/misc/cathedral.jpeg"></a>
            <p>Browse Posts</p>
        </div>
        <br>
	<span>
	    <div class="item tm5">
	        <a href="aboutus.php"></a><img src="/comp3512-w2018-assign1-master/images/misc/cliff.jpg"></a>
	        <p>About Us</p>
	   </div>
	   <div class="item tm6">
	       <a href="user-profile.php"><img src="/comp3512-w2018-assign1-master/images/misc/tour.jpg"></a>
	       <p>About You</p>
	   </div>
	   <div class="item tm6">
	       <a href="favorites-list.php"><img src="/comp3512-w2018-assign1-master/images/misc/couple.jpg"></a>
	       <p>Favourites</p>
	   </div>
	   <div class="item tm7">
	       <a href="logout.php"><img src="/comp3512-w2018-assign1-master/images/misc/desert.jpg"></a>
	       <p>Log out</p>
	   </div>
<span>
<br>
        </div>
        
    </main>
    <?php include 'includes/footer.inc.php'; ?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/comp3512-w2018-assign1-master/anim.js" type="text/javascript"></script>
</body>

</html>