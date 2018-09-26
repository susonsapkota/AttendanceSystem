<?php
session_start();
require_once('dbconn.php');

function checkStu($username,$password,$conn){
  $sql= "SELECT * FROM student WHERE username = '$username'";
  $result = mysqli_query($conn,$sql);
  $check = mysqli_fetch_array($result);
  if(isset($check)){
    return true;
  }else{
    return false;
  }
  mysqli_close();
}
function checkAdmin($username,$password,$conn){
  $sql= "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn,$sql);
  $check = mysqli_fetch_array($result);
  if(isset($check)){
    return true;
  }else{
    return false;
  }
  mysqli_close();

}
function checkTeach($username,$password,$conn){
  $sql= "SELECT * FROM teacher WHERE username = '$username'";
  $result = mysqli_query($conn,$sql);
  $check = mysqli_fetch_array($result);
  if(isset($check)){
    return true;
  }else{
    return false;
  }
  mysqli_close();
}
function uploadPic($file){

  $fileName = $file['name'];
  $tmpName = $file['tmp_name'];
  $filesize = $file['size'];
  $fileType = $file['type'];
  $fileExt = explode('.',$fileName);
  $actualExt = strtolower(end($fileExt));
  $filenew = uniqid('',true).".".$actualExt;
  $filedest = "uploads/.$filenew";
  // moves the tmp file to desired destination
  // first param: temp location where file is located
  // second param: file destination where file is going to be stored.
  move_uploaded_file($tmpName,$filedest);
  return $filedest;

}
function registerStudent($name,$address,$type,$photo,$username,$password,$conn){
  $sql= "INSERT INTO `student` (`id`, `stu_name`, `stu_address`, `course_type`, `photo`, `username`, `password`) VALUES (NULL,?,?,?,?,?,?)";
  $stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "<p>Error in Sql Statment!!</p>";
  }else{
    //binding if everything is okay.
    mysqli_stmt_bind_param($stmt,'ssssss',$name,$address,$type,$photo,$username,$password);
    mysqli_stmt_execute($stmt);
    $_SESSION['name']=$name;
    $_SESSION['address']=$address;
    $_SESSION['course']=$type;
    $_SESSION['photo']=$photo;
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $_SESSION['type']='student';
    header('Location: student_view.php');
    exit();
  }
  $stmt->close();
}
function registerTeacher($name,$address,$salary,$department,$photoDest,$username,$password,$conn){
  $sql= "INSERT INTO `teacher` (`id`, `teach_name`, `teach_address`, `teach_salary`, `teach_department`, `teach_photo`, `username`, `password`) VALUES (NULL,?,?,?,?,?,?,?)";
  $stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "<p>Error in Sql Statment!!</p>";
  }else{
    //binding if everything is okay.

    mysqli_stmt_bind_param($stmt,'sssssss',$name,$address,$salary,$department,$photoDest,$username,$password);
    mysqli_stmt_execute($stmt);
    $_SESSION['name']=$name ;
    $_SESSION['address']=$address;
    $_SESSION['salary']=$salary;
    $_SESSION['photo']=$photoDest;
    $_SESSION['department']=$department;
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $_SESSION['type']='teacher';
    header('Location: teacher_view.php');
    exit();
  }
  $stmt->close();
}

function registerAdmin($username,$password,$conn){
  $sql= "INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL,?,?);";
  $stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "<p>Error in Sql Statment!!</p>";
  }else{
    //binding if everything is okay.
    mysqli_stmt_bind_param($stmt,'ss',$username,$password);
    mysqli_stmt_execute($stmt);
    $_SESSION['username']=$username;
    $_SESSION['type']='admin';
    header('Location: admin_view.php');
    exit();
  }
  $stmt->close();
}

