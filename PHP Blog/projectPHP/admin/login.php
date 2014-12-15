<?php
require_once('../includes/config.php');

if(!$user->is_logged_in()){
    header('Location: login.php');
};

if(isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if($user->login($username,$password)){
        header('Location: index.php');
        exit;
    } else {
        $message = '<p class="error">Wrong username or password</p>';
    }
    if(isset($message)){
        echo $message;
    }
}

?>

<form action="" method="post">
    <p><label>Username</label><input type="text" name="username" value=""  /></p>
    <p><label>Password</label><input type="password" name="password" value=""  /></p>
    <p><label></label><input type="submit" name="submit" value="Login"  /></p>
</form>


