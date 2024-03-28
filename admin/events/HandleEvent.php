<?php
include_once("../../isAdmin.php");
?>

<?php
if (isset($_POST['add'])) {
	include_once("../../connect.php");

	$name = $_POST['name'];
	$slug = $_POST['slug'];
	$url = $_POST['url'];
	$content = $_POST['content'];
	$status = $_POST['status'];
	$statusHot = $_POST['statusHot'];
	$des = $_POST['des'];

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
					$sql_insert_events = "INSERT INTO events (name, url, content, status, statusHot, img, slug, des) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
					$stmt = $conn->prepare($sql_insert_events);
					$stmt->bind_param("sssiisss", $name, $url, $content, $status, $statusHot, $new_image_name, $slug, $des);

					// Execute the statement
					$result_insert_events = $stmt->execute();
					if ($result_insert_events == TRUE) {
						echo '<script src="../assets/js/sweetalert.min.js"></script>';
						echo '<script>
                            document.addEventListener("DOMContentLoaded", function() {
                                swal({
                                    title: "Đã thêm!",
                                    text: "Đã thêm thành công!",
                                    icon: "success",
                                    button: "Đồng ý"
                                }).then(() => {
                                    window.location.href = "./Event.php";
                                });
                            });
                        </script>';
						exit();
					}
				}
			}
		}
	}

	$conn->close();
} else if (isset($_POST['edit'])) {
	include_once("../../connect.php");

	$event_id = $_POST['id'];

	$name = $_POST['name'];
	$slug = $_POST['slug'];
	$des = $_POST['des'];
	$url = $_POST['url'];
	$content = $_POST['content'];
	$status = $_POST['status'];
	$statusHot = $_POST['statusHot'];

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

				if (move_uploaded_file($image_tmp, $image_path)) {
					$sql_update_event = "UPDATE events SET name=?, url=?, content=?, status=?, statusHot=?, img=?, slug = ?, des = ? WHERE id=?";
					$stmt = $conn->prepare($sql_update_event);
					$stmt->bind_param("sssiisssi", $name, $url, $content, $status, $statusHot, $new_image_name, $slug, $des, $event_id);

					// Execute the statement
					$result_update_events = $stmt->execute();
					if ($result_update_events == TRUE) {
						echo '<script src="../assets/js/sweetalert.min.js"></script>';
						echo '<script>
                            document.addEventListener("DOMContentLoaded", function() {
                                swal({
                                    title: "Đã sửa!",
                                    text: "Đã sửa thành công!",
                                    icon: "success",
                                    button: "Đồng ý"
                                }).then(() => {
                                    window.location.href = "./Event.php";
                                });
                            });
                        </script>';
						exit();
					}
				}
			}
		}
	} else {
		$sql_update_event = "UPDATE events SET name=?, url=?, content=?, status=?, statusHot=?, slug = ?, des = ? WHERE id=?";
		$stmt = $conn->prepare($sql_update_event);
		$stmt->bind_param("sssiissi", $name, $url, $content, $status, $statusHot, $slug, $des, $event_id);

		// Execute the statement
		$result_update_events = $stmt->execute();
		if ($result_update_events == TRUE) {
			echo '<script src="../assets/js/sweetalert.min.js"></script>';
			echo '<script>
                            document.addEventListener("DOMContentLoaded", function() {
                                swal({
                                    title: "Đã sửa!",
                                    text: "Đã sửa thành công!",
                                    icon: "success",
                                    button: "Đồng ý"
                                }).then(() => {
                                    window.location.href = "./Event.php";
                                });
                            });
                        </script>';
			exit();
		}
	}


	$conn->close();
} else if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	include_once("../../connect.php");
	$event_id = $_GET['id'];

	$sql_delete_event = "delete from events where id = ?";
	$stmt = $conn->prepare($sql_delete_event);
	$stmt->bind_param("i", $event_id);
	$result_delete_event = $stmt->execute();

	if ($result_delete_event == TRUE) {
		echo '<script src="../assets/js/sweetalert.min.js"></script>';
		echo '<script>
							document.addEventListener("DOMContentLoaded", function() {
									swal({
											title: "Đã xóa!",
											text: "Đã xóa thành công!",
											icon: "success",
											button: "Đồng ý"
									}).then(() => {
											window.location.href = "./Event.php";
									});
							});
					</script>';
		exit();
	}

	$conn->close();
}
?>