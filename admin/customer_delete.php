<?php
// Include database connection and session check
include('session.php');
require_once('connection/connection.php');

// Get the customer ID from the URL
$customer_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($customer_id <= 0) {
    echo "Invalid customer ID.";
    exit;
}

// Delete the customer from the database
$query = "DELETE FROM customer WHERE customer_id = $customer_id";
$result = mysqli_query($con, $query);

if ($result) {
    header("Location: customer_view.php?msg=Customer deleted successfully");
} else {
    echo "Failed to delete the customer.";
}
?>
