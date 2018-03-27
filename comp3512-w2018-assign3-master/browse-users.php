<!DOCTYPE html>
<html lang="en">
<?php if(!isset($_COOKIE['Success'])) { header("location: login.php"); } ?>
<head>
    <meta charset="utf-8">
    <title>Browse Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    
    <link rel="stylesheet" href="css/myown.css" /> 
</head>

<body>
    <?php include 'includes/header.inc.php'; 
          include 'includes/config.inc.php';
          $userdb = new UsersGateway($connection);
          // include 'functions/userPageFunctions.php';?>
    
    <!-- Page Content -->
    <main class="container">

            
                <div class="panel panel-info">
                    <div class="panel-heading">Users</div>
                         <table class='table table-responsive'>
                        <?php $userdb->printResultsInTable();
                              $userdb->closeDB();
                        ?>
                         </table>
                </div>
    </main>
    <?php include 'includes/footer.inc.php'; ?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/comp3512-w2018-assign1-master/anim.js" type="text/javascript"></script>
</body>

</html>