function redirectSignIn($username,$password,$accType,$conn){
  if ($accType == 'student') {
    $sql= "SELECT * FROM student WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['name']=$row['stu_name'];
      $_SESSION['address']=$row['stu_address'];
      $_SESSION['course']=$row['course_type'];
      $_SESSION['photo']=$row['photo'];
      $_SESSION['username']=$row['username'];
      $_SESSION['password']=$row['password'];
      $_SESSION['type']='student';
      header('Location: student_view.php');
      exit();
    }else{
      header('Location: login.php?id=1');
      exit();
    }
    mysqli_close($conn);
  }elseif ($accType == 'teacher') {
    $sql= "SELECT * FROM teacher WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      $row = mysqli_fetch_assoc($result);
      echo $_SESSION['name']=$row['teach_name'];
      echo $_SESSION['address']=$row['teach_address'];
      echo $_SESSION['salary']=$row['teach_salary'];
      echo $_SESSION['department']=$row['teach_department'];
      echo $_SESSION['photo']=$row['teach_photo'];
      echo $_SESSION['username']=$row['username'];
      echo $_SESSION['password']=$row['password'];
      $_SESSION['type']='teacher';
      header('Location: teacher_view.php');
      exit();
    }else{
      header('Location: login.php?id=1');
      exit();
    }
    mysqli_close($conn);
  }elseif ($accType == 'admin') {
    $sql= "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    $_SESSION['type']='admin';
    if ($resultCheck > 0) {
      $row = mysqli_fetch_assoc($result);
      echo $_SESSION['username']=$row['username'];
      $_SESSION['type']='admin';
      header('Location: admin_view.php');
      exit();
    }else{
      header('Location: login.php?id=1');
      exit();
    }
    mysqli_close($conn);
  }
}
function redirectSignUp($uname,$password,$accType,$conn){
  $_SESSION['username']=$uname;
  $_SESSION['password']=$password;
  $_SESSION['type']=$accType;

  if ($accType=='student') {
    if (checkStu($uname,$password,$conn)) {
      header('Location: signup.php?id=1');
      exit();
    }else {
      header('Location: student_register.php');
      exit();
    }
  }elseif ($accType=='teacher') {
    if (checkTeach($uname,$password,$conn)) {
      header('Location: signup.php?id=1');
      exit();
    }else {
      header('Location: teacher_register.php');
      exit();
    }
  }elseif ($accType=='admin') {
    if (checkAdmin($uname,$password,$conn)) {
      header('Location: signup.php?id=1');
      exit();
    }else {
      registerAdmin($uname,$password,$conn);
    }
  }

}
function changePassword($uname,$password,$accType,$conn){
  if ($accType =='student') {
    if (checkStu($uname,$password,$conn)) {
      echo $uname;
      echo $password;
      $sql="UPDATE student SET password='$password' WHERE username='$uname'";
      $result = mysqli_query($conn,$sql);
      if(isset($result)){
        return true;
      }else{
        return false;
      }
      mysqli_close();
    }else {
      return false;
      mysqli_close();
    }
  }elseif ($accType=='teacher') {
    if (checkTeach($uname,$password,$conn)) {
      $sql="UPDATE teacher SET password='$password' WHERE username='$uname'";
      $result = mysqli_query($conn,$sql);
      if(isset($result)){
        return true;
      }else{
        return false;
      }
      mysqli_close();
    }else {
      return false;
      mysqli_close();
    }

  }
}
function addTeacher($name,$address,$salary,$department,$photoDest,$username,$password,$conn){
  $sql= "INSERT INTO `teacher` (`id`, `teach_name`, `teach_address`, `teach_salary`, `teach_department`, `teach_photo`, `username`, `password`) VALUES (NULL,?,?,?,?,?,?,?)";
  $stmt= mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "<p>Error in Sql Statment!!</p>";
  }else{

    mysqli_stmt_bind_param($stmt,'sssssss',$name,$address,$salary,$department,$photoDest,$username,$password);
    mysqli_stmt_execute($stmt);
    header('Location: admin_view.php');
    exit();
  }
  $stmt->close();

}

?>
