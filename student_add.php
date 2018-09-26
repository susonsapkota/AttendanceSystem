<?php
session_start();
if (isset($_SESSION['username'])) {
  if (!($_SESSION['type']=='admin')) {
    header("Location: login.php");
    exit();
  }
}else {
  header("Location: login.php");
  exit();
}
$title= "Add New Student";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php $title." Teacher" ?> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="page_style.css">
  <link rel="icon" href="img/student.png">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Student Mgmt.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto" >
        <li class="nav-item" style="line-height:35px">
          <a class="text-light" style="margin-right:15px;">Username</a>
        </li>
        <li class="nav-item">
          <a href="#" class="btn btn-primary btn-success" style="margin-right:10px;">Change Password</a>
        </li>
        <li class="nav-item">
          <a href="#" class="btn btn-primary btn-success" >Log Out</a>
        </li>
      </ul>
    </div>
  </nav>
</head>

<body>
  <div class="jumbotron text-center text-white bg-dark" style="border-radius:0px;">
    <h1>Register new Student</h1>
    <p>Fill form to register.</p>
  </div>
  <?php if(isset($_GET['id'])){
    if ($_GET['id']=='1') {
      echo "<p class='jumbotron text-center' style='height:5px;'><kbd>The username is already taken on that account.</kbd></p>";
    }elseif ($_GET['id']=='2') {
      echo "<p class='jumbotron text-center' style='height:5px;'><kbd>Account successfully added. Add another one?</kbd></p>";
    }
  }
  ?>
  <div class="container">
    <div class="jumbotron" style="box-shadow: 5px 8px 15px -2px rgba(0,0,0,0.41);">

      <form method="post" action="redirect.php" enctype="multipart/form-data">


        <div class="form-group row">
          <label for="uinput" class="col-sm-2 col-form-label">Username</label>
          <div class="input-group col-sm-10">
            <input  required type="text" name="username" class="form-control col-sm-10" id="uinput" placeholder="Enter username">
          </div>
        </div>
        <div class="form-group row">
          <label for="input1" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input  required name="password" type="text" class="form-control" id="input1" placeholder="Enter password here">
          </div>
        </div>

        <div class="form-group row">
          <label for="input1" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input  required name="name" type="text" class="form-control" id="input1" placeholder="Enter full name here">
          </div>
        </div>
        <div class="form-group row">
          <label for="input2" class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <input  required name="address" type="text" class="form-control" id="input2" placeholder="Enter address here">
          </div>
        </div>
        <div class  ="form-group row">
          <label for="input3" class="col-sm-2 col-form-label">Course</label>
          <div class="col-sm-10">
            <input required name="course" type="text" class="form-control" id="input3" placeholder="Enter Course name here">
          </div>
        </div>
        <div class="form-group row">
          <label for="input3" class="col-sm-2 col-form-label">Image Upload</label>
          <div class="col-sm-10">
            <input type="file" name="image" required accept="image/*">
          </div>
        </div>
        <div align="center">
          <input type="hidden" name="actionToDo" value="addStudent">
          <button type="reset" value="Reset"class="btn btn-primary btn-lg">Reset</button>
          <input type="submit" class="btn btn-secondary btn-lg">
        </div>
      </div>
    </form>
  </div>
</div>



<?php
require_once('footer.php');
?>
