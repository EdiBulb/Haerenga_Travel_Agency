<head>
  <title>ONLINE TRAVEL AGENCY SYSTEM::ADD EMPLOYEE</title>
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
    input[type="date"],
    input[type="file"] {
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

<h2 class="ph">ADD EMPLOYEE</h2>
<div class="form-container">
  <div class="ph2"><a href="employee_view.php" target="_blank">VIEW EMPLOYEES</a></div>

  <form name="form1" method="post" action="employee_insert.php" enctype="multipart/form-data" onsubmit="return validate();">
    <fieldset>
      <legend>PERSONAL INFORMATION</legend>
      <table width="100%" border="0" align="center">
	    <tr>
		  <td width="21%"><label class="required">Photo <span style="color: red;">*</span></label></td>
		  <td width="23%"><img src="images/profile.jpg" width="81" height="81" /><br /><input type="file" name="userfile" required /></td>
		</tr>
		<tr>
	      <td width="21%"><label class="required">Full Name <span style="color: red;">*</span></label></td>
		  <td width="23%"><input name="emp_name" type="text" id="emp_name" required /></td>
		</tr>
		<tr>
		  <td><label class="required">Contact Number <span style="color: red;">*</span></label></td>
		  <td><input name="emp_contact" type="text" id="emp_contact" required /></td>
		</tr>
		<tr>
		  <td><label class="required">Email <span style="color: red;">*</span></label></td>
		  <td><input name="emp_email" type="text" id="emp_employee" required /></td>
		</tr>
		<tr>
		  <td><label class="required">Address <span style="color: red;">*</span></label></td>
		  <td><input name="emp_address" type="text" id="emp_address" required /></td>
		</tr>
		<tr>
		  <td><label>Reference</label></td>
		  <td><input name="emp_reference" type="text" id="emp_reference" /></td>
		</tr>
		<tr>
		  <td><label class="required">Join Date <span style="color: red;">*</span></label></td>
		  <td><input name="emp_join" type="date" id="emp_join" required /></td>
		</tr>
		<tr>
		  <td><label>Closing Date</label></td>
		  <td><input name="emp_close" type="date" id="emp_close" /></td>
		</tr>
		<tr>
		  <td><label>Description</label></td>
		  <td><input name="emp_desc" type="text" id="emp_desc" /></td>
		</tr>
	  </table>
    </fieldset>

    <div class="form-buttons">
      <input type="submit" value="Submit" name="employeeform" />
      <input type="reset" value="Clear" />
    </div>
  </form>
</div>

<?php include('footer.php'); ?>
