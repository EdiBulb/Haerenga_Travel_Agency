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

// Fetch customer details from the database
$query = "SELECT * FROM customer WHERE customer_id = $customer_id";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "No customer found with this ID.";
    exit;
}

$customer = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Details</title>
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

		table th {
			background-color: #069;
			color: #fff;
			font-size: 14px; /* Match the font size of headers */
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
        <h2>Customer Details</h2>
		<div class="button-container">
          <a href="customer_edit.php?id=<?php echo $customer['customer_id']; ?>" class="button">Edit</a>
          <a href="customer_delete.php?id=<?php echo $customer['customer_id']; ?>" class="button" onclick="return confirm('Are you sure you want to delete this customer?');">Delete</a>
		</div>
        <table>
            <tr><th>ID</th><td><?php echo htmlspecialchars($customer['customer_id']); ?></td></tr>
            <tr><th>Photo</th><td><img class="view-photo" src="<?php echo htmlspecialchars($customer['uploadimage']); ?>" alt="Customer Photo"></td></tr>
            <tr><th>Full Name</th><td><?php echo htmlspecialchars($customer['full_name']); ?></td></tr>
            <tr><th>Status</th><td><?php echo htmlspecialchars($customer['status']); ?></td></tr>
            <tr><th>Date of Birth</th><td><?php echo htmlspecialchars($customer['date_of_birth']); ?></td></tr>
            <tr><th>Place of Birth</th><td><?php echo htmlspecialchars($customer['place_of_birth']); ?></td></tr>
            <tr><th>Previous Nationality</th><td><?php echo htmlspecialchars($customer['previous_nationality']); ?></td></tr>
            <tr><th>Present Nationality</th><td><?php echo htmlspecialchars($customer['present_nationality']); ?></td></tr>
            <tr><th>Gender</th><td><?php echo htmlspecialchars($customer['sex']); ?></td></tr>
            <tr><th>Marital Status</th><td><?php echo htmlspecialchars($customer['marital_status']); ?></td></tr>
            <tr><th>Place of Issue</th><td><?php echo htmlspecialchars($customer['place_of_issue']); ?></td></tr>
            <tr><th>Qualification</th><td><?php echo htmlspecialchars($customer['qualification']); ?></td></tr>
            <tr><th>Profession</th><td><?php echo htmlspecialchars($customer['profession']); ?></td></tr>
            <tr><th>Home Address</th><td><?php echo htmlspecialchars($customer['home_address']); ?></td></tr>
            <tr><th>Telephone Number</th><td><?php echo htmlspecialchars($customer['telephone_no']); ?></td></tr>
            <tr><th>Email</th><td><?php echo htmlspecialchars($customer['email']); ?></td></tr>
            <tr><th>Purpose of Travel</th><td><?php echo htmlspecialchars($customer['purpose_of_travel']); ?></td></tr>
            <tr><th>Date of Passport Issue</th><td><?php echo htmlspecialchars($customer['date_of_passport']); ?></td></tr>
            <tr><th>Passport Number</th><td><?php echo htmlspecialchars($customer['passport_no']); ?></td></tr>
            <tr><th>Passport Expiry Date</th><td><?php echo htmlspecialchars($customer['date_of_passport_expiry']); ?></td></tr>
            <tr><th>Duration of Stay</th><td><?php echo htmlspecialchars($customer['duration_of_stay']); ?></td></tr>
            <tr><th>Date of Arrival</th><td><?php echo htmlspecialchars($customer['date_of_arrival']); ?></td></tr>
            <tr><th>Date of Departure</th><td><?php echo htmlspecialchars($customer['date_of_departure']); ?></td></tr>
            <tr><th>Mode of Payment</th><td><?php echo htmlspecialchars($customer['mode_of_payment']); ?></td></tr>
            <tr><th>Relationship</th><td><?php echo htmlspecialchars($customer['relationship']); ?></td></tr>
            <tr><th>Destination</th><td><?php echo htmlspecialchars($customer['destination']); ?></td></tr>
            <tr><th>Carriers Name</th><td><?php echo htmlspecialchars($customer['carriers_name']); ?></td></tr>
            <tr><th>Visa Number</th><td><?php echo htmlspecialchars($customer['visa_no']); ?></td></tr>
        </table>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
