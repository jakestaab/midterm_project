<?php include 'header.php'; ?>
<main>
<section>
    <div class="tbl">
        <?php if (!isset($firstname)) { ?>
            <div class="">
                <form action="index.php" method="GET">
                    <input type="hidden" name="action" value="register">
                    <div class="register">
                        <label>Please enter your firstname:</label><br>
                            <input type="text" id="addfirstname" name="firstname"
                                placeholder="Enter first name" style="width: 275px;" required /><br>
                    </div><br>
                    <input class="categoryButton" type="submit" value="Register" />
                </form>
            </div><br>
        <?php } else { ?>
            <div class="addlabel">
                <p>Thank you for registering, <?php echo $_SESSION['userid']; ?>!</p>
            </div>
            <div>
                <a href="?action=list_inventory">Click here</a>
                <p style="display:inline;">to view our vehicle list</p>
            </div><br>
        <?php } ?>
            
</section>

</div>
</main>
<?php include 'footer.php'; ?>
