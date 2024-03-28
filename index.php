<?php
include("./Template/Header.php");
include("./Template/Navbar.php");
include("./Template/Slider.php");
?>

<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h1 class="text-uppercase text-black" style="font-weight: 800;">Sự kiện nổi bật</h1>
            </div>
            <div class="col-sm-6 text-sm-end" style="font-size:21px;"><a href="./su-kien" class="read-more">Xem tất
                    cả</a></div>
            <hr>
        </div>
        <div class="row g-3">
            <div class="col-md-9">
                <div class="row g-3">
                    <?php
                    include("./connect.php");
                    $sql_select_event_hot = "SELECT * FROM events WHERE statusHot = '1' AND status = '1' order by id DESC limit 2";
                    $result_select_event_hot = $conn->query($sql_select_event_hot);
                    ?>
                    <?php
                    while ($result_event_hot  = mysqli_fetch_array($result_select_event_hot)) {
                    ?>
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="./su-kien/<?php echo $result_event_hot['slug'] ?>" class="img-link">
                                    <img src="./admin/uploads/<?php echo $result_event_hot['img'] ?>" alt="Image" class="" width="465" height="350">
                                </a>
                                <br />
                                <span class="date mt-2 mb-2 text-black"><?php echo $result_event_hot['created_at'] ?></span>
                                <h2 class="mb-3"><a href="./su-kien/<?php echo $result_event_hot['slug'] ?>" class="text-black " style="color: black; font-weight:600;"><?php echo $result_event_hot['name'] ?></a>
                                </h2>
                                <p>

                                    <a href="<?php echo $result_event_hot['url'] ?>" class="btn btn-sm btn-success">Đăng
                                        ký</a>

                                </p>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled blog-entry-sm">
                    <?php
                    $sql_select_event = "SELECT * FROM events where status = '1' order by rand() desc limit 3";
                    $result_select_event = $conn->query($sql_select_event);

                    while ($event = mysqli_fetch_array($result_select_event)) {

                    ?>
                        <li>
                            <div class="row">
                                <div class="col-sm-5">
                                    <a href="./su-kien/<?php echo $event['slug'] ?>">
                                        <img src="./admin/uploads/<?php echo $event['img'] ?>" alt="" class="m-2 img-fluid">
                                    </a>
                                </div>
                                <div class="col-sm-7">
                                    <span class="date"><?php echo $event['created_at'] ?></span>
                                    <h3><a href="./su-kien/<?php echo $event['slug'] ?>" style="color: green; font-weight:600;" class="gon-chu"><?php echo $event['name'] ?></a></h3>
                                    <p><a href="./su-kien/<?php echo $event['slug'] ?>" class="btn btn-outline-warning p-2 text-black">Xem chi tiết</a></p>

                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End posts-entry -->



<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h1 class="text-uppercase text-black" style="font-weight: 800;">Tin tức nổi bật</h1>

            </div>
            <div class="col-sm-6 text-sm-end"><a href="./tin-tuc" class="read-more">Xem tất cả</a></div>
            <hr>
        </div>
        <div class="row g-3">
            <div class="col-md-9">
                <div class="row g-3">
                    <?php
                    $sql_select_new_hot = "SELECT * FROM news WHERE statusHot = '1' AND status = '1' order by id DESC LIMIT 2";
                    $result_select_new_hot = $conn->query($sql_select_new_hot);

                    while ($news_hot = mysqli_fetch_array($result_select_new_hot)) {
                    ?>
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="single.html" class="img-link">
                                    <img src="./admin/uploads/<?php echo $news_hot['img'] ?>" alt="Image" width="465" height="300">
                                </a>
                                <span class="date"><?php echo $news_hot['created_at'] ?></span>
                                <h2 class="mt-3 mb-3"><a href="./tin-tuc/<?php echo $news_hot['slug'] ?>" style="color: black; font-weight:600;" class=""><?php echo $news_hot['title'] ?></a>
                                </h2>
                                <p class="gon-chu"><?php echo $news_hot['des'] ?></p>
                                <p><a href="./tin-tuc/<?php echo $news_hot['slug'] ?>" class="btn btn-sm btn-success">Xem
                                        chi tiết</a></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-3 order-md-2">
                <ul class="list-unstyled blog-entry-sm">
                    <?php
                    $sql_select_news = "SELECT * FROM news WHERE status = '1' ORDER BY RAND() LIMIT 3";
                    $result_select_news = $conn->query($sql_select_news);

                    while ($select_news = mysqli_fetch_array($result_select_news)) {
                    ?>
                        <li>
                            <div class="row">
                                <div class="col-sm-5">
                                    <img src="./admin/uploads/<?php echo $select_news['img'] ?>" alt="" class="m-2 img-fluid">
                                </div>
                                <div class="col-sm-7">
                                    <span class="date"><?php echo $select_news['created_at'] ?></span>
                                    <h5><a href="./tin-tuc/<?php echo $select_news['slug'] ?> " style="color: green; font-weight:600;" class="gon-chu"><?php echo $select_news['title'] ?></a></h5>
                                    <p class="gon-chu-2"><?php echo $select_news['des'] ?></p>
                                    <p><a href="./tin-tuc/<?php echo $select_news['slug'] ?>" class="btn btn-outline-primary">xem chi tiết</a></p>

                                </div>
                            </div>
                        </li>

                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

        <hr>

        <section>
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <h2 class="text-center text-uppercase text-success" style="font-weight: 800; letter-spacing: 3px;">Đối tác</h2>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="./asset/partime/1.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>
                            <div class="col-md-3">
                                <img src="./asset/partime/2.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>
                            <div class="col-md-3">
                                <img src="./asset/partime/3.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>
                            <div class="col-md-3">
                                <img src="./asset/partime/4.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="./asset/partime/5.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>
                            <div class="col-md-3">
                                <img src="./asset/partime/6.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>
                            <div class="col-md-3">
                                <img src="./asset/partime/7.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>
                            <div class="col-md-3">
                                <img src="./asset/partime/8.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="./asset/partime/9.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>
                            <div class="col-md-3">
                                <img src="./asset/partime/10.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>
                            <div class="col-md-3">
                                <img src="./asset/partime/11.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>
                            <div class="col-md-3">
                                <img src="./asset/partime/canada.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>

                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="./asset/partime/sme.png" class="" alt="..." width="150px" height="150px" style="margin: 10px 60px">
                            </div>
                            <div class="col-md-3">
                                <img src="./asset/partime/tvu.png" class="" alt="..." width="200px" height="150px" style="margin: 10px 60px">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev btn btn-success" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Lùi</span>
                </button>
                <button class="carousel-control-next btn btn-success" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Tiến</span>
                </button>
            </div>
        </section>
    </div>
</section>







<?php
include("./Template/Footer.php");
?>