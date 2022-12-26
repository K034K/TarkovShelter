<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<?php include("includes/delete.php"); ?>
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

//add to table link to add.php
echo '<div class="d-grid gap-2">
<a href="add.php" class="btn btn-primary" type="button">Add new receipt</a>
</div>';


//creating table
echo '<table class="table">
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

';

while ($row = mysqli_fetch_array($requst_receipt)) {
    echo '<tr>
    <th scope="row">' . $row['Created_item'] . '</th><td>';
    foreach ($requst_items_for_recepts as $row2) {
        if ($row['Receipt_id'] == $row2['Receipt_id']) {
            echo  $row2['Item_id'] . '<br>';
        }
    }
    echo '
    </td><td>' . $row['Module'] . ' lvl ' . $row['module_lvl'] . '</td>
    <td>' . $row['price'] . '</td>
    <td>' . $row['creation_time(min)'] . '</td>
    <td><a class="btn btn-secondary" href="update.php?receipt_id=' . $row['Receipt_id'] . '">Update</a></td>
    <td><input type="submit" class="btn btn-secondary" name="Delete" value="Delete" /></td>
    </tr>';
}
if(isset($_POST['Delete'])){
    $id = $_GET['receipt_id'];
    deleteFromTable($row,$id);
}

?>

<?php include("includes/footer.php"); ?>