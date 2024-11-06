<!-- new_admin.php 파일 -->
<head>
  <title>ONLINE TRAVEL AGENCY SYSTEM::ADD NEW ADMIN</title>
  <link href="../onlinetravelagency/admin/datepicker/core.css" rel="stylesheet" type="text/css" />
  <link href="../onlinetravelagency/admin/datepicker/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
  <script src="../onlinetravelagency/admin/datepicker/jquery-1.6.2.min.js" type="text/javascript"></script>
  <script src="../onlinetravelagency/admin/datepicker/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
  <script src="../onlinetravelagency/admin/datepicker/core.js" type="text/javascript"></script>
  <script src="../onlinetravelagency/admin/js/validation.js"></script>
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
    input[type="password"] {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 15px;
    }

    input[type="submit"],
    input[type="reset"] {
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
    input[type="reset"]:hover {
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
<?php include('session.php'); ?>

<h2 class="ph">ADD NEW ADMIN</h2>
<div class="form-container">
  <div class="ph2"><a href="index.php">FILL THE FORM</a></div>

  <form name="form1" method="post" action="new_admin_insert.php" enctype="multipart/form-data">
    <fieldset>
      <legend>PERSONAL INFO</legend>
      <table width="100%" border="0" align="center">
        <tr>
          <td width="21%">USERNAME:</td>
          <td width="23%"><input name="username" type="text" id="username" required /></td>
        </tr>
        <tr>
          <td>PASSWORD:</td>
          <td><input name="password" type="password" id="password" required /></td>
        </tr>
        <tr>
          <td>EMAIL:</td>
          <td><input name="email" type="text" id="email" required /></td>
        </tr>
        <tr>
          <td>ADDRESS:</td>
          <td><input name="address" type="text" id="address" required /></td>
        </tr>
        <tr>
          <td>PHONE NUMBER:</td>
          <td><input name="phone_no" type="text" id="phone_no" required /></td>
        </tr>
        <tr>
          <td>DESIGNATION:</td>
          <td><input name="designation" type="text" id="designation" required /></td>
        </tr>
      </table>
    </fieldset>

    <div class="form-buttons">
      <input name="adminform" type="submit" id="adminform" value="Submit" />
      <input type="reset" value="Clear" />
    </div>
  </form>
</div>

<?php include('footer.php'); ?>
