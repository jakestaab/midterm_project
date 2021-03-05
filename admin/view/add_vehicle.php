<?php include 'header.php'; ?>
<main>
<section>
    <div class="tbl">

            <div class="">
                <form action="controllers/vehicles.php" method="POST">
                    <input type="hidden" name="action" value="add_vehicle">
                    <label>Make</label>
                    <select name="make_id">
                        <?php foreach ($makes as $make) { ?>
                            <option value="<?php echo $make['ID']; ?>">
                                <?php echo $make['Make']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label>Type</label>
                    <select name="type_id">
                        <?php foreach ($types as $type) { ?>
                            <option value="<?php echo $type['ID']; ?>">
                                <?php echo $type['Type']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label>Class</label>
                    <select name="class_id">
                        <?php foreach ($classes as $class) { ?>
                            <option value="<?php echo $class['ID']; ?>">
                                <?php echo $class['Class']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <div>
                        <input type="text" id="newitems" name="year"
                            placeholder="Year" style="width: 275px;" required /><br>
                        <input type="text" id="newitems" name="model"
                            placeholder="Model" style="width: 275px;" required /><br>
                        <input type="text" id="newitems" name="price"
                            placeholder="Price" style="width: 275px;" required />
                    </div>
                    <input class="categoryButton" type="submit" value="Submit" />
                </form>
            </div>

</section>

</div>
<div class="tbl">  
    <p><a href="?action=list_inventory">Vehicle Inventory</a></p>
    <p><a href="?action=show_makes_form">View/Edit Vehicle Makes</a></p>
    <p><a href="?action=show_types_form">View/Edit Vehicle Types</a></p>
    <p><a href="?action=show_classes_form">View/Edit Vehicle Classes</a></p>
<div>
</main>
<?php include '../view/footer.php'; ?>