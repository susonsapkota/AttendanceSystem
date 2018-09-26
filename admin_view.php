<?php
session_start();
if (isset($_SESSION['type'])) {
  if (!($_SESSION['type']=='admin')) {
    header("Location: ".$_SESSION['type']."_view.php");
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
  <link rel=  "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
  <div class="jumbotron text-center text-white bg-dark" style="border-radius:0px; padding-bottom:10px;">
    <img src="img/admin.png" alt="profile image" class="rounded mx-auto d-block img-fluid" height="200px" width="200px">
    <h1><?php echo $_SESSION['username']; ?></h1>
    <p>Admin</p>
  </div>
  <style>

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
    flex-wrap: wrap;
    width: 80vw;
    margin: 0 auto;
    min-height: 35vh;
  }

  .magic {
    flex: 1 1 auto;
    margin: 10px;
    padding: 30px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;
    text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    box-shadow: 5px 5px 20px -3px rgba(0, 0, 0, 0.75);
    border-radius: 10px;
    width: 200px !important;
    height: 200px !important;
    margin: 35px;
  }
  .btn:hover {
    background-position: right center;
  }
  .btn-1 {
    background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);
  }
  .btn-2 {
    background-image: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);
  }

  .btn-3 {
    background-image: linear-gradient(to right, #84fab0 0%, #8fd3f4 51%, #84fab0 100%);
  }
  .btn-4 {
    background-image: linear-gradient(to right, #a1c4fd 0%, #c2e9fb 51%, #a1c4fd 100%);
  }
  .shadow {
    box-shadow: 6px 5px 29px -6px rgba(255, 255, 255, 1);
  }
}
</style>
<div class="container">
  <div style="padding-top:5px;">
    <div class="container">
      <a class="btn btn-sq-lg  btn-1 magic" href="teacher_add.php"><br/>
        <i class="fas fa-chalkboard-teacher fa-5x"></i><br/><br/>
        Add Teacher</a>
        <a class="btn btn-sq-lg  btn-2 magic" href="student_add.php"><br/>
          <i class="fas fa-user-graduate fa-5x"></i><br/><br/>
          Add Student</a>
          <a class="btn btn-sq-lg  btn-3 magic" href="search_teacher.php"><br/>
            <i class="fas fa-book-reader fa-5x"></i><br/><br/>
            Search Teacher</a>
            <a class="btn btn-sq-lg  btn-4 magic" href="search_student.php"><br/>
              <i class="fas fa-graduation-cap fa-5x"></i><br/><br/>
              Search Student</a>
            </div>
            <?php // TODO: create login session to forward where to go.Like after clcicking facebook.com if logged in profile if not login page?>
            <?php
            require_once('footer.php') ?>
