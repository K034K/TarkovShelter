<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<?php
// all items from receipt list
$query = "SELECT * FROM Items";
$result = mysqli_query($con, $query);

//adding new receipt div

if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}


echo '<div class="container">
<div class="row">
<div class="col-md-6">
<form action="includes/add_receipt.php" method="post">
<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Items needed</label>
';
<select name="Items">
    <option value="0">Select items</option>
<?
$result = mysql_query('select `item_id`, `item_name` from `Items`');
while($row = mysql_fetch_assoc($result)){
    ?>
    <option value="<?=$row['item_id']?>"><?=$row['item_name']?></option>
    <?
}
?>
</select>
</div>';
echo '</div>
<div class="form-group">
<label for="exampleInputPassword1">Module</label>
<input type="text" class="form-control" name="module" id="exampleInputPassword1" placeholder="Enter module">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Module lvl</label>
<input type="text" class="form-control" name="module_lvl" id="exampleInputPassword1" placeholder="Enter module lvl">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Price</label>
<input type="text" class="form-control" name="price" id="exampleInputPassword1" placeholder="Enter price">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Time</label>
<input type="text" class="form-control" name="time" id="exampleInputPassword1" placeholder="Enter time">
</div>
<button type="submit" class="btn btn-primary ">Submit</button>
</form>
</div>
</div>
</div>';

?>
<?php include("includes/footer.php"); ?>
