<?php include("connection.php"); ?>
<?php 
function deleteFromTable($table, $id) {
    $query = "DELETE FROM $table WHERE id = $id";
    $result = mysqli_query($GLOBALS['con'], $query);
    if ($result) {
        echo "Deleted";
    } else {
        echo "Error";
    }
}

if(isset($_POST['delete'])) {
    $table = $_POST['table'];
    $id = $_POST['receipt_id'];
    deleteFromTable($table, $id);
}
?>