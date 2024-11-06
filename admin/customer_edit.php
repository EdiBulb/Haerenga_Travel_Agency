<?php
// Include database connection and session check
include('session.php');
require_once('connection/connection.php');

// Get the customer ID from the URL
$customer_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($customer_id <= 0) {
    echo "Invalid customer ID.";
    exit;
}

// Fetch customer details from the database
$query = "SELECT * FROM customer WHERE customer_id = $customer_id";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "No customer found with this ID.";
    exit;
}

$customer = mysqli_fetch_assoc($result);

// If the form is submitted, process the update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $full_name = $_POST['full_name'];
    $status = $_POST['status'];
    $date_of_birth = $_POST['date_of_birth'];
    $place_of_birth = $_POST['place_of_birth'];
    $previous_nationality = $_POST['previous_nationality'];
    $present_nationality = $_POST['present_nationality'];
    $sex = $_POST['sex'];
    $marital_status = $_POST['marital_status'];
    $place_of_issue = $_POST['place_of_issue'];
    $qualification = $_POST['qualification'];
    $profession = $_POST['profession'];
    $home_address = $_POST['home_address'];
    $telephone_no = $_POST['telephone_no'];
    $email = $_POST['email'];
    $purpose_of_travel = $_POST['purpose_of_travel'];
    $date_of_passport = $_POST['date_of_passport'];
    $passport_no = $_POST['passport_no'];
    $date_of_passport_expiry = $_POST['date_of_passport_expiry'];
    $duration_of_stay = $_POST['duration_of_stay'];
    $date_of_arrival = $_POST['date_of_arrival'];
    $date_of_departure = $_POST['date_of_departure'];
    $mode_of_payment = $_POST['mode_of_payment'];
    $relationship = $_POST['relationship'];
    $destination = $_POST['destination'];
    $carriers_name = $_POST['carriers_name'];
    $visa_no = $_POST['visa_no'];

    // Update the customer record in the database
    $update_query = "
        UPDATE customer SET
            full_name = '$full_name',
            status = '$status',
            date_of_birth = '$date_of_birth',
            place_of_birth = '$place_of_birth',
            previous_nationality = '$previous_nationality',
            present_nationality = '$present_nationality',
            sex = '$sex',
            marital_status = '$marital_status',
            place_of_issue = '$place_of_issue',
            qualification = '$qualification',
            profession = '$profession',
            home_address = '$home_address',
            telephone_no = '$telephone_no',
            email = '$email',
            purpose_of_travel = '$purpose_of_travel',
            date_of_passport = '$date_of_passport',
            passport_no = '$passport_no',
            date_of_passport_expiry = '$date_of_passport_expiry',
            duration_of_stay = '$duration_of_stay',
            date_of_arrival = '$date_of_arrival',
            date_of_departure = '$date_of_departure',
            mode_of_payment = '$mode_of_payment',
            relationship = '$relationship',
            destination = '$destination',
            carriers_name = '$carriers_name',
            visa_no = '$visa_no'
        WHERE customer_id = $customer_id
    ";

    if (mysqli_query($con, $update_query)) {
        header("Location: customer_view.php?msg=Customer updated successfully");
        exit;
    } else {
        echo "Error updating customer: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer Details</title>
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

        form input[type="text"], form input[type="date"], form input[type="email"], form select {
            width: 97%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-buttons {
            text-align: center;
        }

        .form-buttons input {
            width: 45%;
            padding: 12px;
            background-color: #069;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
        }

        .form-buttons input:hover {
            background-color: #004D99;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Edit Customer Details</h2>
        <form method="POST">
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" value="<?php echo htmlspecialchars($customer['full_name']); ?>" required>

            <label for="status">Status:</label>
            <input type="text" name="status" value="<?php echo htmlspecialchars($customer['status']); ?>" required>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" value="<?php echo htmlspecialchars($customer['date_of_birth']); ?>" required>

            <label for="place_of_birth">Place of Birth:</label>
            <input type="text" name="place_of_birth" value="<?php echo htmlspecialchars($customer['place_of_birth']); ?>" required>

            <label for="previous_nationality">Previous Nationality:</label>
            <input type="text" name="previous_nationality" value="<?php echo htmlspecialchars($customer['previous_nationality']); ?>">

            <label for="present_nationality">Present Nationality:</label>
            <input type="text" name="present_nationality" value="<?php echo htmlspecialchars($customer['present_nationality']); ?>" required>

            <label for="sex">Gender:</label>
            <input type="text" name="sex" value="<?php echo htmlspecialchars($customer['sex']); ?>" required>

            <label for="marital_status">Marital Status:</label>
            <input type="text" name="marital_status" value="<?php echo htmlspecialchars($customer['marital_status']); ?>">

            <label for="place_of_issue">Place of Issue:</label>
            <input type="text" name="place_of_issue" value="<?php echo htmlspecialchars($customer['place_of_issue']); ?>" required>

            <label for="qualification">Qualification:</label>
            <input type="text" name="qualification" value="<?php echo htmlspecialchars($customer['qualification']); ?>">

            <label for="profession">Profession:</label>
            <input type="text" name="profession" value="<?php echo htmlspecialchars($customer['profession']); ?>">

            <label for="home_address">Home Address:</label>
            <input type="text" name="home_address" value="<?php echo htmlspecialchars($customer['home_address']); ?>">

            <label for="telephone_no">Telephone Number:</label>
            <input type="text" name="telephone_no" value="<?php echo htmlspecialchars($customer['telephone_no']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>" required>

            <label for="purpose_of_travel">Purpose of Travel:</label>
            <input type="text" name="purpose_of_travel" value="<?php echo htmlspecialchars($customer['purpose_of_travel']); ?>">

            <label for="date_of_passport">Passport Issue Date:</label>
            <input type="date" name="date_of_passport" value="<?php echo htmlspecialchars($customer['date_of_passport']); ?>" required>

            <label for="passport_no">Passport Number:</label>
            <input type="text" name="passport_no" value="<?php echo htmlspecialchars($customer['passport_no']); ?>" required>

            <label for="date_of_passport_expiry">Passport Expiry Date:</label>
            <input type="date" name="date_of_passport_expiry" value="<?php echo htmlspecialchars($customer['date_of_passport_expiry']); ?>" required>

            <label for="duration_of_stay">Duration of Stay:</label>
            <input type="text" name="duration_of_stay" value="<?php echo htmlspecialchars($customer['duration_of_stay']); ?>" required>

            <label for="date_of_arrival">Date of Arrival:</label>
            <input type="date" name="date_of_arrival" value="<?php echo htmlspecialchars($customer['date_of_arrival']); ?>" required>

            <label for="date_of_departure">Date of Departure:</label>
            <input type="date" name="date_of_departure" value="<?php echo htmlspecialchars($customer['date_of_departure']); ?>" required>

            <label for="mode_of_payment">Mode of Payment:</label>
            <input type="text" name="mode_of_payment" value="<?php echo htmlspecialchars($customer['mode_of_payment']); ?>">

            <label for="relationship">Relationship:</label>
            <input type="text" name="relationship" value="<?php echo htmlspecialchars($customer['relationship']); ?>">

            <label for="destination">Destination:</label>
            <input type="text" name="destination" value="<?php echo htmlspecialchars($customer['destination']); ?>" required>

            <label for="carriers_name">Carriers Name:</label>
            <input type="text" name="carriers_name" value="<?php echo htmlspecialchars($customer['carriers_name']); ?>">

            <label for="visa_no">Visa Number:</label>
            <input type="text" name="visa_no" value="<?php echo htmlspecialchars($customer['visa_no']); ?>">

            <div class="form-buttons">
                <input type="submit" value="Update">
            </div>
        </form>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
