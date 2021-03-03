<?php include 'header.php'; ?>
<main>
<section>
    <div class="tbl">
        <table>
            <div>
                <form>
                    <input type="hidden" name="action" value="order_by">
                    <label>Order By:</label>
                        <select name="price_or_year">
                            <option value="1">Price</option>
                            <option value="2">Year</option>
                        </select>
                    <input class="categoryButton" type="submit" value="Submit" />
                </form>
            </div>
            <?php if(true) { ?>
                <tr class="tableHeader">
                    <td>Year</td>
                    <td>Make</td>
                    <td>Model</td>
                    <td>Type</td>
                    <td>Class</td>
                    <td>Price</td>
                </tr>
            <?php foreach($vehicles as $vehicle) {
                $year = $vehicle['year'];
                $make = $vehicle['Make'];
                $model = $vehicle['model'];
                $type = $vehicle['Type'];
                $class = $vehicle['Class'];
                $price = $vehicle['price'];
            ?>
            <tr>
                <td><?php echo $year; ?></td>
                <td><?php echo $make; ?></td>
                <td><?php echo $model; ?></td>
                <td><?php echo $type; ?></td>
                <td><?php echo $class; ?></td>
                <td><?php echo $price; ?></td>
            </tr>
            <?php } ?>
        </table>
</section>
    <?php } else { ?>
        <p>There are no vehicles in inventory.</p>
    <?php } ?><br><br>
</div>
</main>
<?php include 'footer.php'; ?>