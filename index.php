<!-- index.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
    <!-- inc_head.php 불러오기 -->
    <?php require('inc_head.php'); ?>
</head>

<!-- Start of main content -->

<body>
    <div class="wrapper">
        <!-- Top section of the page -->
        <?php require('inc_top.php'); ?>

        <!-- Navigation section -->
        <?php include('inc_menu.php'); ?>

        <?php include('inc_home_slider.php'); ?>

        <div class="main_content">
            <h1><strong>Exquisite </strong>Travel Services</h1>
            <div>


                <!-- Retrieve news from the DB - will cover travel tips, travel news, etc. -->
                <?php
                include("admin/connection/connection.php");
                $sql = mysqli_query(
                    $con,
                    "SELECT * FROM pages WHERE page_type='news' order by page_id desc LIMIT 0,3 "
                ) or die(mysqli_error($con));
                while ($resultP = mysqli_fetch_array($sql)) { ?>

                    <!-- Display content -->
                    <div class="col">
                        <h2><?php echo $resultP['title']; ?></h2>
                        <p><img src="admin/uploaded/<?php echo $resultP['picture']; ?>" width="160" height="110"></p>
                        <?php echo $resultP['description']; ?></p>

                    </div>
                <?php } ?>

            </div>
        </div>
        <!-- Main action buttons on the page: specify the desired URL to navigate -->
        <div class="main_actions">
            <a href="javascript:;" class="honeymoon"><span>Honeymoon</span></a>
            <a href="javascript:;" class="cruise-drive"><span>Cruise Drive</span></a>
            <a href="javascript:;" class="our-offices"><span>Our Offices</span></a>
            <a href="javascript:;" class="facebook last"><span>Join Us</span></a>
        </div>
        <?php include('inc_footer.php'); ?>

    </div>
</body>

</html>