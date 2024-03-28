<?php
// include_once("../Template/loadingpage.php");
include_once("../../isAdmin.php");

include_once("../../connect.php");

?>
<?php
if (isset($_POST["addBS"])) {
    $name = $_POST["name"];
    $unit = $_POST["unit"];
    $price = $_POST["price"] > 0 ? $_POST["price"] : NULL;
    $status = $_POST["status"];
    $des = $_POST["des"];
    $sql = "INSERT INTO basicservices (name, unit, price, status, des) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sisis", $name, $unit, $price, $status, $des);

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
                    window.location.href = "./basicservices.php";
                });
            });
          </script>';
        exit();
    } else {
        header("Location: ../../404.html");
        exit;
    }
} elseif (isset($_POST["updateBS"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $unit = $_POST["unit"];
    $price = isset($_POST["price"]) && $_POST["price"] > 0 ? $_POST["price"] : NULL;
    $status = $_POST["status"];
    $des = $_POST["des"];

    if ($price === NULL) {
        $sql = "UPDATE basicservices SET name = ?, unit = ?, status = ?, price = ?, des = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siiisi", $name, $unit, $status, $price, $des, $id);
    } else {
        $sql = "UPDATE basicservices SET name = ?, unit = ?, price = ?, status = ?, des = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siissi", $name, $unit, $price, $status, $des, $id);
    }

    $stmt->execute();

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
                    window.location.href = "./basicservices.php";
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
    $sql = "DELETE FROM basicservices WHERE id = ?";
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
                    window.location.href = "./basicservices.php";
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