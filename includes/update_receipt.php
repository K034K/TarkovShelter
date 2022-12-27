<?php include "connection.php";?>
<?php

if (isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $module = filter_var($_POST['module'], FILTER_SANITIZE_STRING);
    $module_lvl = filter_var($_POST['module_lvl'], FILTER_SANITIZE_NUMBER_INT);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
    $time = filter_var($_POST['time'], FILTER_SANITIZE_NUMBER_FLOAT);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
    $receipt_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    //update receipt
    $query = "UPDATE `Receipt` SET `Created_item` = '$name', `Module` = '$module', `module_lvl` = '$module_lvl', `price` = '$price', `creation_time(min)` = '$time', `item_quantity` = '$quantity' WHERE `Receipt`.`Receipt_id` = $receipt_id";
    $result = mysqli_query($GLOBALS['con'], $query);



    $item_name = filter_var($_POST['item_name'], FILTER_SANITIZE_STRING);
    $items_needed = filter_var($_POST['items_needed'], FILTER_SANITIZE_NUMBER_INT);
    $isTool = intval(filter_var($_POST['isTool'], FILTER_SANITIZE_NUMBER_INT));
    $query = "UPDATE `Items for Recepts` SET `Item_id` = '$item_name', `Items_Number` = '$items_needed', `Instrument` = '+$isTool' WHERE `Items for Recepts`.`Receipt_id` = $receipt_id";
    $result = mysqli_query($GLOBALS['con'], $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($GLOBALS['con']));
        exit();
    }
    header("Location: ../receipt.php");
}
?>