<!-- header.php file -->
<!-- Purpose: Accessible only when logged in, provides page header and navigation menu -->

<!-- Check login status and show this header.php only if logged in -->
<?php include('session.php'); ?>

<!DOCTYPE html
   PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>ONLINE TRAVEL AGENCY SYSTEM</title>
   <!-- link to external resources, rel specifies the file name, type specifies the file type -->
   <link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>

<!-- Start of the main content and layout definition -->
<body>
   <div id="wrapper">
      <div id="header"></div>
      <div id="cssmenu">

         <!-- Navigation menu -->
         <ul>
            <li><a href='index.php'><span>Home</span></a></li>
            <!-- class is used for grouping elements -->
			<!-- Navigation for Employee -->
            <li class="has-sub"><a href=""><span>Employee</span></a>
               <ul>
                  <li class="has-sub"><a href="employee.php"><span>New Employee</span></a></li>
                  <li class="has-sub"><a href="employee_view.php"><span>View Employee</span></a></li>
               </ul>
            </li>
			
			<!-- Navigation for Customer -->
            <li class="has-sub"><a href=""><span>Customer</span></a>
               <ul>
                  <li class="has-sub"><a href="customer_add.php"><span>New Customer</span></a></li>
                  <li class="has-sub"><a href="customer_search.php"><span>Search Customer</span></a></li>
                  <li class="has-sub"><a href="customer_view.php"><span>View Customer</span></a></li>
               </ul>
            </li>

            <!-- Navigation for Reports -->
            <li class="has-sub"><a href=""><span>Reports</span></a>
               <ul>
                  <!-- booking view -->
                  <li class="has-sub"><a href="admin_booking_view.php"><span>Booking view</span></a></li>
               </ul>
            </li>

            <!-- Navigation for Package -->
            <li class="has-sub"><a href=""><span>Package</span></a>
               <ul>
                  <!-- package add -->
                  <li class="has-sub"><a href="package_add.php"><span>Package add</span></a></li>
                  <!-- package manage -->
                  <li class="has-sub"><a href="package_manage.php"><span>Package view</span></a></li>
                  
               </ul>
            </li>

            <!-- Navigation for Website -->
            <li class="has-sub"><a href="#"><span>Website</span></a>
               <ul>
                  <li class="has-sub"><a href="../index.php"><span>Haerenga.com</span></a></li>
                  <li class="has-sub"><a href="artical.php"><span>Insert Artical</span></a></li>
                  <li class="has-sub"><a href="artical_view.php"><span>Show Artical</span></a></li>
                  <li class="has-sub"><a href="contact_view.php"><span>view Contact</span></a></li>
               </ul><!--end of sub menu-->
            </li>

            <!-- Navigation for Account settings -->
            <li class="has-sub"><a href="#"><span>Account settings</span></a>
               <ul>
                  <li class="has-sub"><a href="new_admin.php"><span>New Admin</span></a></li>
                  <li class="has-sub"><a href="show_all_admin.php"><span>All Admins</span></a></li>
                  <li class="has-sub"><a href="passwordchange.php"><span>Change password</span></a></li>
                  <li class="has-sub"><a href="logout.php"><span>Logout</span></a></li>
               </ul>

      </div>

      <!-- contentarea: Main content area, background color -->
      <div id="contentarea" style="background-color:#CCC;">