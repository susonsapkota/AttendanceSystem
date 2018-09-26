<?php
session_start();
if (!($_SESSION['type']=='teacher')) {
  if (isset($_SESSION['username'])) {
    if (!$_SESSION['type']=='admin') {
      header("Location: ".$_SESSION['type']."_view.php?id=1");
      exit();
    }
  }
}
$title= "Add New Teacher";
require_once('header.php');
?>

<div class="jumbotron text-center text-white bg-dark" style="border-radius:0px;">
  <h1>Register as Teacher</h1>
  <p>Fill form to register.</p>
</div>
<div class="container">
  <div class="jumbotron" style="box-shadow: 5px 8px 15px -2px rgba(0,0,0,0.41);">

    <form method="post" action="redirect.php" enctype="multipart/form-data">
      <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
      <input type="hidden" name="password" value="<?php echo $_SESSION['password']; ?>">


      <?php if (isset($_SESSION['username'])): ?>
        <div class="form-group row">
          <label for="input2" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <p style="border-style: groove; padding:5px;"><?php echo $_SESSION['username'].'
            (available)'; ?></p>
          </div>
        </div>
      <?php endif; ?>


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
      <div class="form-group row">
        <label for="input3" class="col-sm-2 col-form-label">Salary</label>
        <div class="col-sm-10">
          <input required name="salary" type="text" class="form-control" id="input3" placeholder="Enter salary here">
        </div>
      </div>
      <div class="form-group row">
        <label for="input3" class="col-sm-2 col-form-label">Department</label>
        <div class="col-sm-10">
          <input required name="department" type="text" class="form-control" id="input3" placeholder="Enter department here">
        </div>
      </div>
      <div class="form-group row">
        <label for="input3" class="col-sm-2 col-form-label">Image Upload</label>
        <div class="col-sm-10">
          <input type="file" name="image" required accept="image/*">
        </div>
      </div>
      <div align="center">
        <input type="hidden" name="actionToDo" value="registerTeacher">
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
