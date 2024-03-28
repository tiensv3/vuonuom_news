<?php
include_once("../../isAdmin.php");
?>


<?php
if (isset($_POST['add'])) {
	include_once("../../connect.php");

	$title = $_POST['title'];
	$slug = $_POST['slug'];
	$content = $_POST['content'];
	$des = $_POST['description'];
	$status = $_POST['status'];
	$statusHot = $_POST['statusHot'];
	$categories = $_POST['category'];

	if (isset($_FILES['image'])) {
		$image = $_FILES['image'];

		if ($image['error'] == FALSE) {
			$image_name = $image['name'];
			$image_tmp = $image['tmp_name'];

			$upload_dir = '../uploads/';
			// Check the file extension of the image
			$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
			$file_info = pathinfo($image_name);
			$image_extension = strtolower($file_info['extension']);

			if (in_array($image_extension, $allowed_extensions)) {
				// Generate a unique filename by appending a timestamp
				$timestamp = time();
				$new_image_name = $timestamp . '_' . $image_name;

				// Create the full path for the new image
				$image_path = $upload_dir . $new_image_name;

				// Move the image from the temporary directory to the storage directory
				if (move_uploaded_file($image_tmp, $image_path)) {
					$sql_insert_news = "INSERT INTO news (title, content, status, statusHot, des, categoryid, img, slug) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
					$stmt = $conn->prepare($sql_insert_news);
					$stmt->bind_param("ssiisiss", $title, $content, $status, $statusHot, $des, $categories, $new_image_name, $slug);

					// Execute the statement
					$result_insert_news = $stmt->execute();
					if ($result_insert_news == TRUE) {
						echo '<script src="../assets/js/sweetalert.min.js"></script>';
						echo '<script>
                            document.addEventListener("DOMContentLoaded", function() {
                                swal({
                                    title: "Đã thêm!",
                                    text: "Đã thêm thành công!",
                                    icon: "success",
                                    button: "Đồng ý"
                                }).then(() => {
                                    window.location.href = "./News.php";
                                });
                            });
                        </script>';
						exit();
					}
				}
			}
		}
	}

	$stmt->close();
	$conn->close();
} else if (isset($_POST['edit'])) {
	include_once("../../connect.php");
	$id = $_POST['id'];

	$title = $_POST['title'];
	$slug = $_POST['slug'];

	$content = $_POST['content'];
	$des = $_POST['description'];
	$status = $_POST['status'];
	$statusHot = $_POST['statusHot'];
	$categories = $_POST['category'];

	if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
		$image = $_FILES['image'];

		if ($image['error'] == FALSE) {
			$image_name = $image['name'];
			$image_tmp = $image['tmp_name'];

			$upload_dir = '../uploads/';
			// Check the file extension of the image
			$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
			$file_info = pathinfo($image_name);
			$image_extension = strtolower($file_info['extension']);

			if (in_array($image_extension, $allowed_extensions)) {
				// Generate a unique filename by appending a timestamp
				$timestamp = time();
				$new_image_name = $timestamp . '_' . $image_name;

				// Create the full path for the new image
				$image_path = $upload_dir . $new_image_name;

				// Move the image from the temporary directory to the storage directory
				if (move_uploaded_file($image_tmp, $image_path)) {
					// Update news record with image
					$sql_update_news = "UPDATE news SET title=?, content=?, status=?, statusHot=?, des=?, categoryid=?, img=?, slug = ? WHERE id=?";
					$stmt = $conn->prepare($sql_update_news);
					$stmt->bind_param("ssiisissi", $title, $content, $status, $statusHot, $des, $categories, $new_image_name, $slug, $id);

					// Execute the statement
					$result_update_news = $stmt->execute();
					if ($result_update_news == TRUE) {
						echo '<script src="../assets/js/sweetalert.min.js"></script>';
						echo '<script>
															document.addEventListener("DOMContentLoaded", function() {
																	swal({
																			title: "Đã cập nhật!",
																			text: "Đã cập nhật thành công!",
																			icon: "success",
																			button: "Đồng ý"
																	}).then(() => {
																			window.location.href = "./News.php";
																	});
															});
													</script>';
						exit();
					}
				}
			}
		}
	} else {
		$sql_update_news = "UPDATE news SET title=?, content=?, status=?, statusHot=?, des=?, categoryid=?, slug = ? WHERE id=?";
		$stmt = $conn->prepare($sql_update_news);
		$stmt->bind_param("ssiisisi", $title, $content, $status, $statusHot, $des, $categories, $slug, $id);

		// Execute the statement
		$result_update_news = $stmt->execute();
		if ($result_update_news == TRUE) {
			echo '<script src="../assets/js/sweetalert.min.js"></script>';
			echo '<script>
												document.addEventListener("DOMContentLoaded", function() {
														swal({
																title: "Đã cập nhật!",
																text: "Đã cập nhật thành công!",
																icon: "success",
																button: "Đồng ý"
														}).then(() => {
																window.location.href = "./News.php";
														});
												});
										</script>';
			exit();
		}
	}
} else if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	include_once("../../connect.php");

	$id = $_GET['id'];
	$sql_delete_news = "DELETE FROM News WHERE id = ?";
	$stmt = $conn->prepare($sql_delete_news);
	$stmt->bind_param("i", $id);
	$result_delete_news = $stmt->execute();

	if ($result_delete_news == TRUE) {
		echo '<script src="../assets/js/sweetalert.min.js"></script>';
		echo '<script>
							document.addEventListener("DOMContentLoaded", function() {
									swal({
											title: "Đã xóa!",
											text: "Đã xóa thành công!",
											icon: "success",
											button: "Đồng ý"
									}).then(() => {
											window.location.href = "./News.php";
									});
							});
					</script>';
		exit();
	}

	$stmt->close();
	$conn->close();
}
?>