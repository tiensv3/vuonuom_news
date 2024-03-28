<?php
include './Template/Header.php';
include './Template/Navbar.php';
include './Template/Slider.php';
?>

<div class="m-5 ">
    <h2 class="text-center text-black text-uppercase mb-5" style="letter-spacing: 2px; font-weight:600;">Dịch vụ thiết
        kế</h2>
    <table class="table " style="box-shadow: 0 0 30px rgba(0, 0,0,0.4); border-radius:10px;">
        <thead>
            <tr class="bg-success text-white text-center" style="font-weight: 600; font-size:22px; letter-spacing:2px;">
                <th scope="col" class="p-3">Dịch vụ thiết kế</th>
                <th scope="col" class="p-3">Gói cơ bản</th>
                <th scope="col" class="p-3">Gói nâng cao</th>
                <th scope="col" class="p-3">Gói chuyên nghiệp</th>
            </tr>
        </thead>
        <tbody>
            <?php
			include './connect.php';
			$sql_select_design = "select * from designservices where status = '1' order by id asc";
			$result_select_design = $conn->query($sql_select_design);

			while ($row = mysqli_fetch_array($result_select_design)) {
			?>
            <tr class="text-center">
                <td class="p-4" style="font-size: 20px; font-weight:600;"><?php echo $row['name'] ?></td>
                <td class="p-4" style="font-size: 20px; font-weight:600;">
                    <?php
						if ($row['unit'] == 0) {
							echo number_format($row['price']) . "<sup>đ</sup>";
						}
						?>
                </td>
                <td class="p-4" style="font-size: 20px; font-weight:600;">
                    <?php
						if ($row['unit'] == 1) {
							echo number_format($row['price']) . "<sup>đ</sup>";
						}
						?>
                </td>

                <td class="p-4" style="font-size: 20px; font-weight:600;">
                    <?php
						if ($row['unit'] == 2) {
							echo number_format($row['price']) . "<sup>đ</sup>";
						}
						?>
                </td>

            </tr>
            <?php
			}
			?>
        </tbody>
    </table>

    <div class="row m-8">
        <div class="col-md-8">
            <h3 class="text-black">Lưu ý:</h3>
            <p class="text-black text-justify" style="font-size: 20px; line-height:2.4;">
                <span style="font-size: 23px; font-weight:600;" class="text-uppercase">Thiết kế bộ nhận dạng thương
                    hiệu:</span> <br>
                - <span class="text-uppercase" style="font-weight: 600;">Gói cơ bản:</span> Bao gồm Logo công ty có thể
                đăng ký nhãn hiệu, slogan hoặc tagline, danh thiếp. <br>
                - <span class="text-uppercase" style="font-weight: 600;">Gói nâng cao:</span> Bao gồm gói cơ bản, bìa
                kẹp, bao thư, dù, catologue, móc khóa, huy hiệu, bảng tên nhân viên, giấy tiêu đề. <br>
                - <span class="text-uppercase" style="font-weight: 600;">Gói chuyên nghiệp:</span> Bao gồm gói nâng cao,
                nón bảo hiểm, đồng phục áo thun, đồng phục áo sơ mi, túi, viết, hóa đơn... <br>
                <span style="font-size: 23px; font-weight:600;" class="text-uppercase">Thiết kế bộ phận ấn phẩm truyền
                    thông:</span><br>
                - <span class="text-uppercase" style="font-weight: 600;">Gói cơ bản:</span> Bao gồm Tờ rơi, poster,
                banner, backdrop, voucher. <br>
                - <span class="text-uppercase" style="font-weight: 600;">Gói nâng cao:</span> Bao gồm gói cơ bản,
                catalogue, standee, landing page. <br>
            </p>


        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-outline-success text-uppercase	w-100" data-bs-toggle="modal"
                data-bs-target="#designModal">Đăng ký ngay</button>
        </div>
    </div>
</div>






<!-- Modal -->
<div class="modal fade" id="designModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng ký gói dịch vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./handlePackage.php" method="post">
                    <div class="mb-3">
                        <label for="formFullname" class="text-black">Họ và Tên: </label>
                        <input type="text" name="fullname" id="formFullname" class="form-control" maxlength="50"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="formEmail" class="text-black">Email: </label>
                        <input type="email" name="email" id="formEmail" class="form-control" maxlength="50" required>
                    </div>

                    <div class="mb-3">
                        <label for="formNumberPhone" class="text-black">Số điện thoại: </label>
                        <input type="text" name="phone" id="formNumberPhone" class="form-control" maxlength="20"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="">Gói dịch vụ: </label>
                        <select name="package" id="" class="form-control" required>
                            <option value="">--Chọn gói dịch vụ--</option>
                            <?php
							$sql_option_basic = "SELECT * FROM designservices WHERE status = '1'";
							$result_option_basic = $conn->query($sql_option_basic);

							while ($row = mysqli_fetch_array($result_option_basic)) {
								$unitPackage = '';

								if ($row['unit'] == 0) {
									echo $unitPackage = "Gói cơ bản";
								} else if ($row['unit'] == 1) {
									echo $unitPackage = "Gói nâng cao";
								} else if ($row['unit'] == 2) {
									echo $unitPackage = "Gói chuyên nghiệp";
								}
							?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] . ' - ' . $unitPackage ?>
                            </option>
                            <?php
							}
							?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                        <input type="submit" value="Đăng ký" name="submitDesignPackage" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- script lấy id từ hiển thị bằng java -->
<script>
$('#designModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Nút đã kích hoạt modal
    var packageId = button.data('design-id'); // Lấy id gói dịch vụ từ nút
    var modal = $(this);

    // Cập nhật giá trị của select option trong modal
    modal.find('#packageSelect').val(packageId);
});
</script>

<?php
include './Template/Footer.php';
?>