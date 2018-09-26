
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Signup | mgmt </title>
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
    <a class="navbar-brand" href="#">Student Mgmt.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="login.php" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-open"></span> Log In</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php if(isset($_GET['id'])){
    if ($_GET['id']) {
      echo "<p class='jumbotron text-center' style='height:5px;'><kbd>The username is already taken on that account.</kbd></p>";
    }
  }
  ?>
  <div class="container">
    <div class="cards">
      <h1 class="headings text-center"><kbd>Sign Up</kbd></h1>
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
                  <input type="text" required name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password" class="text-black"><kbd>Password:</kbd></label><br>
                  <input type="password" required name="password" id="password" class="form-control">
                  <input type="hidden" name="actionToDo" value="signup">
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
