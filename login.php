<?php
session_start(); // Start the session

// Include the database connection
include('admin/connection/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve the user data from the database
    $sql = "SELECT * FROM customers WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Store user information in the session
            $_SESSION['customer_id'] = $row['customer_id'];
            $_SESSION['full_name'] = $row['full_name'];

            // Redirect to a protected page (e.g., customer dashboard)
            header("Location: customer_dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }

    // Close the database connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Login</title>
</head>
<body>
    <h2>Customer Login</h2>
    <form method="post" action="login.php">
        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
