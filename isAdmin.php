<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>

<?php
if (!isset($_SESSION["admin"])) {
	header("Location: ../../login.php");
}
?>