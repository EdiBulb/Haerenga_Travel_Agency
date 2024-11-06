<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Collect booking data entered by the user
    $name = $_POST['name'];          // name
    $email = $_POST['email'];        // email
    $phone = $_POST['phone'];        // phone
    $package_id = $_POST['package_id'];  // // Selected travel package (changed from previous destination)
    $date = $_POST['date'];          // date 
    $people = $_POST['people'];      // people
    $message = $_POST['message'];    // request

    // 2. Validate input data
    if (empty($name) || empty($email) || empty($phone) || empty($package_id) || empty($date) || empty($people)) {
        echo "All fields are required!";
        exit;
    }

    // 3. Connect to the database (include DB configuration file)
    include("admin/connection/connection.php");

    // 4. Create SQL query (to store booking information)
    $sql = "INSERT INTO bookings (name, email, phone, package_id, travel_date, people, message) 
            VALUES ('$name', '$email', '$phone', '$package_id', '$date', '$people', '$message')";

    // 5. Execute query and check results
    if (mysqli_query($con, $sql)) {
        echo "Your booking has been successfully submitted!";  // Success message

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);   // Error message
    }

    // 6. Close database connection
    mysqli_close($con);
}
?>