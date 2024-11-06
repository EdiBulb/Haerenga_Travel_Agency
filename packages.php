<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <?php require('inc_head.php'); ?>

  <!-- Include Swiper CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <style>
    /* Overall page layout */
    .content {
      display: flex;
    }

    /* Left menu style */
    .left-content {
      width: 25%;
      /* Fixed width for the left menu */
      padding-right: 20px;
      position: relative;
      z-index: 10;
      /* Keep the menu above the slider */
    }

    /* Right slider style */
    .right-content {
      width: 75%;
    }

    .swiper-container {
      width: 100%;
      height: 100%;
      margin-top: 0;
      position: relative;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .swiper-slide img {
      max-width: 80%;
      height: auto;
      margin-bottom: 20px;
    }

    .swiper-pagination {
      position: relative;
      margin-top: 0;
    }

    .page_headings h1,
    .page_headings h2 {
      margin: 0;
      padding: 0;
    }

    .page_headings {
      margin-bottom: 0;
      padding-bottom: 0;
    }

    .swiper-container {
      margin-top: 0;
    }

    .swiper-button-next,
    .swiper-button-prev {
      color: #069;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: auto;
      height: auto;
      padding: 10px;
      z-index: 10;
    }

    .swiper-button-next {
      right: -30px;
    }

    .swiper-button-prev {
      left: -30px;
    }
  </style>
</head>

<body>

  <div class="wrapper">

    <?php require('inc_top.php'); ?>

    <?php include('inc_menu.php'); ?>

    <div class="content">
      <div class="left-content">
        <?php include("inc_left.php"); ?>
      </div>

      <div class="right-content">
        <div class="page_headings">
          <h1 align="center">Packages</h1>
          <h2 align="center">Whatever package you choose, <br>we provide top-quality services with complete assurance
            and satisfaction.</h2>
        </div>

        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php
            include("admin/connection/connection.php");
            // Retrieve data of type packages
            $sql = mysqli_query($con, "SELECT * FROM package ORDER BY package_id DESC") or die(mysqli_error($con));
            while ($resultP = mysqli_fetch_array($sql)) { ?>
              <div class="swiper-slide">
                <!-- Display title -->
                <h2><?php echo $resultP['package_name']; ?></h2>
                <!-- Display title -->
                <img src="admin/uploaded/<?php echo $resultP['picture']; ?>" width="700" height="369">
                <!-- Display description -->
                <p><?php echo $resultP['description']; ?></p>
              </div>
            <?php } ?>
          </div>

          <!-- Pagination -->
          <div class="swiper-pagination"></div>
          <!-- Navigation buttons (placed beside the slide) -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>

    <?php include('inc_footer.php'); ?>

  </div>

  <!-- Include Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script>
    // Initialize Swiper
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

</body>

</html>