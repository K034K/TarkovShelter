<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<?php
// all items from receipt list
$query = "SELECT * FROM Items";
$result_items = mysqli_query($GLOBALS['con'], $query);

$update_id = $_GET['receipt_id'];

$query = "SELECT * FROM Receipt where Receipt_id = $update_id";
$result_receipt = mysqli_query($GLOBALS['con'], $query);
$row1 = mysqli_fetch_assoc($result_receipt);


$query = "SELECT * FROM `Items for Recepts` where Receipt_id = $update_id";
$result_items_for_receipt = mysqli_query($GLOBALS['con'], $query);
$row2 = mysqli_fetch_assoc($result_items_for_receipt);

if (!$result_items) {
    printf("Error: %s\n", mysqli_error($GLOBALS['con']));
    exit();
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="includes/update_receipt.php?id=<?php echo $update_id ?>" method="post">

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <select name="name" id="selectMenuReceipt" class="form-select">
                        <option value="0">Select items</option>
                        <?php
                        foreach ($result_items as $row) {
                            ?>
                            <option value="<?php echo $row['Item_name']; ?>"><?php echo $row['Item_name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- script to make selected item show-->

                <script>
                    let select = document.getElementById('selectMenuReceipt');
                    let name = "<?php echo $row1['Created_item'] ?>";

                    for (let i = 0; i < select.options.length; i++) {
                        if (select.options[i].value === name) {
                            select.options[i].selected = true;
                            break;
                        }
                    }
                </script>

                <div class="form-group">
                    <label for="exampleInputEmail1">Item created</label>
                    <input type="text" class="form-control" name="quantity" value="<?php echo $row1["item_quantity"] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Item</label>

                    <select name="Items" id="selectMenuItems" class="form-select">
                        <option value="0">Select items</option>
                        <?php
                        foreach ($result_items as $row) {
                            ?>
                            <option value="<?php echo $row['Item_name']; ?>"><?php echo $row['Item_name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label for="exampleInputPassword1">Items needed for craft</label>
                    <input type="text" class="form-control" name="items_needed" id="exampleInputPassword1"
                           placeholder="Enter items needed"
                    value="<?php echo $row2["Items_Number"]?>">
                    <label for="exampleInputPassword1">IsTool</label>
                    <input type="checkbox" name="isTool" id="exampleInputPassword1"
                           placeholder="Enter isTool" class="form-check-input"
                    >
                </div>
                <script>
                    let select1 = document.getElementById('selectMenuItems');
                    let name1 = "<?php echo $row2['Item_id'] ?>";

                    for (let i = 0; i < select1.options.length; i++) {
                        if (select1.options[i].value === name1) {
                            select1.options[i].selected = true;
                            break;
                        }
                    }
                </script>

                <div class="form-group">
                    <label for="exampleInputPassword1">Module</label>
                    <input type="text" class="form-control" name="module" id="exampleInputPassword1"
                           placeholder="Enter module" value="<?php echo $row1['Module'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Module lvl</label>
                    <input type="text" class="form-control" name="module_lvl" id="exampleInputPassword1"
                           placeholder="Enter module lvl"
                           value="<?php echo $row1['module_lvl'] ?>">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" name="price" id="exampleInputPassword1"
                           placeholder="Enter price" value="<?php echo $row1['price'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Time</label>
                    <input type="text" class="form-control" name="time" id="exampleInputPassword1"
                           placeholder="Enter time" value="<?php echo $row1['creation_time(min)'] ?>">
                </div>

                <input type="submit" class="btn btn-primary " onclick="addReceipt()" name="submit" value="Update">

            </form>
        </div>
    </div>
</div>

<script>

    function addReceipt() {

    }
</script>
<?php

?>


<?php include("includes/footer.php"); ?>


