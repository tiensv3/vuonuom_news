<?php
include './Template/Header.php';
include './Template/Navbar.php';
include './Template/Slider.php';
?>

<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['keyword']))
                $keyword = $_GET['keyword'];
            ?>
            <div class="col-12">
                <div class="heading">Kết quả: '<?php echo $keyword ?>'</div>
            </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-12">
                <?php
                include './connect.php';
                $sql_search_news = "SELECT * FROM news WHERE title LIKE '%" . $keyword . "%'";
                $sql_search_events = "SELECT * FROM events WHERE name LIKE '%" . $keyword . "%'";
                $result_search_news = $conn->query($sql_search_news);
                $result_search_events = $conn->query($sql_search_events);
                ?>

                <div class="row">
                    <div class="col-md-6 blog-entry-search-item blog-entry" style="border-right: 2px solid #333 ;">
                        <h3 class="text-black mb-3 text-center" style="font-weight: 700; letter-spacing:2px;">TIN TỨC
                        </h3>
                        <?php
                        while ($row = mysqli_fetch_assoc($result_search_news)) {
                        ?>
                            <div class="d-flex mb-4">
                                <a href="./tin-tuc/<?php echo $row['slug'] ?>" class="img-link me-4">
                                    <img src="./admin/uploads/<?php echo $row['img'] ?>" alt="Image" width="230" height="150">
                                </a>
                                <div>
                                    <span class="date"><?php echo $row['created_at'] ?></span>
                                    <h6 class="gon-chu">
                                        <?php echo "<span style='font-weight:600; color:black;'>" . $row['title'] . "</span>"; ?>
                                    </h6>
                                    <p class="gon-chu-2">
                                        <?php
                                        if (isset($row['des'])) {
                                            echo $row['des'];
                                        }
                                        ?>
                                    </p>
                                    <p><a href="./tin-tuc/<?php echo $row['slug'] ?>" class="btn btn-sm btn-outline-primary">Xem chi tiết</a></p>

                                </div>
                            </div>


                        <?php
                        }
                        ?>
                    </div>

                    <div class="col-md-6 blog-entry-search-item blog-entry ">
                        <h3 class="text-black mb-3 text-center" style="font-weight: 700; letter-spacing:2px;">SỰ KIỆN
                        </h3>

                        <?php
                        while ($row1 = mysqli_fetch_assoc($result_search_events)) {
                        ?>
                            <div class="d-flex mb-4 p-3">
                                <a href="./su-kien/<?php echo $row1['slug'] ?>" class="img-link me-4">
                                    <img src="./admin/uploads/<?php echo $row1['img'] ?>" alt="Image" width="230" height="150">
                                </a>
                                <div>
                                    <span class="date"><?php echo $row1['created_at'] ?></span>
                                    <h6 class="gon-chu">
                                        <?php echo "<span style='font-weight:600; color:black;'>" . $row1['name'] . "</span>"; ?>
                                    </h6>
                                    <p class="gon-chu-2">
                                        <?php
                                        if (isset($row1['des'])) {
                                            echo $row1['des'];
                                        }
                                        ?>
                                    </p>
                                    <?php
                                    if ($row1['url'] == null) {
                                    ?>
                                        <p><a href="./su-kien/<?php echo $row1['slug'] ?>" class="btn btn-sm btn-outline-primary">Xem chi tiết</a></p>
                                    <?php
                                    } else {
                                    ?>
                                        <p><a href="<?php echo $row1['url'] ?>" class="btn btn-sm btn-outline-primary">Đăng
                                                ký</a>
                                        </p>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>


                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    include './Template/Footer.php';
    ?>