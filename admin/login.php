<!-- login.php 파일 -->
<!-- HTML 및 CSS 스타일 정의 -->

<head>
	<!-- title 태그에 지정된 내용이 본문에 나오는 것이 아니다 - 탭의 이름이다-->
	<title>ONLINE TRAVEL AGENCY SYSTEM::LOGIN </title>
	<style>
		<style>.p {
			text-align: center;
			color: red;
			font-family: Georgia, "Times New Roman", Times, serif;
			size: 10px;
		}

		.loginForm {
			float: left;
			width: 400px;
			background-color: rgb(0, 102, 153);
			height: 274px;
			margin: 10px 0 20px 340px;
			border: 1px solid #333;
		}

		#contentarea table {
			width: 100% !important;
		}

		.loginTable {
			margin-top: 70px !important;
		}

		.inputbox {
			border-radius: 3px;
			box-shadow: -1px 1px 1px 3px;
			border: 1px solid #C36;
			width: 284px;
			color: #FF8000;
		}
	</style>
</head>

<?php
//공통 헤더
include('header1.php'); ?>

<p>&nbsp;</p>
<table border="0">
	<tr>
		<td style="text-align:center; padding:10px; background:#036; color:#FFF; font-weight:bold;" width="100%"
			align="left">Login</td>
	</tr>
</table>

<?php
//데이터베이스 연결
include('connection\connection.php'); ?>

<!-- 세션 시작 및 로그인 처리 -->
<?php
if (session_status() === PHP_SESSION_NONE)
	session_start();            //세션 스타트 - 사용자가 로그인한 상태 유지

//로그인 폼을 제출하면 실행 
if (isset($_POST['submit'])) //post는 데이터를 저장하는 PHP 배열임
{
	$username = $_POST["username"]; //사용자가 입력한 username 값 가져오기
	$password = $_POST["password"];

	//DB의 admin 테이블에서  데이터 사용자 정보 체크 
	$username1 = mysqli_real_escape_string($con, $username);
	$password1 = mysqli_real_escape_string($con, $password);
	$sql = "select*from admin where username='$username1' and password='$password1'";//after where = means == as ic other language;
	$result = mysqli_query($con, $sql) or die(mysqli_query($con, ));
	$row = mysqli_fetch_array($result);//if $row is true then if will be executed otherwise else..
	//로그인 성공 시, 
	if ($row) {
		$user_id = $row["user_id"];
		$_SESSION['user_id'] = $user_id;
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;

		header('location:index.php'); // index.php로 이동하기

	}
	//로그인 실패 시, 
	else {
		echo "<h2 style='color:red'><center>-Password or username is incorret-</center></h2>";
	}
}


?>
<!-- 자바스크립트 로그인 유효성 검사 -->
<script language="javascript" type="text/javascript">
	function login() {
		var valid = true;
		var a = /^[a-z-A-Z\0-9]+$/;
		var username = document.form1.username.value.trim();
		var password = document.form1.username.value.trim();
		if (username.match(a) == null) {
			<?php
			echo "<h5 style='color:red'><center>-Password or username is incorret-</center></h5>";
			?>
			valid = false
		}

		else {
			if (password.match(a) == null) {

				<?php
				echo "<h5 style='color:red'><center>-Password or username is incorret-</center></h5>";

				?>
				valid = false;
			}
		}

		return valid;
	}
</script>

<!-- 로그인 폼 -->
<form name="form1" action="login.php" method="post" onsubmit="return login();">
	<div class="loginForm">
		<table align="center" class="loginTable">
			<tr>
				<td width="14%">Username</td>
				<td width="73%"><input type="text" name="username" size="30" class="inputbox"></td>

			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" size="30" class="inputbox"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<!-- 제출버튼, 폼이 제출된다. -->
				<td><input type="submit" name="submit" value="sign in"></td>
				<td>&nbsp;</td>
			</tr>

		</table>
	</div>
</form>

<?php include('footer.php'); ?>