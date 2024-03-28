<?php
include "./Template/Header.php";
include "./Template/Navbar.php";
include "./Template/Slider.php";
?>

<div class="pricing6 py-5 bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 text-center">
				<h3 class="mb-3">Gói cơ bản</h3>
				<h6 class="subtitle font-weight-normal"></h6>
			</div>
		</div>
		<!-- row  -->
		<div class="row mt-4">
			<!-- column  -->

			<?php
			include "./connect.php";

			// Số dòng dữ liệu trên mỗi trang
			$rows_per_page = 2;

			// Xác định trang hiện tại
			if (isset($_GET['page']) && is_numeric($_GET['page'])) {
				$current_page = $_GET['page'];
			} else {
				$current_page = 1;
			}

			// Số lượng dòng dữ liệu trong bảng
			$sql_count = "SELECT COUNT(*) AS count FROM basicservices";
			$result_count = $conn->query($sql_count);
			$row_count = $result_count->fetch_assoc();
			$total_rows = $row_count['count'];

			// Tính tổng số trang
			$total_pages = ceil($total_rows / $rows_per_page);

			// Xác định vị trí của bản ghi đầu tiên trên mỗi trang
			$offset = ($current_page - 1) * $rows_per_page;

			$sql_select_basic = "select * from basicservices  order by id asc limit $offset, $rows_per_page";
			$result_select_basic = $conn->query($sql_select_basic);

			while ($basic = mysqli_fetch_array($result_select_basic)) {
			?>
				<div class="col-md-6">
					<div class="card card-shadow border-0 mb-4">
						<div class="card-body p-4">
							<div class="d-flex align-items-center">
								<h5 class="font-weight-medium mb-0">
									<?php
									echo "<span class='text-uppercase' style='font-weight: 800;'> Dịch vụ: </span>" . $basic['name'];
									?>
								</h5>
								<!-- <div class="ml-auto"><span class="badge badge-danger font-weight-normal p-2">Popular</span></div> -->
							</div>
							<div class="row">
								<div class="col-lg-5 text-center">
									<div class="price-box my-3">
										<span class="text-dark display-6"><?php echo number_format($basic['price']) ?></span><sup>đ</sup>
										<h6 class="font-weight-light">
											<?php
											if ($basic['unit'] == 0) {
												echo "Buổi";
											} else if ($basic['unit'] == 1) {
												echo "Tháng";
											} else if ($basic['unit'] == 2) {
												echo "Gói cơ bản";
											} else if ($basic['unit'] == 3) {
												echo "Gói doanh nghiệp";
											} else if ($basic['unit'] == 4) {
												echo "Gói chuyên nghiệp";
											}
											?></h6>
										<a class="btn btn-info-gradiant font-14 border-0 text-white p-3 btn-block mt-3" href="#">Đăng ký </a>
									</div>
								</div>
								<div class="col-lg-7 align-self-center">
									<ul class="list-inline pl-3 font-14 font-weight-medium text-dark">
										<li class="py-2"><i class="icon-check text-info mr-2"></i> <span>6 Days a Week </span></li>
										<li class="py-2"><i class="icon-check text-info mr-2"></i> <span>Dedicated Trainer</span></li>
										<li class="py-2"><i class="icon-check text-info mr-2"></i> <span>Diet Plan Included </span></li>
										<li class="py-2"><i class="icon-check text-info mr-2"></i> <span>Morning and Evening Batches</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- column  -->
			<?php
			}
			?>
			<div class="pagination">
				<?php if ($current_page > 1) : ?>
					<a href="?page=<?php echo ($current_page - 1); ?>" class="page-link">&laquo; Trang trước</a>
				<?php endif; ?>

				<?php for ($i = 1; $i <= $total_pages; $i++) : ?>
					<a href="?page=<?php echo $i; ?>" class="page-link <?php if ($current_page == $i) echo 'active'; ?>"><?php echo $i; ?></a>
				<?php endfor; ?>

				<?php if ($current_page < $total_pages) : ?>
					<a href="?page=<?php echo ($current_page + 1); ?>" class="page-link">Trang tiếp &raquo;</a>
				<?php endif; ?>
			</div>

		</div>
	</div>
</div>










<?php
include "./Template/Footer.php";
?>