<?php
session_start();
if (isset($_SESSION['username'])) {
  if (!($_SESSION['type']=='student' or $_SESSION['type']=='teacher' or $_SESSION['type']=='admin')) {

    header("Location: ".$_SESSION['type']."_view.php");
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Log-In </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="page_style.css">
  <link rel="icon" href="img/student.png">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Student Mgmt.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="signup.php" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-open"></span> Sign Up</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <?php if(isset($_GET['id'])){
      if ($_GET['id']) {
        echo "<p class='jumbotron text-center' style='height:5px;'><kbd>The credential provided is incorrect .</kbd></p>";
      }
    }
    ?>
    <div class="cards">
      <h1 class="headings text-center"><kbd>Sign In</kbd></h1>
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div class="box">
            <div class="shape1"></div>
            <div class="shape2"></div>
            <div class="shape3"></div>
            <div class="shape4"></div>
            <div class="shape5"></div>
            <div class="shape6"></div>
            <div class="shape7"></div>
            <div class="float">
              <form class="form" action="redirect.php" method="post">
                <div class="form-group">
                  <label for="username" class="text-black"><kbd>Username:</kbd></label><br>
                  <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password" class="text-black"><kbd>Password:</kbd></label><br>
                  <input type="password" name="password" id="password" class="form-control">
                  <input type="hidden" name="actionToDo" value="signin">
                </div>
                <div class="form-group">
                  <label class="radio-inline"><input type="radio" name="type" checked value="student"><kbd>Student</kbd></label>
                  <label class="radio-inline"><input type="radio" name="type" value="teacher"><kbd>Teacher</kbd></label>
                  <label class="radio-inline"><input type="radio" name="type" value="admin"><kbd>*Admin*</kbd></label>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-dark btn-md" value="Submit:">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  require_once('footer.php');
  ?>
