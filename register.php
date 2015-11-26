<?php
session_name("Vaccine");
	session_start();

	$title="Imunno&#10004; Registration";
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
                <h1>Register to Imunno<font color=#69c773>&#10004;</font></h1>
            </center>
            <center>
                <?php echo $msg;?>
            </center>
            <div class="inputForm">
                <form action="include/validateRegistration.php" method="post">
                    <ul>
                        <li>
                            <label for="a">User ID</label>
                            <input type="text" name="userID" autocomplete="off" placeholder="User ID" required>
                        </li>
                        <li>
                            <label for="a">Date of Birth</label>
                            <input type="date" name="dob" style="width: 181px;height: 26px;" required>
                        </li>
                    </ul>
                    <br>
                    <br>
                    <br>
                    <br>
					<ul>
						<li>
                            <label for="a">First Name</label>
                            <input type="text" name="fName" autocomplete="off" placeholder="First Name" required>
                        </li>
						<li>
                            <label for="a">Last Name</label>
                            <input type="text" name="lName" autocomplete="off" placeholder="Last Name" required>
                        </li>
                    </ul>
					<br>
                    <br>
                    <br>
                    <br>
                    <ul>
                        <li>
                            <label for="a">Password</label>
                            <input type="password" name="pwd1" placeholder="password" required>
                        </li>
                        <li>
                            <label for="a">Repeat Password</label>
                            <input type="password" name="pwd2" placeholder="password" required>
                        </li>
                    </ul>
                    <br>
                    <br>
                    <br>
                    <label>
                        <input type="submit" value="Register">
                    </label>
                    <hr>
                    <br>
                    <label><a href="login.php">Back to Login</a></label>
                </form>
            </div>
        </div>
    </body>

    </html>
