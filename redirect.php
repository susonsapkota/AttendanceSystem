<?php

require_once('dbconn.php');
require_once('function.php');



$uname = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$accType = $_POST['type'] ?? '';



$redirect = "";
if (isset($_POST['actionToDo'])) {
  $redirect = $_POST['actionToDo'];
}


switch ($redirect) {
  case 'signin':
  redirectSignIn($uname, $password, $accType, $conn);
  break;
  case 'signup':
  redirectSignUp($uname, $password, $accType, $conn);
  break;
  case 'registerStudent':
  $name = $_POST['name'];
  $address = $_POST['address'];
  $course = $_POST['course'];
  $password = $_POST['password'];
  if (!checkStu($uname, $password, $conn)) {
    if (isset($_FILES['image'])) {
      $photoDest = uploadPic($_FILES['image']);
      registerStudent($name, $address, $course, $photoDest, $uname, $password, $conn);
    }
  } else {
    header('Location: signup.php?id=1');
    exit();
  }
  break;
  case 'registerTeacher':
  $name = $_POST['name'];
  $address = $_POST['address'];
  $salary = $_POST['salary'];
  $department = $_POST['department'];
  $password = $_POST['password'];

  if (!checkTeach($uname, $password, $conn)) {
    if (isset($_FILES['image'])) {
      $photoDest = uploadPic($_FILES['image']);
      registerTeacher($name, $address, $salary, $department, $photoDest, $uname, $password, $conn);
    }
  } else {
    header('Location: signup.php?id=1');
    exit();
  }
  break;
  case 'registerAdmin':
  $password = $_POST['password'];
  if (!checkAdmin($uname, $password, $conn)) {
    registerAdmin($uname, $password, $conn);
  } else {
    header('Location: signup.php?id=1');
    exit();
  }
  break;
  case 'changePassword':
  $checkUsername=$_POST['usernameCheck'];
  $username=$_SESSION['username'];
  $password = $_POST['newPassword'];
  $confirmPassword = $_POST['confirmPassword'];
  $type = $_SESSION['type'];
  if (($checkUsername==$username) && ($password==$confirmPassword)) {

    if (changePassword($username,$confirmPassword,$type,$conn)) {
      if ($type=='student') {

        header('Location: student_view.php');
        exit();
      }elseif ($type=='teacher') {
        header('Location: teacher_view.php');
        exit();
      }else {
        header('Location: change_password.php?id=1');
        exit();
      }
    }
  }else {
    header('Location: change_password.php?id=1');
    exit();
  }
  break;
  case 'addTeacher':
  $uname = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $salary = $_POST['salary'];
  $department = $_POST['department'];
  $password = $_POST['password'];
  if (!checkTeach($uname, $password, $conn)) {
    if (isset($_FILES['image'])) {
      $photoDest = uploadPic($_FILES['image']);
      $sql= "INSERT INTO `teacher` (`id`, `teach_name`, `teach_address`, `teach_salary`, `teach_department`, `teach_photo`, `username`, `password`) VALUES (NULL,?,?,?,?,?,?,?)";
      $stmt= mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "<p>Error in Sql Statment!!</p>";
      }else{
        mysqli_stmt_bind_param($stmt,'sssssss',$name,$address,$salary,$department,$photoDest,$uname,$password);
        mysqli_stmt_execute($stmt);
        header('Location: teacher_add.php?id=2');
        exit();
      }
      $stmt->close();
    }
  } else {
    header('Location: teacher_add.php?id=1');
    exit();
  }
  break;
  case 'addStudent':
  $uname = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $course = $_POST['course'];
  if (!checkStu($uname, $password, $conn)) {
    if (isset($_FILES['image'])) {
      $photoDest = uploadPic($_FILES['image']);
      $sql= "INSERT INTO `student` (`id`, `stu_name`, `stu_address`, `course_type`, `photo`, `username`, `password`) VALUES (NULL,?,?,?,?,?,?)";
      $stmt= mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "<p>Error in Sql Statment!!</p>";
      }else{
        mysqli_stmt_bind_param($stmt,'ssssss',$name,$address,$course,$photoDest,$uname,$password);
        mysqli_stmt_execute($stmt);
        header('Location: student_add.php?id=2');
        exit();
      }
      $stmt->close();
    }
  } else {
    header('Location: student_add?id=1');
    exit();
  }
  break;
  case 'updateStudent':
  $uname = $_POST['username'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $course = $_POST['course'];
  $sql="UPDATE `student` SET `stu_name` = ?, `stu_address` = ?, `course_type` = ? WHERE `student`.`username` = ?";
  $stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "<p>Error in Sql Statment!!</p>";
  }else{
    //binding if everything is okay.
    mysqli_stmt_bind_param($stmt,'ssss',$name,$address,$course,$uname);
    mysqli_stmt_execute($stmt);
    header('Location: search_student.php');
    exit();
  }
  $stmt->close();

  break;
  case 'updateTeacher':
  $uname = $_POST['username'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $salary = $_POST['salary'];
  $department = $_POST['department'];
  $sql="UPDATE `teacher` SET `teach_name` = ?, `teach_address` = ?, `teach_salary` = ?,`teach_department` = ? WHERE `teacher`.`username` = ?";
  $stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "<p>Error in Sql Statment!!</p>";
  }else{
    //binding if everything is okay.
    mysqli_stmt_bind_param($stmt,'sssss',$name,$address,$salary,$department,$uname);
    mysqli_stmt_execute($stmt);
    header('Location: search_teacher.php');
    exit();
  }
  $stmt->close();

  break;


}
?>
