<?php
include "./Template/Header.php";
include "./Template/Navbar.php";
include "./Template/Slider.php";
?>

<div class="container">
    <h2 class="m-3 text-uppercase text-center text-black" style="font-weight: 800; letter-spacing:2px;">Dịch vụ chăm sóc
        fanpage</h2>
    <table class="table m-5" style="box-shadow: 0 0 20px rgba(0,0,0,0.4)">
        <thead>
            <tr class="bg-success text-white">
                <?php
                $sql_select_price = "select price, unit from fanpageservices where status = '1'";
                $result_select_price = $conn->query($sql_select_price);

                while ($row = mysqli_fetch_array($result_select_price)) {
                ?>
                    <th scope="col" style="font-weight: 600; font-size: 1.4rem;" class="text-center text-uppercase">
                        <?php
                        if ($row['unit'] == '0') {
                            echo "Gói cơ bản";
                        } else if ($row['unit'] == 1) {
                            echo "Gói nâng cao";
                        } else if ($row['unit'] == 2) {
                            echo "Gói chuyên nghiệp";
                        }
                        ?>
                        <br>
                        <?php
                        if ($row['unit'] == '0') {
                            echo number_format($row['price']) . '<sup>đ</sup>';
                        } else if ($row['unit'] == 1) {
                            echo number_format($row['price']) . '<sup>đ</sup>';
                        } else if ($row['unit'] == 2) {
                            echo number_format($row['price']) . '<sup>đ</sup>';
                        }
                        ?>
                    </th>

                <?php
                }
                ?>

            </tr>
        </thead>
        <tbody>

            <?php
            include './connect.php';
            $sql_select_fanpage = "SELECT * FROM fanpageservices WHERE status = '1' ORDER BY id ASC";
            $result_select_fanpage = $conn->query($sql_select_fanpage);

            echo '<tr>'; // Bắt đầu một hàng mới ở đầu vòng lặp

            while ($row = mysqli_fetch_array($result_select_fanpage)) {
                echo '<td>';
                if ($row['unit'] == 0 || $row['unit'] == 1 || $row['unit'] == 2) {
                    echo "<div style='font-size:1.3rem; padding: 10px 40px'>" . $row['des'] . "</div>";
                }
                echo '</td>';
            }

            echo '</tr>'; // Kết thúc hàng ở cuối vòng lặp
            ?>
        </tbody>
    </table>
    <div class="row m-5">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <button type="button" class="btn btn-outline-success text-uppercase	w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Đăng ký ngay</button>
        </div>
        <div class="col-md-5">
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black text-uppercase" id="exampleModalLabel">Đăng ký gói</h5>
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
                        <label for="" class="text-black">Gói dịch vụ: </label>
                        <select name="package" id="packageSelect" class="form-control" required>
                            <option value="">---Chọn gói dịch vụ---</option>
                            <?php
                            $sql_select_package_fanpage = "select * from fanpageservices where status = '1' order by id asc";
                            $result_select_package_fanpage  = $conn->query($sql_select_package_fanpage);

                            while ($row = mysqli_fetch_array($result_select_package_fanpage)) {
                            ?>
                                <option value="<?php echo $row['id'] ?>">
                                    <?php
                                    if ($row['unit'] == 0) {
                                        echo "Gói cơ bản";
                                    } else if ($row['unit'] == 1) {
                                        echo "Gói nâng cao";
                                    } else if ($row['unit'] == 2) {
                                        echo "Gói chuyên nghiệp";
                                    }
                                    ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                <input type="submit" class="btn btn-primary" value="Đăng ký" name="submitFanpage">
            </div>
            </form>
        </div>

    </div>
</div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Nút đã kích hoạt modal
        var packageId = button.data('package-id'); // Lấy id gói dịch vụ từ nút
        var modal = $(this);

        // Cập nhật giá trị của select option trong modal
        modal.find('#packageSelect').val(packageId);
    });
</script>



<!-- Initialize Slick Slider
<script>
	$(document).ready(function() {
		$('.row.m-5').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 1500,
			arrows: false,
			dots: true
		});
	});
</script> -->

<?php
include './Template/Footer.php';
?>