<!DOCTYPE html>
<html lang="en">
<?php if(!isset($_COOKIE['Success'])) { header("location: login.php"); } ?>
<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    
    <link rel="stylesheet" href="css/myown.css"/>
</head>

<body>
    <?php include 'includes/header.inc.php';
    include 'includes/config.inc.php';
    $userdb = new UsersGateway($connection);
    $row = $userdb->findById($_COOKIE['UserID']);
    $userdb->closeDB();
    ?>
    <!-- Page Content -->
    <main>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $row['FullName']; ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6"> 
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Address:</td>
                                        <td><?php echo $row['Address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Location:</td>
                                        <td><?php echo $row['City'].", ".$row['Country'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Postal Code:</td>
                                        <td><?php echo $row['Postal'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td><?php echo $row['Phone'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><a href=<?php echo "mailto:".$row['Email'];?>><?php echo $row['FullName'];?></a></td>
                                    </tr>
                                </tbody>
                            </table>
                </div>
                <div class="col-md-4 col-md-offset-1">
                <img src="/comp3512-w2018-assign1-master/images/userpp2.png" class="img-responsive" />
                <hr>
                <a href="logout.php" class="btn btn-lg btn-primary btn-block">Logout</a>
            </div>
              </div>
            </div>
            </div>
            </div>
            </div>
    </main>
    <?php include 'includes/footer.inc.php'; ?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/comp3512-w2018-assign1-master/anim.js" type="text/javascript"></script>
</body>

</html>