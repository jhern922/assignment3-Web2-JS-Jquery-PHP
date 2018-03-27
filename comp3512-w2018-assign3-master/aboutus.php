<!DOCTYPE html>
<html lang="en">
<?php if(!isset($_COOKIE['Success'])) { header("location: login.php"); } ?>
<head>
    <meta charset="utf-8">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    
</head>

<body>

     <?php 
     if(isset($_COOKIE['Success'])) {
              include 'includes/header.inc.php';
     }else {
         include 'includes/header2.inc.php';
     }
     ?>
     
    <!-- Page Content -->
    <main class="container">
        <!-- Start jumbotron -->
        <div class="jumbotron">
              <h1 class="display-3">About Us</h1>
                  <p class="lead">This assignment was created by Lewis Furlan-Lowry and John Hernandez. It was created as the second assignment for COMP 3512.</p>
                      <hr class="my-4">
                        <h3 class="display-3">External Resources used</h3>
                        <div class="panel panel-info">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="https://getbootstrap.com/">Bootstrap</a></li>
                            <li class="list-group-item"><a href="https://github.com/lewis-fl/lfurl515-jhern922-comp3512-assign2">Project on GitHub</a></li>
                            <li class="list-group-item"><a href="https://www.amazon.ca/Fundamentals-Web-Development-Randy-Connolly/dp/0133407152">Fundamentals of Web Development Textbook</a></li>
                        </ul>
                        </div>
                    <hr class="my-4">
                         <h3 class="display-3">Lewis Furlan-Lowry</h3>
                        <div class="panel panel-info">
                        <ul class="list-group">
                            <li class="list-group-item">Gateway Classes</li>
                            <li class="list-group-item">User Profile</li>
                            <li class="list-group-item">Login/Logout</li>
                            <li class="list-group-item">Bootstrap Theme and Site Design</li>
                            <li class="list-group-item">Single Country</li>
                            <li class="list-group-item">Image Preview(Dynamic Image Preview)</li>
                        </ul>
                        </div>
                    <hr class="my-4">
                         <h3 class="display-3">John Hernandez</h3>
                        <div class="panel panel-info">
                        <ul class="list-group">
                            <li class="list-group-item">Favorites</li>
                            <li class="list-group-item">Single Post</li>
                            <li class="list-group-item">Browse Posts</li>
                            <li class="list-group-item">Simple Search/Search results</li>
                            <li class="list-group-item">Single Image</li>
                            <li class="list-group-item">Browse Images</li>
                        </ul>
                        </div>
        </div>
        <!-- End jumbotron -->
      
    </main>
    <?php include 'includes/footer.inc.php'; ?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/comp3512-w2018-assign1-master/anim.js" type="text/javascript"></script>
</body>

</html>