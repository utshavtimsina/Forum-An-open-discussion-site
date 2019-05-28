<?php 
session_start();

if (isset($_COOKIE['remember'])) {
   $_SESSION['uid'] = $_COOKIE['uid'];
   $_SESSION['username'] = $_COOKIE['username'];
   $_SESSION['profile_pic'] = $_COOKIE['profile_pic'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Bootstrap 3, from LayoutIt!</title>
   <meta name="description" content="Source code generated using layoutit.com">
   <meta name="author" content="LayoutIt!">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/style.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
</head>
<body>
   <header class="navbar-fixed-top navbar-inverse">
      <div class="container">
         <nav class="navbar" role="navigation">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
               </button> <a class="navbar-brand" href="index.php"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <li class="active">
                     <a href="index.php">Q&A</a>
                  </li>
                  <li>
                     <a href="sharePost">Share And Post</a>
                  </li>
                  <li>
                     <a href="sharePost/Section/upload.php">Store</a>
                  </li>
               </ul>
               <form class="navbar-form navbar-left" role="search">
                  <div class="form-group">

                     <input type="text" class="form-control" list="browsers" autocomplete="off">
                        <datalist id="browsers" style="color: red;background: red;">
                           </datalist>
                  </div>
                  <input  class="btn btn-primary search" value="Search">
                   

               </form>
               <ul class="nav navbar-nav navbar-right"><!-- 
                  <li>
                     <a href="upload.php" class="btn-success btn-upload"><span class="glyphicon glyphicon-upload"></span> Upload Question Bank</a>
                  </li> -->
                  <?php if (isset($_SESSION['uid'])) { ?>
                     <li class="dropdown profile-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/<?php echo $_SESSION['profile_pic'] ?>" class="img-circle" width="40" height="40"><strong class="caret"></strong></a> 
                        <ul class="dropdown-menu">                      
                        <li><a href="profile.php?id=<?php echo $_SESSION['uid'] ?>">Profile</a></li> 
                        <li><a href="logout.php">Logout</a></li>  
                     </ul>
                  </li>
                  <?php }else{ ?>
                     <li><a href="login/getIN.php">Login</a></li>
                  <?php } ?>
               </ul>
            </div>
         </nav>
      </div>
   </header>