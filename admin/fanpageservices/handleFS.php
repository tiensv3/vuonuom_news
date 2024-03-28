<?php
// include_once("../Template/loadingpage.php");
include_once("../../isAdmin.php");

include_once("../../connect.php");

?>
<?php
if (isset($_POST["addFS"])) {
    $des = $_POST["des"];
    $unit = $_POST["unit"];
    $price = isset($_POST["price"]) ? $_POST["price"] : 'NULL';

    $status = $_POST["status"];

    $sql = "INSERT INTO fanpageservices (des, unit, price, status) VALUE ('$des', $unit, $price, $status)";
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
                    window.location.href = "./fanpageservices.php";
                });
            });
          </script>';
        exit();
    } else {
        header("Location: ../../404.html");
        exit;
    }
} elseif (isset($_POST["updateFS"])) {
    $id = $_POST["id"];
    $des = $_POST["des"];
    $unit = $_POST["unit"];
    $price = $_POST["price"] > 0 ? $_POST["price"] : "NULL";
    $status = $_POST["status"];
    if ($price == NULL) {
        $sql = "UPDATE fanpageservices SET des = '$des', unit = $unit, status = $status WHERE id = $id";
    } else {
        $sql = "UPDATE fanpageservices SET des = '$des', unit = $unit, price = $price, status = $status WHERE id = $id";
    }
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
                    window.location.href = "./fanpageservices.php";
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
    $sql = "DELETE FROM fanpageservices WHERE id = $id";
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
                    window.location.href = "./fanpageservices.php";
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