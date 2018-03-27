<?php
    include 'includes/config.inc.php';
    $countrydb = new CountriesGateway($connection);
    if(!isset($_COOKIE['Success'])) { header("location: login.php"); }
    else if(!isset($_GET['id']) || empty($_GET['id']))
    {
      header('Location:error.php');
    }
    else if((isset($_GET['id']) && !empty($_GET['id'])) && ! $countrydb->IDExists($_GET['id']))
    {
       header('Location:error.php?error=invalidID'); 
    }                                                           
    else
    {
       $row = $countrydb->findById($_GET['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Information about <?php echo $row['CountryName']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    
    <link rel="stylesheet" href="css/myown.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/comp3512-w2018-assign1-master/previewImage.js" type="text/javascript"></script>
</head>

<body>
    <?php include 'includes/header.inc.php';?>
    <!-- Page Content -->
    <main class="container-fluid">
        <div class='col-md-6'>
            <div class=" jumbotron">
                <h2> <?php echo $row['CountryName']; ?></h2>
                <p>Capital: <b> <?php echo $row['Capital']; ?></b></p>
                <p>Area: <b> <?php echo number_format($row['Area']); ?> </b> sq km.</p>
                <p>Population: <b><?php echo number_format($row['Population']); ?></b></p>
                <p>Currency Name: <b><?php echo $row['CurrencyName'] ?></p><br>
                <p><?php echo $row['CountryDescription']; ?></p>
                <img src='https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $row['CountryName'].',+'.$row['Capital']; ?>&size=600x300'>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="panel panel-info">
                <div class='panel-heading'><h3>Images from <?php echo $row['CountryName']; ?></h3></div>
                <?php $countrydb->printRelatedImages($_GET['id']);
                $countrydb->closeDB(); ?>
            </div>
            <div>
                <iframe src='https://en.wikipedia.org/wiki/<?php echo $row['CountryName']; ?>' height="1000"></iframe>
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