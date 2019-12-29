    <?php
		session_start();
		session_destroy();
		echo "<script>alert('Logged out successfully!');
				window.location='adminlogin.php';</script>";
		exit();
    ?>