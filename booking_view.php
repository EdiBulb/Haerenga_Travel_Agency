<head>
    <title>ONLINE TRAVEL AGENCY SYSTEM::VIEW BOOKING</title>
    <link href="../onlinetravelagency/admin/datepicker/core.css" rel="stylesheet" type="text/css" />
    <link href="../onlinetravelagency/admin/datepicker/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
    <script src="../onlinetravelagency/admin/datepicker/jquery-1.6.2.min.js" type="text/javascript"></script>
    <script src="../onlinetravelagency/admin/datepicker/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="../onlinetravelagency/admin/datepicker/core.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../onlinetravelagency/admin/css/bar.css" type="text/css" />
    <style>
        .form-container {
            width: 80%;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h2.ph {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        fieldset {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
        }

        legend {
            font-weight: bold;
            font-size: 18px;
            color: #069;
        }

        input[type="text"],
        input[type="email"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            width: 45%;
            padding: 10px;
            background-color: #069;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #005b9a;
        }

        .form-buttons {
            text-align: center;
        }

        .form-buttons input {
            margin: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<?php require('inc_head.php'); ?>

<h2 class="ph">VIEW YOUR BOOKING</h2>
<div class="form-container">
    <?php
    include("admin/connection/connection.php");

    // Check if the booking inquiry form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Verify that input values are not empty
        if (empty($name) || empty($email)) {
            echo "Please fill in both name and email fields.";
        } else {
            // Search for booking information in the DB (including package name)
    




            $query = "
                SELECT bookings.*, Package.package_name
                FROM bookings
                JOIN Package ON bookings.package_id = Package.package_id
                WHERE bookings.name = '$name' AND bookings.email = '$email'";

            $result = mysqli_query($con, $query);

            // Check if booking information exists
            if (mysqli_num_rows(result: $result) > 0) {
                // Display booking information
                echo "<h2>Your Booking Details</h2>";
                echo "<table border='1' cellpadding='10' cellspacing='0'>
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Package</th>
                          <th>Travel Date</th>
                          <th>People</th>
                          <th>Message</th>
                      </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                          <td>{$row['name']}</td>
                          <td>{$row['email']}</td>
                          <td>{$row['phone']}</td>
                          <td>{$row['package_name']}</td>
                          <td>{$row['travel_date']}</td>
                          <td>{$row['people']}</td>
                          <td>{$row['message']}</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                // If no matching booking information is found
                echo "No bookings found for the provided name and email.";
            }
        }
    } else {
        // Display booking inquiry form
        ?>
        <form method="post" action="booking_view.php">
            <fieldset>
                <legend>Enter Your Booking Information</legend>
                <label for="name">Name:</label><br>
                <input type="text" name="name" id="name" required><br><br>

                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" required><br><br>

                <div class="form-buttons">
                    <input type="submit" value="Check Booking">
                </div>
            </fieldset>
        </form>
        <?php
    }
    // Close DB connection
    mysqli_close($con);
    ?>
    <?php include('inc_footer.php'); ?>
</div>