<?php include 'header.php'; ?>
<main>

<p><?php echo $e ?></p>

<p><a href="?action=list_inventory">Vehicle Inventory</a></p>
<p><a href="../?action=show_add_vehicle_form">Add Vehicles</a></p>
<p><a href="../?action=show_add_make_form">View/Edit Vehicle Makes</a></p>
<p><a href="../?action=show_add_type_form">View/Edit Vehicle Types</a></p>
<p><a href="../?action=show_add_class_form">View/Edit Vehicle Classes</a></p>
</main>
<footer>
    <p class="copyright">
        &copy; <?php echo date("Y"); ?> Zippy's Autos
    </p>
</footer>
</body>
</html>