<!-- Registration page -->

<?php
include("connection/connection.php");

if ($_SERVER["Request_method"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO customers (full_name, email, password) VALUES ('$full_name', '$email', '$$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful! You can now <a href = 'login.php'>login</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Registration</title>
</head>
<body>
    <h2>Customer Registration</h2>
    <form method="post" action="register.php">
        <label for="full_name">Full Name:</label><br>
        <input type="text" name="full_name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>