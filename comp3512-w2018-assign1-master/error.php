<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Wait a second...</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    
    <link rel="stylesheet" href="css/myown.css"/>
</head>

<body>
    <?php include 'includes/header.inc.php';?>
    <!-- Page Content -->
    <main class="container-fluid">

                <div class="panel panel-danger">
                    <div class="panel-heading"><h1>Error!</h1></div>
                      <p>Some funky business is going on with the query string: </p>
                    <?php if(isset($_GET['error']) && $_GET['error']='invalidID'){?>
                    <p><b>An invalid ID value has been provided</b></p>
                    <?php } 
                    else{ ?>
                     <p><b>Required ID variable to visit this page was not set or is empty</b></p>
                    <?php } ?>
                     <img src='images/errorGiphy.gif'>
                </div>
    </main>
    <?php include 'includes/footer.inc.php'; ?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/comp3512-w2018-assign1-master/anim.js" type="text/javascript"></script>
</body>

</html>