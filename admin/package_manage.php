<!-- admin에서 패키지를 수정 및 삭제할 수 있는 페이지 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Packages</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
        }

        .action-buttons a {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #069;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .action-buttons a:hover {
            background-color: #005b9a;
        }

        .delete-btn {
            background-color: red;
        }

        .delete-btn:hover {
            background-color: darkred;
        }
    </style>
</head>

<body>

    <?php require('header.php'); ?>

    <h2 class="ph">Manage Packages</h2>
    <div class="form-container">
        <table>
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // DB 연결
                include("connection/connection.php");

                // 패키지 목록 가져오기
                $query = "SELECT * FROM package";
                $result = mysqli_query($con, $query);

                // 결과가 존재할 경우 출력
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['package_name'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>$" . $row['price'] . "</td>";
                        echo "<td>" . $row['duration'] . "</td>";
                        echo "<td><img src='" . $row['picture'] . "' width='100'></td>";
                        echo "<td class='action-buttons'>
                                <a href='package_update.php?id=" . $row['package_id'] . "'>Update</a>
                                <a href='package_delete.php?id=" . $row['package_id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this package?\");'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No packages found.</td></tr>";
                }

                // DB 연결 종료
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>

    <?php include('footer.php'); ?>

</body>

</html>