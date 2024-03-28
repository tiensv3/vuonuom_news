<?php
include_once("../Template/header.php");
?>
<style>
    table {
        width: 100%;
        table-layout: fixed;
        padding: 0;
        margin: 0px !important;
    }

    td {
        width: 100% !important;
        text-align: left !important;
        white-space: pre-wrap !important;
        word-wrap: break-word !important;

    }
</style>
<?php
include_once("../Template/nav.php");
include_once("../Template/side.php");
include_once("../../connect.php");
?>

<!-- partial -->
<div class="main-panel">
    <div class="container">

        <h1 class="text-center text-uppercase mt-5">Danh sách đăng ký dịch vụ</h1>
        <table class="table" id="dtTable1">
            <thead class="table table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tin nhắn</th>
                    <!-- <th scope="col"></th> -->
                    <!-- <th scope="col">Đơn vị tính</th> -->


                </tr>
            </thead>
            <tbody>
                <?php
                $sql_select_ct = "SELECT * FROM contacts ORDER BY id DESC        
                             ";
                $result_select_ct = $conn->query($sql_select_ct);
                $i = 1;
                while ($row = $result_select_ct->fetch_assoc()) {


                ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['message'] ?></td>

                    </tr>
                <?php
                    $i++;
                }
                ?>

            </tbody>
        </table>
    </div>

    <?php
    include_once("../Template/footer.php");

    ?>