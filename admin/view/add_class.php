<?php include 'header.php'; ?>
<main>
<section>
    <div class="tbl">

        <table>
            <?php if(true) { ?>
                <tr class="tableHeader">
                    <td>Class</td>
                </tr>
            <?php foreach($classes as $class) {
                $classID = $class['ID'];
                $className = $class['Class'];
            ?>
            <tr>
                <td><?php echo $className; ?></td>
                <td>
                    <form action="controllers/classes.php" method="POST">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="classID" value="<?php echo $classID ?>">
                        <button class="delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <p>No classes</p>
            <?php } ?>
        </table><br>
            <div class="">
                <h2>Add New Type</h2>
                <form action="controllers/classes.php" method="POST">
                    <input type="hidden" name="action" value="add_class">
                    <div>
                        <input type="text" id="newitems" name="class"
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
    <p><a href="?action=show_add_make_form">View/Edit Vehicle Makes</a></p>
    <p><a href="?action=show_add_type_form">View/Edit Vehicle Types</a></p>
<div>
</main>
<?php include '../view/footer.php'; ?>