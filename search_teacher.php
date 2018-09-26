<?php
require_once('dbconn.php');
if (isset($_SESSION['username'])) {
  if (!($_SESSION['type']=='teacher' or $_SESSION['type']=='student' or $_SESSION['type']=='admin')) {
    header("Location: login.php");
    exit();
  }
}else {
  header("Location: login.php");
  exit();
}
if (isset($_SESSION['username'])) {
  $title=$_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php "$title | Student" ?> </title>
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

        <form class="form-inline my-2 my-lg-0 " style="margin-right:200px" method="get" action="search_teacher.php">
          <input class="form-control mr-sm-2" type="search" placeholder="Search Teacher" aria-label="Search" name="name" style="width:450px !important";>
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

  $text='';
  if (isset($_GET['name'])) {
    $name=$_GET['name'];
  }else {
    $name="";
  }
  if (isset($_POST)) {
    echo "<p class='jumbotron text-center' style='height:5px;'><kbd>The data is updated.</kbd></p>";
  }
  ?>

  <div class="jumbotron text-center text-white bg-dark" style="border-radius:0px; padding-bottom:10px;">
    <h1>Search Teacher</h1>
    <p>Search text : <?php echo $name ;?> </p>
  </div>


  <div class="container">
    <div class="cards" style="padding-top:5px;">
      <?php
      if (isset($name)) {
        ?>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>S.N</th>
              <th>Name</th>
              <th>Address</th>
              <th>Salary</th>
              <th>Department</th>
              <th>Username</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $selectsql = "SELECT `id`,`teach_name`, `teach_address`, `teach_salary`, `teach_department`, `username` FROM `teacher` WHERE `teach_name` LIKE '%" . $name .  "%'";
            $result = mysqli_query($conn,$selectsql);
            $resultCheck = mysqli_num_rows($result);
            $id = 1;
            if ($resultCheck > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                <td>$id</td>
                <td>{$row['teach_name']}</td>
                <td>{$row['teach_address']}</td>
                <td>{$row['teach_salary']}</td>
                <td>{$row['teach_department']}</td>
                <td>{$row['username']}</td>
                <td>
                <form method='POST' action = 'edit_teacher.php'>
                <button name='edit'class='btn btn-primary btn-success' value ='{$row['id']}'>Edit / Delete</button>
                </form>
                </td>
                </tr>";
                $id++;
              }
            }else {
              echo "<h5 class = 'text-center'>No teacher found. Add some students to see their details.</h5>";
            }
            mysqli_close($conn);
          }else {
            echo "<h5 class = 'text-center'>No teacher found. Add some students to see their details.</h5>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php include_once('footer.php'); ?>
