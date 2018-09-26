<pre><?php
session_start();
print_r($_SESSION);
echo "</pre>";
session_destroy();
// comment this to check the stored variable
header('Location: login.php');
exit();
?>
