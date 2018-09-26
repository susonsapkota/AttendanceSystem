<?php
session_start();
if (isset($_SESSION['username'])) {
  if (!($_SESSION['type']=='admin')) {
    header("Location: ".$_SESSION['type']."_view.php");
    exit();
  }
}
$title= "Add New Teacher";
$type="";
if(isset($_GET['com_print_typeinfo'])){
  if ($_GET['type']=='teacher') {
    $type='teacher';
  }elseif ($_GET['type']=='student') {
    $type='teacher';
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php $title ?> </title>
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

  <body>

    <div class="jumbotron text-center text-white bg-dark" style="border-radius:0px;">
      <h1>Check username for Student(CHange this)</h1>
      <p>Check Username to register.</p>
    </div>
    <div class="container">
      <div class="jumbotron" style="box-shadow: 5px 8px 15px -2px rgba(0,0,0,0.41);">
        <form method="post" action="dbconn.php">
          <div id="feedback"></div>
          <div class="form-group row">
            <label for="username_input" class="col-sm-2 col-form-label">Username</label>
            <div class="input-group col-sm-10">
              <input name="username" type="text" class="form-control col-sm-10" id="username_input" placeholder="Enter username to check for availability">
            </div>
          </div>
          <div align="center">
            <button type="reset" value="Reset"class="btn btn-primary btn-lg">Reset</button>
            <input type="submit" class="btn btn-secondary btn-lg" value="Check Username">
            <input type="hidden" name="actionToDo" value="addNewUser">
            <input type="hidden" name="accountType" value="<?php echo $type; ?>">

          </div>
        </div>
      </form>
    </div>
  </div>

  <?php
  require_once('footer.php');
  ?>
