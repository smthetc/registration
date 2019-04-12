<?php
require "db.php";
$data = $_POST;
if (isset($data['do_login']))
 {
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));
        if ($user) 
        {
            if (password_verify($data['password'], $user->password))
            {
                $_SESSION['logged_user'] = $user;
                echo '<div style="color: green;">logged, link to <a href="index.php">main page</a></div><hr>';
            }else
            {
                $errors[] = "wrong password";
            }
        } else 
    {
    $errors[] = 'login not found, <a href="signup.php">register now</a>';
    }
    if (!empty($errors)) {
        echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }
}
?>
<form action="login.php" method="POST">
    <p>
        <p><strong>Login</strong>:</p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>

    <p>
        <p><strong>Password</strong>:</p>
        <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>
    <p>
        <button type="submit" name="do_login">Login</button>
    </p>
</form>