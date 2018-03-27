<?php
    include 'includes/config.inc.php';
    $userdb = new UsersGateway($connection);
    if(!isset($_COOKIE['Success'])) { header("location: login.php"); } 
    else if(!isset($_GET['id']) || empty($_GET['id']))
    {
      header('Location:error.php');
    }
    else if((isset($_GET['id']) && !empty($_GET['id'])) && ! $userdb->IDExists($_GET['id']))
    {
       header('Location:error.php?error=invalidID'); 
    }
    else
    {
      $row = $userdb->findById($_GET['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <title>About <?php echo $row['FullName']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    
    <link rel="stylesheet" href="css/myown.css"/>
    <script src="/comp3512-w2018-assign1-master/previewImage.js" type="text/javascript"></script>

</head>

<body>
    <?php include 'includes/header.inc.php';?>
    <!-- Page Content -->
    <main class="container-fluid">
    <div class='col-md-8 col-md-offset-2'>
            <div class=" jumbotron">
            <h2><?php echo $row['FullName'];?></h2>
            <p><?php echo $row['Address'];?></p>
            <p><?php echo $row['City'].",".$row['Postal'].",".$row['Country'];?></p>
            <p><?php echo $row['Phone'];?></p>
            <p><?php echo $row['Email'];?></p>
            </div>
            <div class="panel panel-info">
            <div class='panel-heading'><h3>Images from <?php echo $row['FullName']; ?></h3></div>
            <?php $userdb->printRelatedImages($_GET['id']); 
                  $userdb->closeDB();
                  ?>
            </div>
    </div>
    <div id="hArea">
                
            </div>
    </main>
    <?php include 'includes/footer.inc.php'; ?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/comp3512-w2018-assign1-master/anim.js" type="text/javascript"></script>
</body>

</html>