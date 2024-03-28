<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav" style="background-color: white;">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <a href="../trang-chu" class="logo m-0 float-start">
                            <img src="../admin/assets/images/TBI.jpg" alt="" width="150px">
                            <span class="text-primary"></span></a>
                    </div>
                    <div class="col-8 text-center">
                        <form action="#" class="search-form d-inline-block d-lg-none">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form>

                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li style="margin-right: 20px;" class=" active"><a style="font-size: 18px;  font-weight:600; color:green;" class="text-uppercase" href="../trang-chu">Trang chủ</a></li>
                            <li style="margin-right: 20px;" class=" has-children">
                                <a style="font-size: 18px;  font-weight:600;color:green;" class="text-uppercase">Giới thiệu</a>
                                <ul class="dropdown">
                                    <li><a href="../lich-su-hinh-thanh">Lịch sử hình thành</a></li>
                                    <li><a href="../ve-chung-toi">Về chúng tôi</a></li>
                                    <li><a href="../so-do-to-chuc">Sơ đồ tổ chức</a></li>
                                    <li><a href="../hoi-dong-co-van-chien-luoc-tra-vinh">Hội đồng cố vấn chiến lược</a></li>
                                    <li><a href="../hoi-dong-co-van-khoi-nghiep-tra-vinh">Hội đồng cố vấn khởi nghiệp tỉnh trà vinh</a></li>
                                </ul>
                            </li>
                            <li style="margin-right: 20px;" class=" has-children">
                                <a style="font-size: 18px;  font-weight:600;color:green;" class="text-uppercase">Dịch
                                    vụ</a>
                                <ul class="dropdown">
                                    <li><a href="../dich-vu-co-ban">Dịch vụ cơ bản</a></li>
                                    <li><a href="../content-marketing">Dịch vụ content marketing</a></li>
                                    <li><a href="../dich-vu-thiet-ke">Dịch vụ thiết kế</a></li>
                                    <li><a href="../dich-vu-cham-soc-fanpage">Dịch vụ chăm sóc fanpage </a></li>
                                    <!-- <li class="has-children">
                                        <a href="#">Dropdown</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Sub Menu One</a></li>
                                            <li><a href="#">Sub Menu Two</a></li>
                                            <li><a href="#">Sub Menu Three</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </li>
                            <li style="margin-right: 20px;" class=" has-children">
                                <a style="font-size: 18px;  font-weight:600; color:green;" class="text-uppercase">Tin
                                    tức</a>
                                <ul class="dropdown">
                                    <?php
                                    include("./connect.php");
                                    $sql_select_category = "SELECT * FROM categories order by id desc";
                                    $result_select_category = $conn->query($sql_select_category);

                                    while ($cate = mysqli_fetch_array($result_select_category)) {
                                    ?>
                                        <li>
                                            <a href="../danh-muc-<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></a>
                                        </li>
                                    <?php
                                    }
                                    $conn->close();
                                    ?>
                                </ul>
                            </li>


                            <li><a href="../lien-he" style="font-size: 18px;  font-weight:600; color:green;" class="text-uppercase">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="col-2 text-end">
                        <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                        <form action="../search.php" class="search-form d-none d-lg-inline-block">
                            <input type="search" class="form-control" name="keyword" placeholder="Tìm kiếm...">
                            <span class="bi-search"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>