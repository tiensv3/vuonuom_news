<?php

?>


<?php
if (isset($_POST['submitDesignPackage'])) {
	include './connect.php';
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$package = $_POST['package'];

	$sql_insert_package_register = "INSERT INTO signuppackages (name, email, phone, dsid) VALUES (?, ?, ?, ?)";
	$stmt = $conn->prepare($sql_insert_package_register);
	$stmt->bind_param("sssi", $fullname, $email, $phone, $package);
	$result_insert_package_register = $stmt->execute();

	if ($result_insert_package_register == TRUE) {
		echo '<script src="./admin/assets/js/sweetalert.min.js"></script>';
		echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
						swal({
								title: "Đăng ký thành công!",
								text: "Chúng tôi sẽ liên hệ với bạn sớm nhất!",
								icon: "success",
								button: "Đồng ý"
						}).then(() => {
								window.location.href = "./designservice.php";
						});
				});
		</script>';
		exit();
	}

	$stmt->close();
	$conn->close();
} else if (isset($_POST['submitBasicPackage'])) {
	include './connect.php';

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$package = $_POST['package'];

	$sql_insert_package_register = "INSERT INTO signuppackages (name, email, phone, bsid) VALUES (?, ?, ?, ?)";
	$stmt = $conn->prepare($sql_insert_package_register);
	$stmt->bind_param("sssi", $fullname, $email, $phone, $package);
	$result_insert_package_register = $stmt->execute();

	if ($result_insert_package_register == TRUE) {
		echo '<script src="./admin/assets/js/sweetalert.min.js"></script>';
		echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
						swal({
								title: "Đăng ký thành công!",
								text: "Chúng tôi sẽ liên hệ với bạn sớm nhất!",
								icon: "success",
								button: "Đồng ý"
						}).then(() => {
								window.location.href = "./basicservice.php";
						});
				});
		</script>';
		exit();
	}
	$stmt->close();
	$conn->close();
} else if (isset($_POST['submit_content_marketing'])) {
	include './connect.php';

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$package = $_POST['package'];

	$sql_insert_package_register = "INSERT INTO signuppackages (name, email, phone, cmid) VALUES (?, ?, ?, ?)";
	$stmt = $conn->prepare($sql_insert_package_register);
	$stmt->bind_param("sssi", $fullname, $email, $phone, $package);
	$result_insert_package_register = $stmt->execute();

	if ($result_insert_package_register == TRUE) {
		echo '<script src="./admin/assets/js/sweetalert.min.js"></script>';
		echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
						swal({
								title: "Đăng ký thành công!",
								text: "Chúng tôi sẽ liên hệ với bạn sớm nhất!",
								icon: "success",
								button: "Đồng ý"
						}).then(() => {
								window.location.href = "./contentmarketingservice.php";
						});
				});
		</script>';
		exit();
	}
	$stmt->close();
	$conn->close();
} else if (isset($_POST['submitFanpage'])) {
	include './connect.php';

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$package = $_POST['package'];

	$sql_insert_package_register = "INSERT INTO signuppackages (name, email, phone, fsid) VALUES (?, ?, ?, ?)";
	$stmt = $conn->prepare($sql_insert_package_register);
	$stmt->bind_param("sssi", $fullname, $email, $phone, $package);
	$result_insert_package_register = $stmt->execute();

	if ($result_insert_package_register == TRUE) {
		echo '<script src="./admin/assets/js/sweetalert.min.js"></script>';
		echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
						swal({
								title: "Đăng ký thành công!",
								text: "Chúng tôi sẽ liên hệ với bạn sớm nhất!",
								icon: "success",
								button: "Đồng ý"
						}).then(() => {
								window.location.href = "./fanpageservice.php";
						});
				});
		</script>';
		exit();
	}
	$stmt->close();
	$conn->close();
}
?>

