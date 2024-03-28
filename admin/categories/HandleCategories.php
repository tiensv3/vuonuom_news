<?php
include_once("../../isAdmin.php");

?>

<?php

if (isset($_POST['add'])) {
	include_once("../../connect.php");
	$name = $_POST['name'];
	$status = $_POST['status'];

	$sql_insert_categories = "INSERT INTO categories (name, status) VALUES (?, ?)";
	$stmt = $conn->prepare($sql_insert_categories);
	$stmt->bind_param("si", $name, $status);
	$result_insert_categories = $stmt->execute();

	if ($result_insert_categories == TRUE) {
		echo '<script src="../assets/js/sweetalert.min.js"></script>';
		echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
						swal({
								title: "Đã thêm!",
								text: "Đã thêm thành công!",
								icon: "success",
								button: "Đồng ý"
						}).then(() => {
								window.location.href = "./categories.php";
						});
				});
			</script>';
		exit();
	} else {
		echo "<script language=javascript> 
		alert('Thêm danh mục không thành công');
		</script>";
	}

	$stmt->close();
	$conn->close();
} else if (isset($_POST['edit'])) {

	include_once("../../connect.php");

	$id = $_GET['id'];
	$name = $_POST['name'];
	$status = $_POST['status'];

	$sql_edit_categories = "UPDATE categories SET name = ?, status = ? WHERE id = ?";
	$stmt = $conn->prepare($sql_edit_categories);
	$stmt->bind_param("sii", $name, $status, $id);
	$result_edit_categories = $stmt->execute();

	if ($result_edit_categories == TRUE) {
		echo '<script src="../assets/js/sweetalert.min.js"></script>';
		echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
						swal({
								title: "Đã sửa!",
								text: "Đã sửa thành công!",
								icon: "success",
								button: "Đồng ý"
						}).then(() => {
								window.location.href = "./categories.php";
						});
				});
			</script>';
		exit();
	}

	$stmt->close();
	$conn->close();
} else if (isset($_GET['action']) && $_GET['action'] == 'delete') {

	include_once("../../connect.php");

	$id = $_GET['id'];
	$sql_delete_categories = "DELETE FROM categories WHERE id = ?";
	$stmt = $conn->prepare($sql_delete_categories);
	$stmt->bind_param("i", $id);
	$result_delete_categories = $stmt->execute();

	if ($result_delete_categories == TRUE) {
		echo '<script src="../assets/js/sweetalert.min.js"></script>';
		echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
						swal({
								title: "Đã xóa!",
								text: "Đã xóa thành công!",
								icon: "success",
								button: "Đồng ý"
						}).then(() => {
								window.location.href = "./categories.php";
						});
				});
			</script>';
		exit();
	}
	$stmt->close();
	$conn->close();
}
?>