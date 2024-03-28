<?php
include_once("../../isAdmin.php");
include_once("../Template/loadingpage.php");
include_once("../../connect.php");

?>
<?php
if (isset($_POST["addBN"])) {
    // img
    $imageDirectory = "../uploads/";
    $currentDateTime = date("YmdHis");
    $newFileName = "banner" . "_" . $currentDateTime . "_" . basename($_FILES["img"]["name"]);
    $newFilePath = $imageDirectory . $newFileName;
    $tempFilePath = $_FILES["img"]["tmp_name"];
    move_uploaded_file($tempFilePath, $newFilePath);

    $status = $_POST["status"];
    $url = isset($_POST['url']) && $_POST['url'] != null ? $_POST["url"] : '';

    $sql = "INSERT INTO banners (img, status, url) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $newFilePath, $status, $url);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<script src="../assets/js/sweetalert.min.js"></script>';
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                    title: "ĐÃ THÊM!",
                    text: "Đã thêm thành công!",
                    icon: "success",
                    button: "Đồng ý"
                }).then(() => {
                    window.location.href = "./banners.php";
                });
            });
          </script>';
        exit();
    } else {
        header("Location: ../../404.html");
        exit;
    }
} elseif (isset($_POST["updateBN"])) {
    $id = $_POST["id"];
    $status = $_POST["status"];
    $url = isset($_POST['url']) && $_POST['url'] != null ? $_POST["url"] : '';
    if (isset($_FILES['img']) && $_FILES['img']['size'] > 0) {
        //img
        $imageDirectory = "../uploads/";
        $currentDateTime = date("YmdHis");
        $newFileName = "banner" . "_" . $currentDateTime . "_" . basename($_FILES["img"]["name"]);
        $newFilePath = $imageDirectory . $newFileName;
        $tempFilePath = $_FILES["img"]["tmp_name"];
        move_uploaded_file($tempFilePath, $newFilePath);

        $sql = "UPDATE banners SET img = ?, status = ?, url = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisi", $newFilePath, $status, $url, $id);
        $stmt->execute();
    } else {

        $sql = "UPDATE banners SET status = ?, url = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isi", $status, $url, $id);
        $stmt->execute();
    }

    if ($stmt->affected_rows > 0) {
        echo '<script src="../assets/js/sweetalert.min.js"></script>';
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                    title: "ĐÃ CẬP NHẬT!",
                    text: "Đã cập nhật thành công!",
                    icon: "success",
                    button: "Đồng ý"
                }).then(() => {
                    window.location.href = "./banners.php";
                });
            });
          </script>';
        exit();
    } else {
        header("Location: ../../404.html");
        exit;
    }
} elseif (isset($_GET["action"]) && $_GET["action"] == "xoa") {
    $id = $_GET["id"];
    $sql = "DELETE FROM banners WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<script src="../assets/js/sweetalert.min.js"></script>';
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                    title: "ĐÃ XÓA!",
                    text: "Đã xóa thành công!",
                    icon: "success",
                    button: "Đồng ý"
                }).then(() => {
                    window.location.href = "./banners.php";
                });
            });
          </script>';
        exit();
    } else {
        header("Location: ../../404.html");
        exit;
    }
}
?>