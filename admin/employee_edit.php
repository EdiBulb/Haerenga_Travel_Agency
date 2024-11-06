<?php
// Include database connection and session check
include('session.php');
require_once('connection/connection.php');

// Get the employee ID from the URL
$emp_id = isset($_GET['emp_id']) ? intval($_GET['emp_id']) : 0;

if ($emp_id <= 0) {
    echo "Invalid employee ID.";
    exit;
}

// Fetch employee details from the database
$query = "SELECT * FROM employee WHERE emp_id = $emp_id";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "No employee found with this ID.";
    exit;
}

$employee = mysqli_fetch_assoc($result);

// If the form is submitted, process the update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $emp_name = $_POST['emp_name'];
    $emp_contact = $_POST['emp_contact'];
    $emp_address = $_POST['emp_address'];
    $emp_reference = $_POST['emp_reference'];
    $emp_email = $_POST['emp_email'];
    $emp_join = $_POST['emp_join'];
    $emp_close = $_POST['emp_close'];

    // Update the employee record in the database
    $update_query = "
        UPDATE employee SET
            emp_name = '$emp_name',
            emp_contact = '$emp_contact',
            emp_address = '$emp_address',
            emp_reference = '$emp_reference',
            emp_email = '$emp_email',
            emp_join = '$emp_join',
            emp_close = '$emp_close'
        WHERE emp_id = $emp_id
    ";

    if (mysqli_query($con, $update_query)) {
        header("Location: employee_view.php?msg=Employee updated successfully");
        exit;
    } else {
        echo "Error updating employee: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee Details</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form input[type="text"], form input[type="date"], form input[type="email"], form select {
            width: 97%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-buttons {
            text-align: center;
        }

        .form-buttons input {
            width: 45%;
            padding: 12px;
            background-color: #069;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
        }

        .form-buttons input:hover {
            background-color: #004D99;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Edit Employee Details</h2>
        <form method="POST">
            <input type="hidden" name="emp_id" value="<?php echo htmlspecialchars($employee['emp_id']); ?>" />

            <label for="emp_name">Full Name:</label>
            <input type="text" name="emp_name" value="<?php echo htmlspecialchars($employee['emp_name']); ?>" required>

            <label for="emp_contact">Employee Contact:</label>
            <input type="text" name="emp_contact" value="<?php echo htmlspecialchars($employee['emp_contact']); ?>" required>

            <label for="emp_address">Address:</label>
            <input type="text" name="emp_address" value="<?php echo htmlspecialchars($employee['emp_address']); ?>" required>

            <label for="emp_reference">Reference:</label>
            <input type="text" name="emp_reference" value="<?php echo htmlspecialchars($employee['emp_reference']); ?>" required>

            <label for="emp_email">Email:</label>
            <input type="email" name="emp_email" value="<?php echo htmlspecialchars($employee['emp_email']); ?>" required>

            <label for="emp_join">Join Date:</label>
            <input type="date" name="emp_join" value="<?php echo htmlspecialchars($employee['emp_join']); ?>" required>

            <label for="emp_close">Employee Leaving Date:</label>
            <input type="date" name="emp_close" value="<?php echo htmlspecialchars($employee['emp_close']); ?>">

            <div class="form-buttons">
                <input type="submit" value="Update">
                <a href="employee_view.php"><input type="button" value="Back to List"></a>
            </div>
        </form>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
