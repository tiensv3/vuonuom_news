<?php
include_once("../../isAdmin.php");
?>


<?php
if (isset($_POST['add'])) {
    include_once("../../connect.php");

    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $birthday = $_POST['birthday'];
    $certificate = $_POST['certificate'];
    $experience = $_POST['experience'];
    $des = $_POST['des'];
    $status = $_POST['status'];

    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];

        if ($image['error'] == FALSE) {
            $image_name = $image['name'];
            $image_tmp = $image['tmp_name'];

            $upload_dir = '../uploads/';
            // Check the file extension of the image
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'jfif');
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
                    $sql_insert_personnel = "INSERT INTO personnels (title, slug, position, name, birthday, certificate, img, des, experience, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql_insert_personnel);
                    $stmt->bind_param("sssssssssi", $title, $slug, $position, $name, $birthday, $certificate, $new_image_name, $des, $experience, $status);

                    // Execute the statement
                    $result_insert_personnel = $stmt->execute();
                    if ($result_insert_personnel == TRUE) {
                        echo '<script src="../assets/js/sweetalert.min.js"></script>';
                        echo '<script>
                            document.addEventListener("DOMContentLoaded", function() {
                                swal({
                                    title: "Đã thêm!",
                                    text: "Đã thêm thành công!",
                                    icon: "success",
                                    button: "Đồng ý"
                                }).then(() => {
                                    window.location.href = "./personnels.php";
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
    $name = $_POST['name'];
    $position = $_POST['position'];
    $birthday = $_POST['birthday'];
    $certificate = $_POST['certificate'];
    $experience = $_POST['experience'];
    $des = $_POST['des'];
    $status = $_POST['status'];

    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $image = $_FILES['image'];

        if ($image['error'] == FALSE) {
            $image_name = $image['name'];
            $image_tmp = $image['tmp_name'];

            $upload_dir = '../uploads/';
            // Check the file extension of the image
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'jfif');
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
                    // Update personnel record with image
                    $sql_update_personnel = "UPDATE personnels SET title=?, slug=?, name=?, position=?, birthday=?, certificate=?, img=?, des = ?, experience = ?, status = ? WHERE id=?";
                    $stmt = $conn->prepare($sql_update_personnel);
                    $stmt->bind_param("sssssssssii", $title, $slug, $name, $position, $birthday, $certificate, $new_image_name, $des, $experience, $status, $id);

                    // Execute the statement
                    $result_update_personnel = $stmt->execute();
                    if ($result_update_personnel == TRUE) {
                        echo '<script src="../assets/js/sweetalert.min.js"></script>';
                        echo '<script>
															document.addEventListener("DOMContentLoaded", function() {
																	swal({
																			title: "Đã cập nhật!",
																			text: "Đã cập nhật thành công!",
																			icon: "success",
																			button: "Đồng ý"
																	}).then(() => {
																			window.location.href = "./personnels.php";
																	});
															});
													</script>';
                        exit();
                    }
                }
            }
        }
    } else {
        $sql_update_personnel = "UPDATE personnels SET title=?, slug=?, position=?, name=?, birthday=?,
         certificate=?, des = ?, experience =?, status = ? WHERE id=?";
        $stmt = $conn->prepare($sql_update_personnel);
        $stmt->bind_param("ssssssssii", $title, $slug, $position, $name, $birthday, $certificate, $des, $experience, $status, $id);

        // Execute the statement
        $result_update_personnel = $stmt->execute();
        if ($result_update_personnel == TRUE) {
            echo '<script src="../assets/js/sweetalert.min.js"></script>';
            echo '<script>
												document.addEventListener("DOMContentLoaded", function() {
														swal({
																title: "Đã cập nhật!",
																text: "Đã cập nhật thành công!",
																icon: "success",
																button: "Đồng ý"
														}).then(() => {
																window.location.href = "./personnels.php";
														});
												});
										</script>';
            exit();
        }
    }
} else if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    include_once("../../connect.php");

    $id = $_GET['id'];
    $sql_delete_personnel = "DELETE FROM personnels WHERE id = ?";
    $stmt = $conn->prepare($sql_delete_personnel);
    $stmt->bind_param("i", $id);
    $result_delete_personnel = $stmt->execute();

    if ($result_delete_personnel == TRUE) {
        echo '<script src="../assets/js/sweetalert.min.js"></script>';
        echo '<script>
							document.addEventListener("DOMContentLoaded", function() {
									swal({
											title: "Đã xóa!",
											text: "Đã xóa thành công!",
											icon: "success",
											button: "Đồng ý"
									}).then(() => {
											window.location.href = "./personnels.php";
									});
							});
					</script>';
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>