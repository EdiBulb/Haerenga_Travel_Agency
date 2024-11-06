<!-- package_manage.php 페이지에서 delete 버튼을 누르면 실행되는 php 코드-->

<?php
// DB 연결
include("connection/connection.php");

// 패키지 ID 가져오기
$package_id = $_GET['id'];

// 패키지 삭제 쿼리 실행
$query = "DELETE FROM package WHERE package_id = $package_id";

if (mysqli_query($con, $query)) {
    echo "Package deleted successfully!";
    header("Location: package_manage.php"); // 삭제 후 목록 페이지로 리다이렉트
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

// DB 연결 종료
mysqli_close($con);
?>
