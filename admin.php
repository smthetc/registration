<?php
require "db.php";
?>

<?php
if($_SESSION['logged_user']->login == 'admin')  : ?>
<p style="color: green">logged admin: <p><?php echo $_SESSION['logged_user']->login?></p></p>
<a href="/logout.php">logout</a>
<?php else : ?>
<h1 style="color:red;">Вы даже не админ!!!!!!!!!!!!!!!</h1>
<?php endif; ?>