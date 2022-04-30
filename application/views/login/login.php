<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?>
    </title>

    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo base_url('public/css/material-dashboard.css'); ?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet" />

<body>
    <div class="wrapper">
        <div class="logo"> <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> </div>
        <div class="text-center mt-4 name"> Twitter </div>
        <form role="form" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <i class="material-icons">person</i>
                <input type="text" class="form-control" name="userName" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <i class="material-icons">key</i>
                <input type="password" class="form-control" name="password" id="pwd" placeholder="Password">
                
            </div>
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a>
            or
            <a href="#">Sign up</a>
        </div>
    </div>
</body>

</html>