<?php include 'header.php'; ?>
<main>
<section>
    <div class="tbl">

        <table>
            <?php if(true) { ?>
                <tr class="tableHeader">
                    <td>Type</td>
                </tr>
            <?php foreach($types as $type) {
                $typeID = $type['ID'];
                $typeName = $type['Type'];
            ?>
            <tr>
                <td><?php echo $typeName; ?></td>
                <td>
                    <form action="controllers/types.php" method="POST">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="typeID" value="<?php echo $typeID ?>">
                        <button class="delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <p>No types</p>
            <?php } ?>
        </table><br>
            <div class="">
                <h2>Add New Type</h2>
                <form action="controllers/types.php" method="POST">
                    <input type="hidden" name="action" value="add_type">
                    <div>
                        <input type="text" id="newitems" name="type"
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
    <p><a href="?action=show_add_type_form">View/Edit Vehicle Types</a></p>
    <p><a href="?action=show_add_class_form">View/Edit Vehicle Classes</a></p>
<div>
</main>
<?php include '../view/footer.php'; ?>