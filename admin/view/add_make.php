<?php include 'header.php'; ?>
<main>
<section>
    <div class="tbl">

        <table>
            <?php if(true) { ?>
                <tr class="tableHeader">
                    <td>Make</td>
                </tr>
            <?php foreach($makes as $make) {
                $makeID = $make['ID'];
                $makeName = $make['Make'];
            ?>
            <tr>
                <td><?php echo $makeName; ?></td>
                <td>
                    <form action="controllers/makes.php" method="POST">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name="makeID" value="<?php echo $makeID ?>">
                        <button class="delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <p>No makes</p>
            <?php } ?>
        </table><br>
            <div class="">
                <h2>Add New Make</h2>
                <form action="controllers/makes.php" method="POST">
                    <input type="hidden" name="action" value="add_make">
                    <div>
                        <input type="text" id="newitems" name="make"
                            placeholder="Name" style="width: 275px;" required /><br>
                    </div>
                    <input class="categoryButton" type="submit" value="Submit" />
                </form>
            </div>

</section>

</div>
<div class="tbl">  
    <p><a href="?action=list_inventory">Vehicle Inventory</a></p>
    <p><a href="?action=show_add_vehicle_form">Add Vehicles</a></p>
    <p><a href="?action=show_types_form">View/Edit Vehicle Types</a></p>
    <p><a href="?action=show_classes_form">View/Edit Vehicle Classes</a></p>
<div>
</main>
<?php include '../view/footer.php'; ?>