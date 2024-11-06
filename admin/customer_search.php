<?php
// Include database connection and session check
include('session.php');
require_once('connection/connection.php');

// Check if the search form is submitted
$search_results = [];
if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($con, $_POST['search_term']);
    
    // Search query to look for a customer by name, phone number, or email
    $search_query = "
        SELECT * FROM customer 
        WHERE 
            full_name LIKE '%$search_term%' OR 
            telephone_no LIKE '%$search_term%' OR 
            email LIKE '%$search_term%'
    ";
    $result = mysqli_query($con, $search_query);
    
    // Fetch search results
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $search_results[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Customer</title>
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

        .search-form input[type="text"] {
            width: 70%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #069;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
        <h2>Search Customer</h2>

        <form class="search-form" method="POST" action="">
            <input type="text" name="search_term" placeholder="Enter Name, Phone Number, or Email" required>
            <input type="submit" name="search" value="Search">
        </form>

        <?php if (!empty($search_results)) { ?>
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
                    <?php foreach ($search_results as $customer) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($customer['customer_id']); ?></td>
                            <td><img class="view-photo" src="<?php echo htmlspecialchars($customer['uploadimage']); ?>" alt="Customer Photo"></td>
                            <td><?php echo htmlspecialchars($customer['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($customer['status']); ?></td>
                            <td><?php echo htmlspecialchars($customer['date_of_birth']); ?></td>
                            <td><?php echo htmlspecialchars($customer['present_nationality']); ?></td>
                            <td><?php echo htmlspecialchars($customer['telephone_no']); ?></td>
                            <td>
                                <a href="customer_details.php?id=<?php echo $customer['customer_id']; ?>">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } elseif (isset($_POST['search'])) { ?>
            <p>No results found for "<?php echo htmlspecialchars($_POST['search_term']); ?>"</p>
        <?php } ?>
    </div>

    <?php include('footer.php'); ?> <!-- Include footer for consistent design -->
</body>
</html>
