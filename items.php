<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<?php
// all items from items list
$query = "SELECT * FROM items";
$result = mysqli_query($con, $query);
echo '<table class="table">
<thead>
<tr>
  <th scope="col">id</th>
  <th scope="col">Name</th>
  <th scope="col">Min_price</th>
</tr>
</thead>
<tbody>

';

while ($row = mysqli_fetch_array($result)) {
    echo '<tr>
    <th scope="row">' . $row['Item_id'] . '</th>
    <td>' . $row['Item_name'] . '</td>
    <td>' . $row['min_price'] . '</td>
    </tr>';
}
echo '</tbody>
</table>';
?>

<?php include("includes/footer.php"); ?>