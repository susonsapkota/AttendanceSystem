

<?php
require_once('dbconn.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php echo $title; ?> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="page_style.css">
  <link rel="icon" href="img/student.png">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Student Mgmt.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto" >

        <form class="form-inline my-2 my-lg-0 " style="margin-right:100px" method="get" action="search_student.php">
          <input class="form-control mr-sm-2" name="name" type="search" placeholder="Search Student" aria-label="Search" style="width:500px !important";>
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
        <li class="nav-item " style="line-height:35px">
          <a class="text-light"style="margin-right:15px;"><?php echo $_SESSION['username']; ?></a>
        </li>
        <li class="nav-item">
          <a href="change_password.php" class="btn btn-primary btn-success"style="margin-right:10px;">Change Password</a>
        </li>
        <li class="nav-item">
          <a href="destroy.php" class="btn btn-primary btn-success" >Log Out</a>
        </li>

      </ul>
    </div>
  </nav>
</head>
<body>


  <?php
  if (!empty($_GET)){

    echo "<div class='container'>";
    echo "<img src='img/tick.gif' width='114' height='86' class='rounded mx-auto d-block'>";
    echo "<div class='jumbotron'>";

    if (!$conn) {
      die("Connection failed:". mysqli_connect_error());
    }
    if ($_GET['type']=='student') {
      $delID= $_GET['id'];
      $nameID= $_GET['name'];
      $sql = "DELETE FROM `student` WHERE `student`.`id` = ?";
      $stmt= mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "<p>Error in Sql Statment!!</p>";
      }else{
        //binding if everything is okay.
        mysqli_stmt_bind_param($stmt,'i',$delID);
        mysqli_stmt_execute($stmt);
      }
      $stmt->close();
      echo "<p class = 'jumbotron text-center'>$nameID has been deleted successfully.</br><h6 class ='text-center'><strong>You'll be ridirected shortly...</strong></h6></div></p>";
      header( "refresh:3;url=search_student.php" );

    }elseif ($_GET['type']=='teacher') {
      $delID= $_GET['id'];
      $nameID= $_GET['name'];
      $sql = "DELETE FROM `teacher` WHERE `teacher`.`id` = ?";
      $stmt= mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "<p>Error in Sql Statment!!</p>";
      }else{
        //binding if everything is okay.
        mysqli_stmt_bind_param($stmt,'i',$delID);
        mysqli_stmt_execute($stmt);
      }

      $stmt->close();

      echo "<p class = 'jumbotron text-center'>$nameID has been deleted successfully.</br><h6 class ='text-center'><strong>You'll be ridirected shortly...</strong></h6></div></p>";
      header( "refresh:3;url=search_teacher.php" );
    }
  }else {
    header('Location: form.php');
    exit();
  }
  ?>
  <?php
  require_once('footer.php') ?>
