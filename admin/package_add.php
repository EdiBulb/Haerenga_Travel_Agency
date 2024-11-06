<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Package</title>
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

    <h2 class="ph">Add New Package</h2>
    <div class="form-container">
        <form name="packageForm" method="post" action="package_add.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Package Information</legend>
                <label for="package_name">Package Name:</label><br>
                <input type="text" name="package_name" id="package_name" required><br><br>

                <label for="description">Description:</label><br>
                <textarea name="description" id="description" rows="4" required></textarea><br><br>

                <label for="price">Price (in NZD):</label><br>
                <input type="number" name="price" id="price" step="0.01" required><br><br>

                <label for="duration">Duration:</label><br>
                <input type="text" name="duration" id="duration" required><br><br>

                <label for="picture">Upload Package Image (PNG only):</label><br>
                <input type="file" name="picture" id="picture" required><br><br>
            </fieldset>

            <div class="form-buttons">
                <input type="submit" name="addPackage" value="Add Package">
            </div>
        </form>
    </div>

    <?php
    // 서버에서 폼이 제출되었는지 확인
    if (isset($_POST['addPackage'])) {
        // 폼에서 입력한 데이터 수집
        $package_name = $_POST['package_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $duration = $_POST['duration'];

        // 파일 업로드 처리
        $target_dir = "uploaded/";
        $target_file_name = time() . '_' . basename($_FILES["picture"]["name"]); // 고유한 파일 이름을 생성
        $target_file = $target_dir . $target_file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // 이미지 파일이 실제 이미지인지 확인
        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // 파일이 존재하는지 확인
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // 파일 크기 제한
        if ($_FILES["picture"]["size"] > 500000) {
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
            // 디렉토리가 없을 경우 생성
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true); // 권한 설정 후 폴더 생성
            }
            
            // 파일이 정상적으로 업로드되면
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                // DB 연결
                include("connection/connection.php");

                // SQL 쿼리 작성 (파일 이름만 저장)
                $sql = "INSERT INTO package (package_name, description, price, picture, duration)
                        VALUES ('$package_name', '$description', '$price', '$target_file_name', '$duration')";

                // 쿼리 실행
                if (mysqli_query($con, $sql)) {
                    echo "New package added successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }

                // DB 연결 종료
                mysqli_close($con);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    ?>

    <?php include('footer.php'); ?>

</body>

</html>
