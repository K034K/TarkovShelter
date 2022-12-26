<?php include "connection.php";?>
<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $module = $_POST['module'];
    $module_lvl = $_POST['module_lvl'];
    $price = $_POST['price'];
    $time = $_POST['time'];
    $quantity = $_POST['quantity'];
    $receipt_id = $_GET['id'];
    //update receipt
    $query = "UPDATE `Receipt` SET `Created_item` = '$name', `Module` = '$module', `module_lvl` = '$module_lvl', `price` = '$price', `creation_time(min)` = '$time', `item_quantity` = '$quantity' WHERE `Receipt`.`Receipt_id` = $receipt_id";
    $result = mysqli_query($GLOBALS['con'], $query);



    $item_name = $_POST['Items'];
    $items_needed = $_POST['items_needed'];
    $isTool = intval($_POST['isTool']);
    $query = "UPDATE `Items for Recepts` SET `Item_id` = '$item_name', `Items_Number` = '$items_needed', `Instrument` = '+$isTool' WHERE `Items for Recepts`.`Receipt_id` = $receipt_id";
    $result = mysqli_query($GLOBALS['con'], $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($GLOBALS['con']));
        exit();
    }
    header("Location: ../receipt.php");
}
?>