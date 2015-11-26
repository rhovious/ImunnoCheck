<?php
	session_name("Vaccine");
	session_start();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?=$title; ?>
        </title>
        <link rel="styleSheet" type="text/css" href="css/main.css">
    </head>

    <body>
        <div id="page-wrapper">
            <h1>Expired Link</h1>
            <p>The link you clicked was expired/invalid.
            <br>
            <hr>
                <a href="login.php">Back to Login</a>
        </div>
    </body>
</html>
