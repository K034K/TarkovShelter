<?php require_once("connection.php"); ?>
<?php
if (isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $module = filter_var($_POST['module'], FILTER_SANITIZE_STRING);
    $module_lvl = filter_var($_POST['module_lvl'], FILTER_SANITIZE_NUMBER_INT);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
    $time = filter_var($_POST['time'], FILTER_SANITIZE_NUMBER_FLOAT);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
    $query = "INSERT INTO `Receipt` (`Receipt_id`, `Created_item`, `Module`, `module_lvl`, `price`, `creation_time(min)`,`item_quantity`) 
VALUES (NULL, '$name', '$module', '$module_lvl', '$price', '$time', '$quantity')";
    $result = mysqli_query($GLOBALS['con'], $query);

    $query = "SELECT * FROM Receipt where Created_item = '$name'";
    $result = mysqli_query($GLOBALS['con'], $query);
    $row = mysqli_fetch_assoc($result);
    $receipt_id = $row['Receipt_id'];

    $item_name = filter_var($_POST['item_name'], FILTER_SANITIZE_STRING);
    $items_needed = filter_var($_POST['items_needed'], FILTER_SANITIZE_NUMBER_INT);
    $isTool = intval(filter_var($_POST['isTool'], FILTER_SANITIZE_NUMBER_INT));
    $query = "INSERT INTO `Items for Recepts` (`Receipt_id`, `Item_id`, `Items_Number`, `Instrument`) VALUES ($receipt_id, '$item_name', '$items_needed', '+$isTool')";
    $result = mysqli_query($GLOBALS['con'], $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($GLOBALS['con']));
        exit();
    }
    header("Location: ../receipt.php");
}
?>