<!DOCTYPE html>
<html>
<head>
    <title>Zippy's Autos</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
<div>
    <?php if($action != 'register') { session_start(); ?>
            <?php if(!isset($_SESSION['userid'])) { ?>
                <div class="lrgtxt">
                    <a href="?action=register">Register</a>
                </div>
            <?php } ?>
    <?php } ?>
    <?php if($action != 'register' && isset($_SESSION['userid'])) { ?>
        <?php if($action != 'logout') { ?>
            <div class="lrgtxt">
                <p style="display: inline;">Welcome, <?php echo $_SESSION['userid']; ?></p>
                <a href="?action=logout">Sign Out</a>
            </div>
        <?php } else if($action == 'logout') { ?>
        <?php } ?>
    <?php } ?>

</div>
<header>
    <h1 style="font-family: arial;">Zippy's Autos</h1>
</header><br><br>


<?php

if ($action != 'register') {
    if(!isset($username)) {
        //register link
    } else if (isset($username) && $action != 'logout') {
        //welcome user
    }
}

?>

