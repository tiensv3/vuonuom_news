<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
		include './connect.php';
		$sql_select_banner = "SELECT * FROM banners WHERE status = '1' ORDER BY id DESC";
		$result_select_banner = $conn->query($sql_select_banner);
		$indicator_counter = 0; // Counter for indicators

		if ($result_select_banner->num_rows > 0) {
			while ($row = mysqli_fetch_array($result_select_banner)) {
		?>
        <!-- Indicators -->
        <button type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="<?php echo $indicator_counter; ?>"
            <?php echo $indicator_counter == 0 ? 'class="active"' : ''; ?> aria-current="true"
            aria-label="Slide <?php echo $indicator_counter + 1; ?>"></button>
        <?php
				$indicator_counter++;
			}
		}
		?>
    </div>
    <div class="carousel-inner">
        <?php
		// Reset counter for items
		$item_counter = 0;
		$result_select_banner->data_seek(0); // Reset result pointer

		while ($row = mysqli_fetch_array($result_select_banner)) {
		?>
        <div class="carousel-item <?php echo $item_counter == 0 ? 'active' : ''; ?>">
            <img src="../admin/uploads/<?php echo $row['img']; ?>" class="d-block w-100" alt="..." width="100%">
        </div>
        <?php
			$item_counter++;
		}
		?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



<script>
$(document).ready(function() {
    function startCarousel() {
        // Sử dụng sự kiện slide.bs.carousel để bắt đầu chạy tự động
        $('#carouselExampleCaptions').on('slide.bs.carousel', function() {
            // Tạm dừng chạy tự động sau mỗi 5 giây
            $('#carouselExampleCaptions').carousel('pause').delay(3000).queue(function(next) {
                $(this).carousel('next'); // Chuyển đến slide tiếp theo
                next();
            });
        });

        // Chạy tự động lần đầu tiên
        $('#carouselExampleCaptions').carousel('pause').delay(3000).queue(function(next) {
            $(this).carousel('next');
            next();
        });
    }

    // Kích hoạt lại carousel khi tab được hiển thị
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        var target = $(e.target).attr("href"); // Lấy ID của tab đã được chọn
        if (target === "#carousel-tab") {
            startCarousel(); // Bắt đầu carousel lại
        }
    });

    // Kích hoạt carousel lần đầu tiên
    startCarousel();
});
</script>