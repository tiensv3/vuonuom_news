<?php
include './Template/Header.php';
include './Template/Navbar.php';
include './Template/Slider.php';
?>


<div class="section search-result-wrap">
    <div class="container">

        <div class="row posts-entry">
            <div class="col-lg-8">
                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'events') {
                    include './connect.php';

                    $events_per_page = 4;

                    // Xác định trang hiện tại
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Tính offset (vị trí bắt đầu của kết quả truy vấn)
                    $offset = ($current_page - 1) * $events_per_page;

                    // Truy vấn SQL với phân trang
                    $sql_select_events_all = "SELECT * FROM events WHERE status = '1' ORDER BY id DESC LIMIT $events_per_page OFFSET $offset";
                    $result_select_event_all = $conn->query($sql_select_events_all);

                    while ($event_all = mysqli_fetch_array($result_select_event_all)) {
                ?>
                        <div class="blog-entry d-flex blog-entry-search-item ">
                            <a href="./su-kien/<?php echo $event_all['slug'] ?>" class="img-link me-4">
                                <img src="./admin/uploads/<?php echo $event_all['img'] ?>" alt="Image" class="" width="300px" height="200px">
                            </a>
                            <div>
                                <span class="date"><?php echo $event_all['created_at'] ?> &bullet; <a href="#">Sự
                                        kiện</a></span>
                                <h4><a class="gon-chu" href="./su-kien/<?php echo $event_all['slug'] ?>" class="gon-chu"><?php echo $event_all['name'] ?></a></h4>
                                <p class="gon-chu-2"><?php echo $event_all['des'] ?></p>
                                <?php
                                if ($event_all['url'] > 0) {
                                ?>
                                    <p><a href="<?php echo $event_all['url'] ?>" class="btn btn-sm btn-outline-success">Đăng ký</a>
                                    </p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }

                    // Tính tổng số trang
                    $sql_total_events = "SELECT COUNT(*) AS total FROM events WHERE status = '1'";
                    $result_total_events = $conn->query($sql_total_events);
                    $total_events = mysqli_fetch_assoc($result_total_events)['total'];
                    $total_pages = ceil($total_events / $events_per_page);

                    // Hiển thị phân trang
                    ?>
                    <div class="row text-start pt-5 border-top">
                        <div class="col-md-12">
                            <div class="custom-pagination">
                                <?php for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $current_page) {
                                        echo "<span class='m-2'>$i</span>";
                                    } else {
                                        echo "<a href='?action=events&page=$i'>$i</a>";
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $conn->close();
                } else if (isset($_GET['action']) && $_GET['action'] == 'news') {
                    include './connect.php';

                    $news_per_page = 4;

                    // Xác định trang hiện tại
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Tính offset (vị trí bắt đầu của kết quả truy vấn)
                    $offset = ($current_page - 1) * $news_per_page;

                    // Truy vấn SQL với phân trang
                    $sql_select_news_all = "SELECT * FROM news WHERE status = '1' ORDER BY id DESC LIMIT $news_per_page OFFSET $offset";
                    $result_select_news_all = $conn->query($sql_select_news_all);

                    while ($news_all = mysqli_fetch_array($result_select_news_all)) {
                    ?>
                        <div class="blog-entry d-flex blog-entry-search-item">
                            <a href="./tin-tuc/=<?php echo $news_all['slug'] ?>" class="img-link me-4">
                                <img src="./admin/uploads/<?php echo $news_all['img'] ?>" alt="Image" class="" width="300px" height="200px">
                            </a>
                            <div>
                                <span class="date"><?php echo $news_all['created_at'] ?> &bullet; <a href="#">Sự kiện</a></span>
                                <h4><a href="./tin-tuc/=<?php echo $news_all['slug'] ?>" class="gon-chu"><?php echo $news_all['title'] ?></a></h4>
                                <p><?php echo $news_all['des'] ?></p>
                                <p><a href="./tin-tuc/=<?php echo $news_all['slug'] ?>" class="btn btn-sm btn-outline-success">Xem thêm</a></p>
                            </div>
                        </div>

                    <?php
                    }
                    // Tính tổng số trang
                    $sql_total_events = "SELECT COUNT(*) AS total FROM events WHERE status = '1'";
                    $result_total_events = $conn->query($sql_total_events);
                    $total_events = mysqli_fetch_assoc($result_total_events)['total'];
                    $total_pages = ceil($total_events / $news_per_page);
                    ?>
                    <div class="row text-start pt-5 border-top">
                        <div class="col-md-12">
                            <div class="custom-pagination">
                                <?php for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $current_page) {
                                        echo "<span class='m-2'>$i</span>";
                                    } else {
                                        echo "<a href='?action=news&page=$i'>$i</a>";
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php
                    $conn->close();
                }
                ?>
            </div>

            <div class="col-lg-4 sidebar">

                <div class="sidebar-box search-form-wrap mb-4">
                    <form action="./search.php" class="sidebar-search-form">
                        <span class="bi-search"></span>
                        <input type="search" class="form-control" id="s" name="keyword" placeholder="Tìm kiếm thông tin">
                    </form>
                </div>
                <!-- END sidebar-box -->
                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'events') {
                ?>
                    <div class="sidebar-box">
                        <h3 class="heading">Sự kiện nổi bật</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                <li>
                                    <?php
                                    include './connect.php';
                                    $sql_select_events_hot = "select * from events where statusHot = '1' and status = '1' order by id desc limit 3";
                                    $result_select_events_hot = $conn->query($sql_select_events_hot);

                                    while ($events_hot = mysqli_fetch_array($result_select_events_hot)) {
                                    ?>
                                        <a href="su-kien/<?php echo $events_hot['slug'] ?>">
                                            <img src="./admin/uploads/<?php echo $events_hot['img'] ?>" alt="Image placeholder" class="m-4  rounded" height="100px">
                                            <div class="text">
                                                <h6 style="font-weight: 600; color:black;"><?php echo $events_hot['name'] ?>
                                                </h6>
                                                <div class="post-meta">
                                                    <span class="mr-2"><?php echo $events_hot['created_at'] ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </li>

                            </ul>
                        </div>
                    <?php
                } else if (isset($_GET['action']) && $_GET['action'] == 'news') {
                    ?>
                        <div class="sidebar-box">
                            <h3 class="heading">Tin tức nổi bật</h3>
                            <div class="post-entry-sidebar">
                                <ul>
                                    <li>
                                        <?php
                                        include './connect.php';
                                        $sql_select_news_hot = "select * from news where statusHot = '1' and status = '1' order by id desc limit 3";
                                        $result_select_news_hot = $conn->query($sql_select_news_hot);

                                        while ($news_hot = mysqli_fetch_array($result_select_news_hot)) {
                                        ?>
                                            <a href="tin-tuc/<?php echo $news_hot['slug'] ?>">
                                                <img src="./admin/uploads/<?php echo $news_hot['img'] ?>" alt="Image placeholder" class="m-4  rounded" height="100px">
                                                <div class="text">
                                                    <h6 style="font-weight: 600; color:black;"><?php echo $news_hot['title'] ?>
                                                    </h6>
                                                    <div class="post-meta">
                                                        <span class="mr-2"><?php echo $news_hot['created_at'] ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-box">
                            <h3 class="heading">Danh mục</h3>
                            <ul class="categories">
                                <?php
                                $sql_select_category = "select categories.*, count(news.id) as total_count  from categories left join news ON categories.id = news.categoryid GROUP BY categories.id  order by id desc";
                                $result_select_category = $conn->query($sql_select_category);

                                while ($category = mysqli_fetch_array($result_select_category)) {
                                ?>
                                    <li><a href="#"><?php echo $category['name'] ?>
                                            <span><?php echo '(' . $category['total_count'] . ')' ?></span></a></li>
                                <?php
                                }
                                $conn->close();
                                ?>
                            </ul>
                        </div>
                    <?php
                }
                    ?>
                    <!-- END sidebar-box -->


                    </div>
            </div>
        </div>
    </div>

    <?php
    include './Template/Footer.php';
    ?>