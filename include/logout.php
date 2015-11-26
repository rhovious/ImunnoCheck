<?php
session_name("Vaccine");
	Session_start();
	Session_destroy();

	header('Location: ../login.php?msg=4');
?>
