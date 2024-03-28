<?php
// include_once("../Template/loadingpage.php");
include_once("../../connect.php");

?>
<?php
if (isset($_POST["addDS"])) {
    $name = $_POST["name"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $des = $_POST["des"];
    $status = $_POST["status"];

    $sql = "INSERT INTO designservices (name, unit, price, status, des) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiss", $name, $unit, $price, $status, $des);
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
                    window.location.href = "./designservices.php";
                });
            });
          </script>';
        exit();
    } else {
        header("Location: ../../404.html");
        exit;
    }
} elseif (isset($_POST["updateDS"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $status = $_POST["status"];
    $des = $_POST["des"];

    $sql = "UPDATE designservices SET name = ?, unit = ?, price = ?, status = ?, des = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiisi", $name, $unit, $price, $status, $des, $id);

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
                    window.location.href = "./designservices.php";
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
    $sql = "DELETE FROM designservices WHERE id = ?";
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
                    window.location.href = "./designservices.php";
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