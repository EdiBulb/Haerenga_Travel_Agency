<?php
// Include database connection and session check
include('session.php');
require_once('connection/connection.php');

// Fetch all employees from the database
$query = "SELECT * FROM employee ORDER BY emp_id ASC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Employees</title>
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
    <h2>Employee List</h2>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>Full Name</th>
          <th>Contact</th>
          <th>Address</th>
          <th>Email</th>
          <th>Join Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo htmlspecialchars($row['emp_id']); ?></td>
            <td>
              <img class="view-photo" src="<?php echo htmlspecialchars($row['emp_picture']); ?>" alt="Employee Photo">
            </td>
            <td><?php echo htmlspecialchars($row['emp_name']); ?></td>
            <td><?php echo htmlspecialchars($row['emp_contact']); ?></td>
            <td><?php echo htmlspecialchars($row['emp_address']); ?></td>
            <td><?php echo htmlspecialchars($row['emp_email']); ?></td>
            <td><?php echo htmlspecialchars($row['emp_join']); ?></td>
            <td>
              <a href="employee_detail.php?emp_id=<?php echo $row['emp_id']; ?>">View Details</a> | 
              <a href="employee_edit.php?emp_id=<?php echo $row['emp_id']; ?>">Edit</a> | 
              <a href="delete.php?action=Delete&emp_id=<?php echo $row['emp_id']; ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <?php include('footer.php'); ?> <!-- Include footer for consistent design -->
</body>
</html>
