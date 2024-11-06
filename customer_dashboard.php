<?php
session_start(); // start the session

if (isset($_SESSION["customer_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard</title>
</head>

<body>
    <h2>Welcome, <?php echo $_SESSION['full_name']; ?></h2>
    <p>This is your dashboard</p>
    <a href="logout.php">Logout</a>
</body>

</html>