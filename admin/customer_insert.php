<?php
require_once('connection/connection.php');
include('session.php');

// Check if form is submitted
if (isset($_POST['customerform'])) {
    // Handle the uploaded image
    $image = $_FILES['uploadimage']['name'];
    $file_size = $_FILES['uploadimage']['size'];
    $tmp_file_name = $_FILES['uploadimage']['tmp_name'];

    $uploaddir = 'user/' . $image;
    $uploadimage = $uploaddir; // Specify the full path for the file

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($tmp_file_name, $uploadimage)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error occurred during file upload.";
    }

    // Get all form fields
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
    $inserted_by = $_SESSION['username']; // Assuming you have stored the username in session

    // Insert into the database
    $sql = "INSERT INTO customer (uploadimage, full_name, status, date_of_birth, place_of_birth, previous_nationality, present_nationality, sex, marital_status, place_of_issue, qualification, profession, home_address, telephone_no, purpose_of_travel, date_of_passport, passport_no, date_of_passport_expiry, duration_of_stay, date_of_arrival, date_of_departure, mode_of_payment, relationship, destination, carriers_name, visa_no, inserted_by) 
            VALUES ('$uploadimage', '$full_name', '$status', '$date_of_birth', '$place_of_birth', '$previous_nationality', '$present_nationality', '$sex', '$marital_status', '$place_of_issue', '$qualification', '$profession', '$home_address', '$telephone_no', '$purpose_of_travel', '$date_of_passport', '$passport_no', '$date_of_passport_expiry', '$duration_of_stay', '$date_of_arrival', '$date_of_departure', '$mode_of_payment', '$relationship', '$destination', '$carriers_name', '$visa_no', '$inserted_by')";

    $result = mysqli_query($con, $sql);

    // Check if the insertion was successful
    if ($result) {
        header('Location: customer_view.php?msg=Successfully inserted');
    } else {
        echo "Error: Data not inserted.";
    }
}
?>
