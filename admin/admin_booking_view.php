<?php
// admin_booking_view.php

// 1. Include header and DB connection files
include('header.php');
include('connection/connection.php');

// 2. Retrieve booking information from the bookings table (linked to package)
$sql = "
    SELECT bookings.*, Package.package_name 
    FROM bookings 
    JOIN Package ON bookings.package_id = Package.package_id 
    ORDER BY bookings.travel_date DESC";  // Sort by travel date
$result = mysqli_query($con, $sql);
?>

<head>
    <title>Admin - View Bookings</title>
    <link rel="stylesheet" href="css/bar.css" type="text/css" />
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
        }

        .table-container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <h2>View All Bookings</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Package</th>
                <th>Travel Date</th>
                <th>People</th>
                <th>Message</th>
            </tr>

            <?php
            // 3. If there are results, display them in a table
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['booking_id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['package_name'] . "</td>";  // 패키지 이름 출력
                    echo "<td>" . $row['travel_date'] . "</td>";
                    echo "<td>" . $row['people'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No bookings found.</td></tr>";
            }

            // 4. Close the database connection
            mysqli_close($con);
            ?>
        </table>
    </div>
</body>

<?php include('footer.php'); ?>