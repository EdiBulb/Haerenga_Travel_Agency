<!-- artical.php 파일 -->
<head>
  <title>ONLINE TRAVEL AGENCY SYSTEM::ADD ARTICLES</title>
  <link href="datepicker/core.css" rel="stylesheet" type="text/css" />
  <link href="datepicker/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
  <script src="datepicker/jquery-1.6.2.min.js" type="text/javascript"></script>
  <script src="datepicker/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
  <script src="datepicker/core.js" type="text/javascript"></script>
  <script src="js/validation.js"></script>
  <link rel="stylesheet" href="css/bar.css" type="text/css" />
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
    select,
    textarea {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 15px;
    }

    input[type="submit"],
    input[type="reset"],
    input[type="button"] {
      width: 45%;
      padding: 10px;
      background-color: #069;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover,
    input[type="button"]:hover {
      background-color: #005b9a;
    }

    .form-buttons {
      text-align: center;
    }

    .form-buttons input {
      margin: 10px;
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
      background-color: #005b9a;
    }
  </style>
</head>

<?php require('header.php'); ?>

<h2 class="ph">ADD ARTICLES</h2>
<div class="form-container">
  <div class="ph2"><a href="artical_view.php">Back to List</a></div>

  <form method="post" name="form1" enctype="multipart/form-data">
    <fieldset>
      <legend>ARTICLES INFORMATION</legend>
      <table width="100%" border="0" align="center">
        <tr>
          <td width="21%">TITLE:</td>
          <td width="23%"><input name="title" type="text" id="title" required /></td>
        </tr>
        <tr>
          <td>PICTURE:</td>
          <td><input name="file" type="file" id="file" value="" /></td>
        </tr>
        <tr>
          <td>ARTICLE TYPE:</td>
          <td>
            <select name="page_type" id="page_type" required>
              <option value="-1">-SELECT ARTICLE-</option>
              <option value="home">HOME</option>
              <option value="aboutus">ABOUT US</option>
              <option value="packages">PACKAGES</option>
              <option value="services">SERVICES</option>
              <option value="career">CAREER</option>
              <option value="news">NEWS</option>
              <option value="packagepic">PACKAGES PICTURES</option>
              <option value="term_condition">TERM & CONDITION</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>DESCRIPTION:</td>
          <td><textarea name="description" cols="100" rows="8" class="ckeditor" id="description" required></textarea></td>
        </tr>
      </table>
    </fieldset>

    <div class="form-buttons">
      <input name="save" type="submit" id="save" value="Submit" />
      <input type="reset" name="reset" value="Clear" />
    </div>
  </form>
</div>

<?php
if (isset($_POST['save'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $page_type = $_POST['page_type'];

  $dir = 'uploaded/';
  $uploadfile = $dir . basename($_FILES['file']['name']);
  if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    $filename = $_FILES['file']['name'];
  }

  $query_insert = mysqli_query($con, "INSERT INTO pages(`title`, `picture`, `page_type`,  `description`) VALUES ('$title', '$filename', '$page_type', '$description')") or die(mysqli_error($con));
}
?>

<?php include('footer.php'); ?>
