<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Booking | Travel Agency</title>
    <?php require('inc_head.php'); ?>
</head>

<?php
include("admin/connection/connection.php");

$sql = "SELECT package_id, package_name FROM Package";
$result = mysqli_query($con, $sql);
?>

<body>

    <div class="wrapper">

        <?php require('inc_top.php'); ?>
        <?php include('inc_menu.php'); ?>

        <div class="content">
            <div class="page_headings">
                <div class="left">&nbsp;</div>
                <div class="right">
                    <h1>Book Your Trip</h1>
                    <h2>Plan and book your next trip with us!</h2>
                </div>
            </div>

            <?php include("inc_left.php"); ?>

            <div class="right">
                <form enctype="multipart/form-data" method="post" action="process_booking.php" class="booking_form">
                    <ul>
                        <li>
                            <label for="name">Full Name:</label>
                            <input type="text" id="name" name="name" required />
                        </li>
                        <li>
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" required />
                        </li>
                        <li>
                            <label for="phone">Phone Number:</label>
                            <input type="text" id="phone" name="phone" required />
                        </li>
                        <li>
                            <label for="package">Select Package:</label>
                            <select name="package_id" id="package" required>
                                <option value="">-- Select a Package --</option>
                                <?php
                                // Display data retrieved from the Package table in a dropdown
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['package_id'] . '">' . $row['package_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="date">Travel Date:</label>
                            <input type="date" id="date" name="date" required />
                        </li>
                        <li>
                            <label for="people">Number of People:</label>
                            <input type="number" id="people" name="people" required />
                        </li>
                        <li>
                            <label for="message">Additional Requests:</label>
                            <textarea id="message" name="message" rows="4"></textarea>
                        </li>
                        <li>
                            <input type="submit" value="Submit Booking" />
                        </li>
                    </ul>
                </form>
            </div>
        </div>

        <?php include('inc_footer.php'); ?>
    </div>

</body>

</html>