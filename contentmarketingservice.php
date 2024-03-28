<?php
include './Template/Header.php';
include './Template/Navbar.php';
include './Template/Slider.php';
?>


<!-- content marketing -->
<div class="pricing8 py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h3 class="m-3 text-uppercase text-black">Dịch vụ Content Marketing</h3>
                <h6 class="subtitle font-weight-normal"></h6>
            </div>
        </div>

        <table class="table mt-5 mb-5" style="border-radius: 10px ; box-shadow: 0 0 30px rgba(0,0,0,0.4);">
            <thead>
                <tr class="bg-success text-white text-center">
                    <th scope="col" style="font-size: 22px; font-weight:700; letter-spacing: 2px;">Content Marketing
                    </th>
                    <th scope="col" style="font-size: 22px; font-weight:700; letter-spacing: 2px;">Gói cơ bản</th>
                    <th scope="col" style="font-size: 22px; font-weight:700; letter-spacing: 2px;">Gói nâng cao</th>
                    <th scope="col" style="font-size: 22px; font-weight:700; letter-spacing: 2px;">Gói chuyên nghiệp
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
				include './connect.php';
				$sql_select_contentmarketing = "select * from contentmarketings where status = '1' ORDER BY id asc";
				$result_select_contentmarketing = $conn->query($sql_select_contentmarketing);

				while ($content_marketing = mysqli_fetch_array($result_select_contentmarketing)) {
				?>
                <tr style="font-size: 20px;" class="">
                    <td style="color: black; font-weight:600;" class="text-center p-4">
                        <?php echo $content_marketing['name'] ?>
                    </td>
                    <td style="color: black; font-weight:600;" class="text-center p-4">
                        <?php
							if ($content_marketing['unit'] == 0) {
								echo number_format($content_marketing['price']) . "<sup>đ</sup>";
							}
							?>
                    </td>
                    <td style="color: black; font-weight:600;" class="text-center p-4">

                        <?php
							if ($content_marketing['unit'] == 1) {
								echo number_format($content_marketing['price']) . "<sup>đ</sup>";
							}
							?>
                    </td>
                    <td style="color: black; font-weight:600;" class="text-center p-4">
                        <?php
							if ($content_marketing['unit'] == 2) {
								echo number_format($content_marketing['price']) . "<sup>đ</sup>";
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
                <button type="button" class="btn btn-outline-success text-uppercase	w-100" data-bs-toggle="modal"
                    data-bs-target="#ContentMarketingModal">Đăng ký ngay</button>
            </div>
            <div class="col-md-5">
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ContentMarketingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="" class="text-black">Gói dịch vụ: </label>
                        <select name="package" id="" class="form-control" required>
                            <option value="">--Chọn gói dịch vụ--</option>
                            <?php
							$sql_option_basic = "SELECT * FROM contentmarketings WHERE status = '1'";
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
                        <input type="submit" value="Đăng ký" class="btn btn-success" name="submit_content_marketing">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- script lấy id từ hiển thị bằng java -->
<script>
$('#ContentMarketingModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Nút đã kích hoạt modal
    var packageId = button.data('content-marketing-id'); // Lấy id gói dịch vụ từ nút
    var modal = $(this);

    // Cập nhật giá trị của select option trong modal
    modal.find('#packageSelect').val(packageId);
});
</script>

<?php
include './Template/Footer.php';
?>