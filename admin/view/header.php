<!DOCTYPE html>
<html>
<head>
    <title>Zippy's Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
<div>
    <?php if(isset($_SESSION['is_valid_admin'])) { ?>
        <?php if($action != 'logout') { ?>
            <div class="lrgtxt">
                <p style="display: inline;">Welcome, Admin User!</p>
                <a href="?action=logout">Sign Out</a>
            </div>
            <?php } ?>
        <?php } ?>
</div>
<header>
    <h1 style="font-family: arial;">Zippy's Admin</h1>
</header><br><br>