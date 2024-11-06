<?php
// 출력 버퍼링 시작
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Package</title>
    <link href="../onlinetravelagency/admin/datepicker/core.css" rel="stylesheet" type="text/css" />
    <link href="../onlinetravelagency/admin/datepicker/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
    <script src="../onlinetravelagency/admin/datepicker/jquery-1.6.2.min.js" type="text/javascript"></script>
    <script src="../onlinetravelagency/admin/datepicker/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="../onlinetravelagency/admin/datepicker/core.js" type="text/javascript"></script>
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
        input[type="file"],
        input[type="number"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            width: 45%;
            padding: 10px;
            background-color: #069;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #005b9a;
        }

        .form-buttons {
            text-align: center;
        }

        .form-buttons input {
            margin: 10px;
        }
    </style>
</head>

<body>

    <?php require('header.php'); ?>

    <h2 class="ph">Update Package</h2>

    <div class="form-container">

        <?php
        // DB 연결
        include("connection/connection.php");

        // 패키지 ID 가져오기
        $package_id = $_GET['id'];

        // 패키지 정보 가져오기
        $query = "SELECT * FROM package WHERE package_id = $package_id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        // 패키지 정보가 있을 경우 폼에 미리 채워넣기
        if ($row) {
            $package_name = $row['package_name'];
            $description = $row['description'];
            $price = $row['price'];
            $duration = $row['duration'];
            $picture = $row['picture'];
        } else {
            echo "Package not found.";
            exit();
        }
        ?>

        <form name="packageForm" method="post" action="package_update.php?id=<?php echo $package_id; ?>" enctype="multipart/form-data">
            <fieldset>
                <legend>Package Information</legend>

                <label for="package_name">Package Name:</label><br>
                <input type="text" name="package_name" id="package_name" value="<?php echo $package_name; ?>" required><br><br>

                <label for="description">Description:</label><br>
                <textarea name="description" id="description" rows="4" required><?php echo $description; ?></textarea><br><br>

                <label for="price">Price (in NZD):</label><br>
                <input type="number" name="price" id="price" step="0.01" value="<?php echo $price; ?>" required><br><br>

                <label for="duration">Duration:</label><br>
                <input type="text" name="duration" id="duration" value="<?php echo $duration; ?>" required><br><br>

                <label for="picture">Current Image:</label><br>
                <img src="<?php echo $picture; ?>" width="200"><br><br>

                <label for="new_picture">Upload New Image (Optional):</label><br>
                <input type="file" name="new_picture" id="new_picture"><br><br>
            </fieldset>

            <div class="form-buttons">
                <input type="submit" name="updatePackage" value="Update Package">
            </div>
        </form>
    </div>

    <?php
    // 폼이 제출되었는지 확인
    if (isset($_POST['updatePackage'])) {
        // 폼 데이터 수집
        $package_name = $_POST['package_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $duration = $_POST['duration'];

        // 파일 업로드 처리
        $target_dir = "uploaded/";
        $new_picture = $_FILES['new_picture']['name'];

        if (!empty($new_picture)) {
            // 고유한 파일 이름 생성 (시간 기반)
            $unique_file_name = $target_dir . time() . '_' . basename($_FILES["new_picture"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($unique_file_name, PATHINFO_EXTENSION));

            // 이미지 파일이 실제 이미지인지 확인
            $check = getimagesize($_FILES["new_picture"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // 파일 크기 제한
            if ($_FILES["new_picture"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // 허용되는 파일 형식 (JPG, JPEG, PNG, GIF)
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // 업로드가 허용되었는지 확인
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["new_picture"]["tmp_name"], $unique_file_name)) {
                    // 새 이미지 경로를 데이터베이스에 업데이트
                    $sql = "UPDATE package SET package_name='$package_name', description='$description', price='$price', duration='$duration', picture='$unique_file_name' WHERE package_id=$package_id";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            // 이미지를 변경하지 않으면 나머지만 업데이트
            $sql = "UPDATE package SET package_name='$package_name', description='$description', price='$price', duration='$duration' WHERE package_id=$package_id";
        }

        // SQL 쿼리 실행
        if (mysqli_query($con, $sql)) {
            echo "Package updated successfully!";
            ob_end_clean(); // 출력 버퍼 비우기

            header("Location: package_manage.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        // DB 연결 종료
        mysqli_close($con);
    }
    ?>

    <?php include('footer.php'); ?>

</body>

</html>
