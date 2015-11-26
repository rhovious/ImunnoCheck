<?php
session_name("Vaccine");
	session_start();
	if (isset($_SESSION["userID"]))
	{
		header('Location: dashboard.php');
		exit();
	}
	$title="Login to Imunno&#10004";
	include_once("include/messages.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
		<?=$title; ?>
		</title>
		<link rel="styleSheet" type="text/css" href="css/main.css">
		<link rel="styleSheet" type="text/css" href="css/login.css">
	</head>
	<body>
		<div id="page-wrapper">
			<center>
			<h1>Login to Imunno<font color=#69c773>&#10004;</font></h1>
			</center>
			<center>
			<?php echo $msg;?>
			</center>
			<div class="inputForm">
				<form action="include/validate.php" method="post">
					<ul>
						<li>
							<label for="a">User ID</label>
							<input type="text" name="userID" autocomplete="off" placeholder="User ID" required>
						</li>
						<li>
							<label for="password">Password</label>
							<input type="password" name="password" placeholder="password" required>
						</li>
					</ul>
					<br>
					<br>
					<br>
					<label>
						<input type="submit" value="Login">
						<input type="button" value="Register" onclick="location.href='register.php'">
					</label>
				</form>
			</div>
		</div>
	</body>
</html>