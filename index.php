<?php 
require "db.php";
?>

<?php if(isset($_SESSION['logged_user'])) : ?>
<p style="color: green">logged <?php echo $_SESSION['logged_user']->login ?></p>
<a href="/logout.php">logout</a><br>
<a href="/admin.php">admin panel</a>
<?php else : ?>
<p style="color: red;">not authoraized</p>
<a href="/login.php">login</a><br>
<a href="/signup.php">sign up</a><br>
<a href="/admin.php">admin panel</a>
<?php endif; ?>