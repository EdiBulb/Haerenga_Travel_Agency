<!-- session.php 파일 -->
<!-- 세션 관리(로그인된 상태를 유지하는지를 확인하는 ) 파일-->

<?php
if (session_status() === PHP_SESSION_NONE) // 세션이 아직 시작되지 않았다면, 
    session_start(); // 세션을 시작하는 함수 - 세션을 시작한다
$user = $_SESSION['user_id']; // 로그인한 사용자 ID 의미한다. - 세션에서 user_id 값을 가져온다

//로그인 되지 않았으면 로그인 페이지로 보내기
if (!$_SESSION['user_id']) // 세션에 user_id 가 존재하지 않으면
{
    header('location:login.php'); // 로그인 페이지로 리다이렉트 한다
}
?>