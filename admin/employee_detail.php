<?php 
// Include the database connection and session check
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Details</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <style>
        .container {
            width: 70%; /* Reduce width for compact layout */
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 22px; /* Slightly reduce heading size */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th {
            padding: 8px;
            width: 30%; /* Reduce the width of header cells */
            border: 1px solid #ddd;
            text-align: left;
            background-color: #069;
            color: #fff;
            font-size: 14px; /* Match the font size of headers */
        }

        table td {
            padding: 8px;
            width: 70%; /* Increase the width of data cells */
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        .view-photo {
            width: 80px;
            height: 80px;
            border-radius: 5px;
        }

        .button {
            padding: 8px 15px;
            margin: 5px;
            border: none;
            color: #fff;
            background-color: #069;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-size: 12px;
            font-weight: normal;
        }
        
        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .button:hover {
            background-color: #004D99;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Employee Details</h2>
        <div class="button-container">
            <a href="employee_edit.php?emp_id=<?php echo $employee['emp_id']; ?>" class="button">Edit</a>
            <a href="delete.php?action=Delete&emp_id=<?php echo $employee['emp_id']; ?>" class="button" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
        </div>
        <table>
            <tr><th>ID</th><td><?php echo htmlspecialchars($employee['emp_id']); ?></td></tr>
            <tr><th>Photo</th><td><img class="view-photo" src="<?php echo htmlspecialchars($employee['emp_picture']); ?>" alt="Employee Photo"></td></tr>
            <tr><th>Name</th><td><?php echo htmlspecialchars($employee['emp_name']); ?></td></tr>
            <tr><th>Contact</th><td><?php echo htmlspecialchars($employee['emp_contact']); ?></td></tr>
            <tr><th>Address</th><td><?php echo htmlspecialchars($employee['emp_address']); ?></td></tr>
            <tr><th>Reference</th><td><?php echo htmlspecialchars($employee['emp_reference']); ?></td></tr>
            <tr><th>Email</th><td><?php echo htmlspecialchars($employee['emp_email']); ?></td></tr>
            <tr><th>Join Date</th><td><?php echo htmlspecialchars($employee['emp_join']); ?></td></tr>
            <tr><th>Leaving Date</th><td><?php echo htmlspecialchars($employee['emp_close']); ?></td></tr>
        </table>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
