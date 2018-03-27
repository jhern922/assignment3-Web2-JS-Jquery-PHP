<!DOCTYPE html>
<html lang="en">
<?php if(!isset($_COOKIE['Success'])) { header("location: login.php"); }
session_start();
if(isset($_GET['removeAllImages']) && ($_GET['removeAllImages'] == 1)){
    $_SESSION['imageFavList'] = array();
}
if(isset($_GET['removeImage']) && (!empty(['removeImage']))){
    for($i=0;$i< sizeof($_SESSION['imageFavList']);$i++){
        if($_SESSION['imageFavList'][$i]['ID'] == $_GET['removeImage'])
        {
            array_splice($_SESSION['imageFavList'], $i, 1);
            $found = true;
        }
    }
    if(!$found){
    header('Location:error.php?error=invalidID');
}
}
if(isset($_GET['removePost']) && (!empty(['removePost']))){
    for($i=0;$i< sizeof($_SESSION['postFavList']);$i++){
        if($_SESSION['postFavList'][$i]['ID'] == $_GET['removePost'])
        {
            array_splice($_SESSION['postFavList'], $i, 1);
            $found = true;
        }
    }
    if(!$found){
    header('Location:error.php?error=invalidID');
}
}
if(isset($_GET['removeAllPosts']) && ($_GET['removeAllPosts'] == 1)){
    $_SESSION['postFavList'] = array();
}
?>
<head>
    <meta charset="utf-8">
    <title>Browse Posts</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css/as2.min.css" />
    <link rel="stylesheet"  href="css/bootstrap-theme.css"/>
</head>

<body>
   <?php include "includes/header.inc.php"; 
         include "includes/config.inc.php";?>
    <!-- Page Content -->
    <main class="container">
        <div class="row">
        <div class="col-md-10">
             <div class="col-md-6"> 
        <?php     
        if(!isset($_SESSION['imageFavList'])){?>
            <h3>You have no Image Favorite List</h3>
       <?php }
        else if(empty($_SESSION['imageFavList'])){ ?>
            <h3>Image Favorite List is empty</h3>
        <?php }
        else{ ?>
             <h3>Your <?php echo sizeof($_SESSION['imageFavList']); ?> Favorite Image(s):</h3>
             <a href="favorites-list.php?removeAllImages=1"class="btn btn-primary btn-sm">Remove All Images from favorites</a>
           <?php  foreach($_SESSION['imageFavList'] as $row){ ?>
                      <h6><?php echo $row['Title'];?></h6>
                      <a href="single-image.php?id=<?php echo $row['ID'];?>"><img src="images/square-small/<?php echo $row['Path'];?>" alt='<?php echo $row['Title'];?>'></a>
                           <p class="pull-right">
                            <a href="favorites-list.php?removeImage=<?php echo $row['ID'];?>"class="btn btn-danger btn-sm">Remove from favorites</a>
                        </p>
          <?php } 
          
        } ?>
        </div>
        <div class="col-md-6"> 
        <?php if(!isset($_SESSION['postFavList'])){?>
            <h3>You have no Post Favorite List</h3>
       <?php }
        else if(empty($_SESSION['postFavList'])){ ?>
            <h3>Post Favorite List is empty</h3>
        <?php }
        else{ ?>
             <h3>Your <?php echo sizeof($_SESSION['postFavList']); ?> Favorite Post(s):</h3>
               <a href="favorites-list.php?removeAllPosts=1"class="btn btn-primary btn-sm">Remove All Posts from favorites</a>
           <?php  foreach($_SESSION['postFavList'] as $row){ ?>
                      <h6><?php echo $row['Title'];?></h6>
                      <a href="single-post.php?id=<?php echo $row['ID'];?>"><img src="images/square-small/<?php echo $row['Path'];?>" alt='<?php echo $row['Title'];?>'></a>
                       <p class="pull-right">
                            <a href="favorites-list.php?removePost=<?php echo $row['ID'];?>"class="btn btn-danger btn-sm">Remove from favorites</a>
                        </p>
          <?php }
         }
       ?>
              </div>
        </div>
       </div>
    </main>
    <?php include 'includes/footer.inc.php'; ?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>