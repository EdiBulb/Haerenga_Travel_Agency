<?php
// Include database connection and session check
include('session.php');
require_once('connection/connection.php');

// Fetch all customers from the database
$query = "SELECT * FROM customer ORDER BY customer_id ASC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Customers</title>
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

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    table th, table td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: left;
    }

    table th {
      background-color: #069;
      color: #fff;
    }

    .view-photo {
      width: 50px;
      height: 50px;
      border-radius: 5px;
    }
	
	/* Action column link styling */
	table a {
	  text-decoration: none; /* Remove underline */
	  color: #069;
	  font-weight: bold;
	}

	table a:hover {
	  color: #004D99;
	  text-decoration: underline; /* underline on hover */
	}
  </style>
</head>
<body>
  <?php include('header.php'); ?> <!-- Include header for consistent design -->

  <div class="container">
    <h2>Customer List</h2>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>Full Name</th>
          <th>Status</th>
          <th>Date of Birth</th>
          <th>Nationality</th>
          <th>Contact</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo htmlspecialchars($row['customer_id']); ?></td>
            <td><img class="view-photo" src="<?php echo htmlspecialchars($row['uploadimage']); ?>" alt="Customer Photo"></td>
            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td><?php echo htmlspecialchars($row['date_of_birth']); ?></td>
            <td><?php echo htmlspecialchars($row['present_nationality']); ?></td>
            <td><?php echo htmlspecialchars($row['telephone_no']); ?></td>
            <td>
              <a href="customer_details.php?id=<?php echo $row['customer_id']; ?>">View Details</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <?php include('footer.php'); ?> <!-- Include footer for consistent design -->
</body>
</html>
