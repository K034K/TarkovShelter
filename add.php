<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<?php
// all items from receipt list
$query = "SELECT * FROM Items";
$result = mysqli_query($GLOBALS['con'], $query);

//adding new receipt div

if (!$result) {
    printf("Error: %s\n", mysqli_error($GLOBALS['con']));
    exit();
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="includes/add_receipt.php" method="post">

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <select name="name" id="selectMenu" class="form-select">
                        <option value="0">Select items</option>
                        <?php
                        foreach ($result as $row) {
                            ?>
                            <option value="<?php echo $row['Item_name']; ?>"><?php echo $row['Item_name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Item created</label>
                    <input type="text" class="form-control" name="quantity" id="exampleInputEmail1"
                           aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Item</label>

                    <select name="Items" id="selectMenu" class="form-select">
                        <option value="0">Select items</option>
                        <?php
                        foreach ($result as $row) {
                            ?>
                            <option value="<?php echo $row['Item_name']; ?>"><?php echo $row['Item_name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label for="exampleInputPassword1">Items needed for craft</label>
                    <input type="text" class="form-control" name="items_needed" id="exampleInputPassword1"
                           placeholder="Enter items needed">
                    <label for="exampleInputPassword1">IsTool</label>
                    <input type="checkbox" name="isTool" id="exampleInputPassword1"
                           placeholder="Enter isTool">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Module</label>
                    <input type="text" class="form-control" name="module" id="exampleInputPassword1"
                           placeholder="Enter module">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Module lvl</label>
                    <input type="text" class="form-control" name="module_lvl" id="exampleInputPassword1"
                           placeholder="Enter module lvl">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" name="price" id="exampleInputPassword1"
                           placeholder="Enter price">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Time</label>
                    <input type="text" class="form-control" name="time" id="exampleInputPassword1"
                           placeholder="Enter time">
                </div>

                <input type="submit" class="btn btn-primary " onclick="addReceipt()" name="submit" value="Submit">

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
