<?php
include "./Template/Header.php";
include "./Template/Navbar.php";
include "./Template/Slider.php";
?>
<div class="container mt-5">
    <h3 class="text-center m-5 text-uppercase text-black" style="font-weight: 800; letter-spacing: 4px;">Dịch vụ cơ bản
    </h3>
    <table class="table rounded" style="box-shadow: 0 0 20px rgba(0,0,0,0.4)">
        <thead class="bg-success text-white">
            <tr class="text-uppercase ">
                <th scope="col" style="font-size:22px; padding:13px 28px; text-align:left;">Dịch vụ</th>
                <th scope="col" style="font-size:22px; padding:13px; text-align:left;">Đơn vị (tính)</th>
                <th scope="col" style="font-size:22px; padding:13px 28px; text-align:right;">Đơn giá</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include './connect.php';
            $sql_select_basic = "select * from basicservices where status = '1'";
            $result_select_basic = $conn->query($sql_select_basic);

            while ($basic = mysqli_fetch_array($result_select_basic)) {
            ?>
                <tr style="font-size: 20px;" class="">
                    <td class="p-4" style="font-weight: 600; font-size:20px;">
                        <?php echo "<span>" . $basic['name'] . "</span>" ?></td>
                    <td class="p-4" style="font-weight: 600; font-size:20px;">
                        <?php
                        if ($basic['unit'] == 0) {
                            echo "<span style='font-weight:600; text-align: left;'>Buổi</span>";
                        } else if ($basic['unit'] == 1) {
                            echo "<span style='font-weight:600; text-align: left;'>Tháng</span>";
                        } else if ($basic['unit'] == 2) {
                            echo "<span style='font-weight:600; text-align: left;'>Gói cơ bản</span>";
                        } else if ($basic['unit'] == 3) {
                            echo "<span style='font-weight:600; text-align: left;'>Gói nâng cao</span>";
                        } else if ($basic['unit'] == 4) {
                            echo "<span style='font-weight:600; text-align: left;'>Gói chuyên nghiệp</span>";
                        }
                        ?>
                    </td>
                    <td class="p-4" style="font-weight: 600; font-size:20px;">
                        <?php
                        if ($basic['price'] != null) {
                            echo "<div style='text-align: right;'>" . number_format($basic['price']) .    "<sup>đ</sup>" . "</div>" ?>

                        <?php
                        } else {
                            echo "<div style='text-align: right;'>" . 'Thỏa thuận' . "</div>";
                        }
                        ?>


                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="row m-5">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <button type="button" class="btn btn-outline-success text-uppercase	w-100" data-bs-toggle="modal" data-bs-target="#exampleModalBasic">Đăng ký ngay</button>
        </div>
        <div class="col-md-5">
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalBasic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="exampleModalLabel">Đăng ký gói dịch vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./handlePackage.php" method="post">
                    <div class="mb-3">
                        <label for="" class="text-black">Họ và Tên: </label>
                        <input type="text" name="fullname" class="form-control" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="text-black">Email: </label>
                        <input type="email" name="email" class="form-control" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="text-black">Số điện thoại: </label>
                        <input type="text" name="phone" class="form-control" maxlength="20" required>
                    </div>

                    <div class="mb-3">
                        <label for="">Gói dịch vụ: </label>
                        <select name="package" id="" class="form-control" required>
                            <option value="">--Chọn gói dịch vụ--</option>
                            <?php
                            $sql_option_basic = "SELECT * FROM basicservices WHERE status = '1'";
                            $result_option_basic = $conn->query($sql_option_basic);

                            while ($row = mysqli_fetch_array($result_option_basic)) {

                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                        <input type="submit" value="Đăng ký" name="submitBasicPackage" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script>
	$('#exampleModalBasic').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget); // Nút đã kích hoạt modal
		var packageId = button.data('basic-id'); // Lấy id gói dịch vụ từ nút
		var modal = $(this);

		// Cập nhật giá trị của select option trong modal
		modal.find('#packageSelect').val(packageId);
	});
</script> -->

<script>
    $(document).ready(function() {
        $('.slick-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000, // Tốc độ chuyển slide (milisecond)
            dots: true
        });
    });
</script>



<?php
include "./Template/Footer.php";
?>