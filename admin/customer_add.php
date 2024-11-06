<?php include('header.php'); ?> <!-- Include the header.php to maintain consistency -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Customer</title>
  <link href="css/styles.css" rel="stylesheet" type="text/css" />
  <style>
    .form-container {
      width: 70%; /* Control the form container width */
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }
	
    h2.ph {
      text-align: center;
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
    }

	.ph2 a {
      color: #fff;
      text-decoration: none;
      background-color: #069;
      padding: 5px 10px;
      border-radius: 5px;
      display: inline-block;
    }


    .ph2 a:hover {
      background-color: #004D99;
    }

    fieldset {
      margin-bottom: 20px;
      padding: 20px;
      border: 1px solid #E0E0E0;
      border-radius: 10px;
    }

    legend {
      font-weight: bold;
      font-size: 18px;
      color: #069;
    }

    label.required::after {
      content: " *";
      color: red;
      font-weight: bold;
    }

	input[type="text"],
    input[type="date"],
    input[type="file"],
	input[type="email"] {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 15px;
    }

    input[type="submit"],
    input[type="reset"] {
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

    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #004D99;
    }

    .form-buttons {
      text-align: center;
    }

    table {
      width: 100%;
      margin: 0 auto;
      font-size: 14px;
    }

    table td {
      padding: 8px;
    }
	
	.image-preview {
      width: 81px;
      height: 81px;
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-bottom: 15px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .image-preview img {
      max-width: 100%;
      max-height: 100%;
    }
  </style>
</head>
<body>

  <h2 class="ph">ADD NEW CUSTOMER</h2>
  <div class="form-container">
    <div class="ph2"><a href="customer_view.php" target="_blank">VIEW CUSTOMERS</a></div>

    <form name="newCustomerForm" method="post" action="customer_insert.php" enctype="multipart/form-data">
      <fieldset>
        <legend>PERSONAL INFORMATION</legend>
        <table width="100%" border="0" align="center">
          <tr>
            <td width="30%"><label class="required">Photo</label></td>
            <td width="70%">
              <div class="image-preview" id="imagePreview">
                <img src="images/profile.jpg" alt="Image Preview" id="previewImage">
              </div>
              <input type="file" name="uploadimage" accept="image/*" onchange="previewImage(event)" required>
            </td>
          </tr>
          <tr>
            <td><label class="required">Full Name:</label></td>
            <td><input type="text" name="full_name" required></td>
          </tr>
          <tr>
            <td><label class="required">Email:</label></td>
            <td><input type="email" name="email" required></td>
          </tr>
          <tr>
            <td><label class="required">Status:</label></td>
            <td><input type="text" name="status" required></td>
          </tr>
          <tr>
            <td><label class="required">Date of Birth:</label></td>
            <td><input type="date" name="date_of_birth" required></td>
          </tr>
          <tr>
            <td><label class="required">Place of Birth:</label></td>
            <td><input type="text" name="place_of_birth" required></td>
          </tr>
          <tr>
            <td>Previous Nationality:</td>
            <td><input type="text" name="previous_nationality"></td>
          </tr>
          <tr>
            <td><label class="required">Present Nationality:</label></td>
            <td><input type="text" name="present_nationality" required></td>
          </tr>
          <tr>
            <td><label class="required">Gender:</label></td>
            <td>
              <select name="sex" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Marital Status:</td>
            <td><input type="text" name="marital_status"></td>
          </tr>
          <tr>
            <td><label class="required">Place of Issue:</label></td>
            <td><input type="text" name="place_of_issue" required></td>
          </tr>
          <tr>
            <td>Qualification:</td>
            <td><input type="text" name="qualification"></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="text" name="profession"></td>
          </tr>
          <tr>
            <td>Home Address:</td>
            <td><input type="text" name="home_address"></td>
          </tr>
          <tr>
            <td><label class="required">Telephone Number:</label></td>
            <td><input type="text" name="telephone_no" required></td>
          </tr>
          <tr>
            <td>Purpose of Travel:</td>
            <td><input type="text" name="purpose_of_travel"></td>
          </tr>
          <tr>
            <td><label class="required">Passport Issue Date:</label></td>
            <td><input type="date" name="date_of_passport" required></td>
          </tr>
          <tr>
            <td><label class="required">Passport Number:</label></td>
            <td><input type="text" name="passport_no" required></td>
          </tr>
          <tr>
            <td><label class="required">Passport Expiry Date:</label></td>
            <td><input type="date" name="date_of_passport_expiry" required></td>
          </tr>
          <tr>
            <td><label class="required">Duration of Stay:</label></td>
            <td><input type="text" name="duration_of_stay" required></td>
          </tr>
          <tr>
            <td><label class="required">Date of Arrival:</label></td>
            <td><input type="date" name="date_of_arrival" required></td>
          </tr>
          <tr>
            <td><label class="required">Date of Departure:</label></td>
            <td><input type="date" name="date_of_departure" required></td>
          </tr>
          <tr>
            <td>Mode of Payment:</td>
            <td><input type="text" name="mode_of_payment"></td>
          </tr>
          <tr>
            <td>Relationship:</td>
            <td><input type="text" name="relationship"></td>
          </tr>
          <tr>
            <td><label class="required">Destination:</label></td>
            <td><input type="text" name="destination" required></td>
          </tr>
          <tr>
            <td>Carriers Name:</td>
            <td><input type="text" name="carriers_name"></td>
          </tr>
          <tr>
            <td>Visa Number:</td>
            <td><input type="text" name="visa_no"></td>
          </tr>
        </table>
      </fieldset>

      <div class="form-buttons">
        <input type="submit" value="Submit" name="customerform">
        <input type="reset" value="Clear">
      </div>
    </form>
  </div>

  <?php include('footer.php'); ?> <!-- Include the footer.php to maintain consistency -->
  
  <script>
    function previewImage(event) {
      const previewContainer = document.getElementById('imagePreview');
      const previewImage = document.getElementById('previewImage');
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          previewImage.setAttribute('src', e.target.result);
        };
        reader.readAsDataURL(file);
      } else {
        previewImage.setAttribute('src', 'images/profile.jpg');
      }
    }
  </script>

</body>
</html>
