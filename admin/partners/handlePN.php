<?php
// include_once("../Template/loadingpage.php");
include_once("../../isAdmin.php");

include_once("../../connect.php");

?>
<?php
if (isset($_POST["addPN"])) {
    // img
    $imageDirectory = "../uploads/";
    $currentDateTime = date("YmdHis");
    $newFileName = "partner" . "_" . $currentDateTime . "_" . basename($_FILES["img"]["name"]);
    $newFilePath = $imageDirectory . $newFileName;
    $tempFilePath = $_FILES["img"]["tmp_name"];
    move_uploaded_file($tempFilePath, $newFilePath);

    $status = $_POST["status"];

    $sql = "INSERT INTO partners (img, status) VALUE ('$newFilePath', $status)";
    $result = $conn->query($sql);

    if ($result == true) {
        echo '<script src="../assets/js/sweetalert.min.js"></script>';
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                    title: "ĐÃ THÊM!",
                    text: "Đã thêm thành công!",
                    icon: "success",
                    button: "Đồng ý"
                }).then(() => {
                    window.location.href = "./partners.php";
                });
            });
          </script>';
        exit();
    } else {
        header("Location: ../../404.html");
        exit;
    }
} elseif (isset($_POST["updatePN"])) {
    $id = $_POST["id"];
    //img
    $imageDirectory = "../upload/";
    $currentDateTime = date("YmdHis");
    $newFileName = "partner" . "_" . $currentDateTime . "_" . basename($_FILES["img"]["name"]);
    $newFilePath = $imageDirectory . $newFileName;
    $tempFilePath = $_FILES["img"]["tmp_name"];
    move_uploaded_file($tempFilePath, $newFilePath);

    $status = $_POST["status"];

    $sql = "UPDATE partners SET img = '$newFilePath', status = $status WHERE id = $id";

    $result = $conn->query($sql);

    if ($result == true) {
        echo '<script src="../assets/js/sweetalert.min.js"></script>';
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                    title: "ĐÃ CẬP NHẬT!",
                    text: "Đã cập nhật thành công!",
                    icon: "success",
                    button: "Đồng ý"
                }).then(() => {
                    window.location.href = "./partners.php";
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
    $sql = "DELETE FROM partners WHERE id = $id";
    $result = $conn->query($sql);

    if ($result == true) {
        echo '<script src="../assets/js/sweetalert.min.js"></script>';
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                    title: "ĐÃ XÓA!",
                    text: "Đã xóa thành công!",
                    icon: "success",
                    button: "Đồng ý"
                }).then(() => {
                    window.location.href = "./partners.php";
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