<?php require_once("connection.php"); ?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $module = $_POST['module'];
    $module_lvl = $_POST['module_lvl'];
    $price = $_POST['price'];
    $time = $_POST['time'];
    $quantity = $_POST['quantity'];
    $query = "INSERT INTO `Receipt` (`Receipt_id`, `Created_item`, `Module`, `module_lvl`, `price`, `creation_time(min)`,`item_quantity`) 
VALUES (NULL, '$name', '$module', '$module_lvl', '$price', '$time', '$quantity')";
    $result = mysqli_query($GLOBALS['con'], $query);

    $query = "SELECT * FROM Receipt where Created_item = '$name'";
    $result = mysqli_query($GLOBALS['con'], $query);
    $row = mysqli_fetch_assoc($result);
    $receipt_id = $row['Receipt_id'];

    $item_name = $_POST['Items'];
    $items_needed = $_POST['items_needed'];
    $isTool = intval($_POST['isTool']);
    $query = "INSERT INTO `Items for Recepts` (`Receipt_id`, `Item_id`, `Items_Number`, `Instrument`) VALUES ($receipt_id, '$item_name', '$items_needed', '+$isTool')";
    $result = mysqli_query($GLOBALS['con'], $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($GLOBALS['con']));
        exit();
    }
    header("Location: ../receipt.php");
}
?>