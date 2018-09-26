<?php
session_start();
if (isset($_SESSION['username'])) {
  if (!($_SESSION['type']=='teacher')) {
    header("Location: ".$_SESSION['type']."_view.php");
    exit();
  }
}else {
  header("Location: login.php");
  exit();
}
$title=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php echo "$title | Teacher" ?> </title>
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

        <form class="form-inline my-2 my-lg-0 " style="margin-right:200px" method="get" action="search_student.php">
          <input class="form-control mr-sm-2" name="name" type="search" placeholder="Search Student" aria-label="Search" style="width:450px !important";>
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
        <li class="nav-item " style="line-height:35px">
          <a class="text-light"style="margin-right:15px;"><?php echo $_SESSION['username'];?></a>
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

  <div class="jumbotron text-center text-white bg-dark" style="border-radius:0px; padding-bottom:10px;">
    <img src="<?php echo $_SESSION['photo'];?>" alt="profile image" class="rounded mx-auto d-block img-fluid" height="300px" width="300px">
    <h1><?php echo $_SESSION['name'];?></h1>
    <p>Teacher</p>
  </div>


  <div class="container">
    <div class="cards" style="padding-top:5px;">

      <div class  ="form-group row">
        <label for="input3" class="col-sm-2 col-form-label">Username :</label>
        <div class="col-sm-10">
          <input required name="username" type="text" class="form-control" id="input3" value="<?php echo $_SESSION['username'];?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="input1" class="col-sm-2 col-form-label">Name :</label>
        <div class="col-sm-10">
          <input  required name="name" type="text" class="form-control" id="input1" value="<?php echo $_SESSION['name'];?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="input2" class="col-sm-2 col-form-label">Address :</label>
        <div class="col-sm-10">
          <input  required name="address" type="text" class="form-control" id="input2" value="<?php echo $_SESSION['address'];?>" readonly>
        </div>
      </div>
      <div class  ="form-group row">
        <label for="input3" class="col-sm-2 col-form-label">Salary :</label>
        <div class="col-sm-10">
          <input required name="salary" type="text" class="form-control" id="input4" value="<?php echo $_SESSION['salary'];?>" readonly>
        </div>
      </div>
      <div class  ="form-group row">
        <label for="input3" class="col-sm-2 col-form-label">Department :</label>
        <div class="col-sm-10">
          <input required name="department" type="text" class="form-control" id="input4" value="<?php echo $_SESSION['department'];?>" readonly>
        </div>
      </div>
    </div>

    <?php
    require_once('footer.php') ?>
