<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<?php
// all items from items list
$query = "SELECT * FROM items";
$result = mysqli_query($con, $query);

?>
<table class="table">
<thead>
<tr>
  <th scope="col">id</th>
  <th scope="col">Name</th>
  <th scope="col">Min_price</th>
</tr>
</thead>
<tbody>

<?php
while ($row = mysqli_fetch_array($result)) {
    echo sprintf("<tr>
    <th scope=\"row\">%s</th>
    <td>%s</td>
    <td>%s</td>
    </tr>", $row['Item_id'], $row['Item_name'], $row['min_price']);
}
?>
</tbody>
</table>


<?php include("includes/footer.php"); ?>