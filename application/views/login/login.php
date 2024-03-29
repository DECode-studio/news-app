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
    <link href="<?php echo base_url('public/css/material-dashboard.css'); ?>" rel="stylesheet" />

<body>
    <div class="wrapper">
        <div class="logo"> <img src="https://firebasestorage.googleapis.com/v0/b/my-finance-bb1b3.appspot.com/o/images%2Flogo%2Fbuildup%20skill%2Flogo_buildup%20skill.png?alt=media&token=0b28655a-f10e-4c41-911e-058d2bfda708" alt=""> </div>
        <div class="text-center mt-4 name"> Sign In </div>
        <form role="form" action="<?php echo base_url('index.php/admin/login') ?>" method="post" onSubmit="return validasi()" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <i class="material-icons">person</i>
                <input type="text" class="form-control" name="txt_email" id="txt_email" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <i class="material-icons">key</i>
                <input type="password" class="form-control" name="txt_password" id="txt_password" placeholder="Password">
            </div>
            <input type="submit" class="btn mt-3" value="Login" />
        </form>
    </div>

    <script type="text/javascript">
        function validasi() {
            var txt_email = document.getElementById("txt_email").value;
            var txt_password = document.getElementById("txt_password").value;

            var alerData = <?php $counter ?>

            <?php if ($alert != "") { ?>
                alert("<?= $alert ?>")
            <?php } ?>

            console.log(<?php $counter ?>);
        }
    </script>
</body>

</html>