<?php include("includes/connection.php"); ?>
<?php 
function deleteFromTable($table, $id) {
    $query = "DELETE FROM $table WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "Deleted";
    } else {
        echo "Error";
    }
}
?>