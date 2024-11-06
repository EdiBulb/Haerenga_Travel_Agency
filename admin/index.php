<!-- admin 폴더의 index.php파일 -->
<!-- Index.php 파일이 메인 페이지다.  -->

<!-- 세션관리를 통해, 로그인 상태를 먼저 확인하고, 사용자가 로그인 하지 않으면 로그인 페이지로 이동시킨다 -->
<?php include('session.php'); ?>
<!-- 웹사이트의 상단 디자인과 메뉴 항목 설정 -->
<?php include('header.php'); ?>


<?php include('adminhomepage.php'); ?>

<!-- 웹사이트의 하단 디자인과 메뉴 항목 설정 -->
<?php include('footer.php'); ?>