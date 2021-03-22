<?php include 'header.php'; ?>
<main>
<section>
    <div class="tbl">
        <div class="addlabel">
            <p>You are signed out, <?php echo $_SESSION['userid']; ?></p>
        </div>
        <?php
            $_SESSION['userid'] = NULL;
            session_destroy();
            $name = session_name();
            $expire = strtotime('-1 year');
            $params = session_get_cookie_params();
            $path = $params['path'];
            $domain = $params['domain'];
            $secure = $params['secure'];
            $httponly = $params['httponly'];
            setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
        ?>
        <div>
            <a href="?action=list_inventory">View Inventory</a>
        </div><br>
            
</section>
</div>
</main>
<?php include 'footer.php'; ?>
