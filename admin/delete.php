<?php
require_once('connection/connection.php');
?>

<?php
// Delete record from the customer table
if (isset($_GET['customer_id'])) {
    $c_id = $_GET['customer_id'];
    $sql = "DELETE FROM customer WHERE customer_id = '$c_id'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($result) {
        // No need to delete related records in non-existent tables like 'document'
        header("location:customer_view.php");
    } else {
        echo "Record is not deleted";
    }
}
?>

<?php
// Delete record from the employee table
if (isset($_REQUEST['action']) && $_REQUEST['action'] == "Delete") {
    $emp_id = $_GET['emp_id'];
    $sql = "DELETE FROM employee WHERE emp_id = '$emp_id'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));

    header("location:employee_view.php?msg=Deleted");
}
?>

<?php
// Delete record from the admin table
if (isset($_REQUEST['action']) && $_REQUEST['action'] == "Deleteadmin") {
    $user_id = $_GET['user_id'];
    $sql = "DELETE FROM admin WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));

    header("location:show_all_admin.php?msg=Deleted");
}
?>
