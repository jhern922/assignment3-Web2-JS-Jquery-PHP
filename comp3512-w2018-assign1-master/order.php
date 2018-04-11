<!DOCTYPE html>
<html lang="en">
<?php if(!isset($_COOKIE['Success'])) { header("location: login.php"); } 
session_start();
?>
<head>
    <meta charset="utf-8">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    
    <link rel="stylesheet" href="css/order.css" />
    <script src="jquery.js"></script>
    <script src="js/order.js"></script>
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
            <div class="jumbotron">
              <h1 class="display-3">Order Summary</h1>
                    <p class="lead">Your order below has been successful! </p>
            </div>
              <table>
                        <tr>
                            <th class="text-center"></th>
                            <th class="text-center">Size</th>
                            <th class="text-center">Paper</th>
                            <th class="text-center">Frame</th>
                            <th class="text-center">Quantity</th>
                        </tr>
                    <?php  
                    $counter = 0;
                    foreach($_SESSION['imageFavList'] as $row){ ?>
                        <div class="printSummary">    
                            <tr>
                                   <td><a href="single-image.php?id=<?php echo $row['ID'];?>"><img src="images/square-small/<?php echo $row['Path'];?>" alt='<?php echo $row['Title'];?>'  title='<?php echo $row['Title'];?>'></a></td>
                                   <td id="sizeVal<?php echo $counter; ?>"><?php echo $_POST['size'.$counter];?></td>
                                   <td id="stockVal<?php echo $counter; ?>"><?php echo $_POST['stock'.$counter];?></td>
                                   <td id="frameVal<?php echo $counter; ?>"><?php echo $_POST['frame'.$counter];?></td>
                                   <td><?php 
                                   if(!isset($_POST['id_inp'.$counter]) || empty($_POST['id_inp'.$counter])){
                                       echo 0;}
                                   else{
                                   echo $_POST['id_inp'.$counter];}?>
                                   </td>
                            </tr>
                        </div>
                    <?php $counter++; } ?>
                        <tr>
                            <td colspan='5'><h4>Delivery will be delivered via: <?php echo ucfirst($_POST['shipping']);?> Shipping</h4></td>
                        </tr>
              </table>
        
        <!-- End jumbotron -->
    </main>
    <?php include 'includes/footer.inc.php'; ?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/comp3512-w2018-assign1-master/anim.js" type="text/javascript"></script>
</body>

</html>