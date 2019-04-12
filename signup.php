<?php
require "db.php";
$data = $_POST;
if (isset($data['do_signup'])) {
    if (trim($data['login']) == '') {
        $errors[] = 'Login please';
    }

    if ($data['password'] == '') {
        $errors[] = 'Password please';
    }
    if(R::count('users', "login = ?",array($data['login'])) > 0)
    {
        $errors[] = "login already exists";
    }
    if (empty($errors)) {
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style="color: green;">success,<a href="login.php">login</a></div><hr>';
    } else {
        echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }
}
?>
<a href="index.php">back to main</a>
<form action="signup.php" method="POST">
    <p>
        <p><strong>Your login</strong>:</p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>

    <p>
        <p><strong>Your password</strong>:</p>
        <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>

    <p>
        <button type="submit" name="do_signup">Register</button>
    </p>
</form>