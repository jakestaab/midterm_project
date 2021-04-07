<?php include 'header.php'; ?>
<main>
<section>
    <div class="tbl">
        <p>Register a new admin user</p>
        <?php if (isset($errors)) { ?>
        <?php foreach ($errors as $error) { ?>
            <p><?php echo $error; ?></p>
        <?php } ?>
        <?php } ?>
        <?php if (true) { ?> <!--need to remember to change this -->
            <div class="">
                <form action="" method="POST">
                    <input type="hidden" name="action" value="register">
                    <div class="register">
                        <label>Username:</label><br>
                            <input type="text" id="addusername" name="username"
                                style="width: 275px;" required /><br>
                                <label>Password:</label><br>
                            <input type="text" id="addpassword" name="password"
                                style="width: 275px;" required /><br>
                                <label>Confirm Password:</label><br>
                            <input type="text" id="confirmpassword" name="confirm_password"
                                style="width: 275px;" required /><br>
                    </div><br>
                    <input class="categoryButton" type="submit" value="Register" />
                </form>
            </div><br>
        <?php } else { ?>
            <div class="addlabel">
                <p>Thank you for registering, <?php echo $_SESSION['userid']; ?>!</p>
            </div>
            <div>
                <p><a href="?action=list_inventory">Vehicle Inventory</a></p>
                <p><a href="?action=show_add_vehicle_form">Add Vehicles</a></p>
                <p><a href="?action=show_add_make_form">View/Edit Vehicle Makes</a></p>
                <p><a href="?action=show_add_type_form">View/Edit Vehicle Types</a></p>
                <p><a href="?action=show_add_class_form">View/Edit Vehicle Classes</a></p>
            </div><br>
        <?php } ?>     
</section>
</div>
</main>
<?php include '../view/footer.php'; ?>