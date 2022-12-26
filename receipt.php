<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<?php
// all items from receipt list
$query = "SELECT * FROM Receipt";
$requst_receipt = mysqli_query($con, $query);
$subquery = "SELECT * FROM `Items for Recepts`";
$requst_items_for_recepts = mysqli_query($con, $subquery);
if (!$requst_items_for_recepts) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

?>
    <!--add to table link to add.php-->
    <div class="d-grid gap-2">
        <a href="add.php" class="btn btn-primary" type="button">Add new receipt</a>
    </div>

    <!-- table with all receipts -->
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Items needed</th>
            <th scope="col">Module</th>
            <th scope="col">Price</th>
            <th scope="col">time</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>


        <?php
        while ($row = mysqli_fetch_array($requst_receipt)) {
            ?>
            <tr>
                <th scope="row"><?php echo $row['Created_item'] ?> </th>
                <td>
                    <?php
                    foreach ($requst_items_for_recepts as $row2) {
                        if ($row['Receipt_id'] == $row2['Receipt_id']) {

                            echo $row2['Item_id'] ?> <br> <?php
                        }
                    }
                    ?>

                </td>
                <td>
                    <?php echo $row['Module'] ?> lvl <?php echo $row['module_lvl'] ?>
                </td>
                <td> <?php echo $row['price'] ?></td>
                <td><?php echo $row['creation_time(min)'] ?></td>
                <td><a class="btn btn-secondary" href="update.php?receipt_id=' . $row['Receipt_id'] . '">Update</a></td>
                <td>
                    <input type="button" class="btn btn-danger" value="Delete"
                           onclick="delete_receipt(<?php echo $row['Receipt_id'] ?>)">


                </td>
                </form>
                </td>

            </tr>
        <?php } ?>


        </tbody>
    </table>

    <script>
        function delete_receipt(id) {
            if (confirm("Are you sure you want to delete this?")) {
                window.location.href = 'receipt.php?delete_id=' + id;
            }
        }
    </script>
<?php
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM Receipt WHERE Receipt_id = $delete_id";
    $delete_query2 = "DELETE FROM `Items for Recepts` WHERE Receipt_id = $delete_id";
    $delete_result2 = mysqli_query($GLOBALS["con"], $delete_query2);
    $delete_result = mysqli_query($GLOBALS["con"], $delete_query);
        echo "<script>window.location.href='receipt.php'</script>";
    die();
}
?>


<?php include("includes/footer.php"); ?>