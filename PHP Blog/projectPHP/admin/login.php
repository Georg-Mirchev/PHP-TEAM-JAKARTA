<?php

require_once('../includes/config.php');


if( $user->is_logged_in() ){ header('Location: index.php'); }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>

<div id="login">

    <?php


    if(isset($_POST['submit'])){

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if($user->login($username,$password)){


            header('Location: index.php');
            exit;


        } else {
            $message = '<p class="error">Wrong username or password</p>';
        }

    }

    if(isset($message)){ echo $message; }
    ?>

<div class="loginForm">
    <form class="form-horizontal" action="" method="post">
        <fieldset>
            <div class="form-group">
                <label for="username" class="col-lg-1 control-label"></label>
                <div class="col-lg-10">
                    <input class="form-control" type="text" name="username" value="" placeholder="Username"/>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-lg-1 control-label"></label>
                <div class="col-lg-10"><input class="form-control" type="password" name="password" value=""  placeholder="password"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-4">
                    <input class="btn btn-primary" type="submit" name="submit" value="Login"  />
                </div>
            </div>
        </fieldset>
    </form>
</div>
</div>
</body>
</html>
