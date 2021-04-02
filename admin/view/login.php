
<main>
<section>
    <div class="tbl">
        <p>Please fill in your credentials to login.</p>
        <?php if (true) { ?> <!--need to remember to change this -->
            <div class="">
                <form action="controllers/administrators.php" method="GET">
                    <input type="hidden" name="action" value="login">
                    <div class="register">
                        <label>Username:</label><br>
                            <input type="text" id="addusername" name="username"
                                style="width: 275px;" required /><br>
                                <label>Password:</label><br>
                            <input type="text" id="addpassword" name="password"
                                style="width: 275px;" required /><br>
                    </div><br>
                    <input class="categoryButton" type="submit" value="Sign in" />
                </form>
            </div><br>
        <?php } else { ?>
            <div class="addlabel">
                <p></p>
            </div>
        <?php } ?>     
</section>
</div>
</main>
