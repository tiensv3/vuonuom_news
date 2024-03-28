<?php
session_start();
include_once("./connect.php");


// Kiểm tra người dùng đã gửi form đăng nhập hay chưa
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql_check_login = "SELECT * FROM admin WHERE email = ? and password = ?";
    $stmt = $conn->prepare($sql_check_login);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

        $_SESSION['admin'] = $row['email'];
        $_SESSION['userid'] = $row['userid'];
        header('Location: ./admin/Dashboard.php');
        exit();
    } else {
        // Thông báo lỗi đăng nhập
        echo '<script src="./admin/assets/js/sweetalert.min.js"></script>';
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                swal({
                    title: "Thông tin đăng nhập không đúng!",
                    text: "Sai tài khoản hoặc sai mật khẩu",
                    icon: "error",
                    button: "Đồng ý"
                }).then(() => {
                    window.location.href = "./login.php";
                });
            });
          </script>';
        exit();
    }
}
