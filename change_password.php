<?php
session_start();
if (isset($_SESSION['username'])) {
  if (!($_SESSION['type']=='teacher' or $_SESSION['type']=='student' or $_SESSION['type']=='admin')) {
    header("Location: login.php");
    exit();
  }
}else {
  header("Location: login.php");
  exit();
}

$title = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php "$title | Administrator" ?> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="page_style.css">
  <link rel="icon" href="img/student.png">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Student Mgmt.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item" style="line-height:35px">
        <?php // TODO: implement if teacher then redirect to teachcer view else student view or admin view ?>
        <a class="text-light" style="margin-right:15px;"><?php echo $_SESSION['username']; ?></a>
      </li>

      <li class="nav-item">
        <a href="destroy.php" class="btn btn-primary btn-success">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
</head>

<body>
  <div class="jumbotron text-center text-white bg-dark" style="border-radius:0px;">
    <h1>Change Password</h1>
    <p> Enter new password</p>
  </div>
  <?php if(isset($_GET['id'])){
    if ($_GET['id']) {
      echo "<p class='jumbotron text-center' style='height:5px;'><kbd>There was problem changing the password.</kbd></p>";
    }
  }
  ?>
  <div class="container">
    <div class="jumbotron" style="box-shadow: 5px 8px 15px -2px rgba(0,0,0,0.41);">
      <form method="post" action="redirect.php">
        <div class="form-group row">
          <label for="input3" class="col-sm-2 col-form-label">Username :</label>
          <div class="col-sm-10">
            <input required name="usernameCheck" type="text" class="form-control" id="input3"
            placeholder="Enter your username to confirm">
          </div>
        </div>
        <div class="form-group row">
          <label for="input1" class="col-sm-2 col-form-label">New Password :</label>
          <div class="col-sm-10">
            <input required name="newPassword" type="text" class="form-control" id="input1"
            placeholder="Enter new Password">
          </div>
        </div>
        <div class="form-group row">
          <label for="input2" class="col-sm-2 col-form-label">Confirm Password :</label>
          <div class="col-sm-10">
            <input required name="confirmPassword" type="text" class="form-control" id="input2"
            placeholder="Retype password">
          </div>
        </div>
        <div align="center">
          <input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
          <input type="hidden" name="actionToDo" value="changePassword">
          <input type="hidden" name="actionToDo" value="changePassword">
          <button type="reset" value="Reset" class="btn btn-info btn-lg">Reset</button>
          <input type="submit" class="btn btn-success btn-lg" value="Save Changes">
        </div>
      </form>
    </div>

  </div>
</body>


<?php include_once('footer.php'); ?>
