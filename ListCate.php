<?php

include "./Template/Header.php";
include "./Template/Navbar.php";
?>


<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'danhmuc') {
                include "./connect.php";
                $id = $_GET['id'];
                $sql_select_name_cate = "SELECT categories.name FROM categories WHERE id = '" . $id . "'";
                $result_select_name_cate = $conn->query($sql_select_name_cate);
                $name_cate = $result_select_name_cate->fetch_assoc();
            ?>
                <div class="col-12 mb-5">
                    <div class="text-black"><span class="heading text-uppercase">Danh mục:</span>
                        <?php echo  $name_cate['name'] ?></div>
                </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-8">
                <?php

                // Phân trang
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 4; // Số lượng bài viết trên mỗi trang
                $offset = ($page - 1) * $limit;

                // Lấy tổng số lượng bài viết
                $sql_count_posts = "SELECT COUNT(*) AS total FROM news WHERE categoryid = '" . $id . "'";
                $result_count_posts = $conn->query($sql_count_posts);
                $row_count_posts = $result_count_posts->fetch_assoc();
                $total_pages = ceil($row_count_posts['total'] / $limit);

                $sql_select_cate = "select news.*, categories.* , news.id as idNews from news inner join categories on news.categoryid = categories.id where news.categoryid = '" . $id . "'  LIMIT $offset, $limit";
                $result_select_cate = $conn->query($sql_select_cate);

                while ($listcate  = mysqli_fetch_array($result_select_cate)) {
                ?>
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="./tin-tuc/<?php echo $listcate['slug'] ?>" class="img-link me-4">
                            <img src="./admin/uploads/<?php echo $listcate['img'] ?>" alt="Image" class="img-fluid" width="230" height="200">
                        </a>
                        <div>
                            <span class="date"><?php echo $listcate['created_at'] ?> &bullet; <a href="#"><?php echo $name_cate['name'] ?></a></span>
                            <h5 class="gon-chu"><a href="./tin-tuc/<?php echo $listcate['slug'] ?>" class=" text-black"><?php echo $listcate['title'] ?></a></h5>
                            <p class="gon-chu"><?php echo $listcate['des'] ?></p>
                            <p><a href="./tin-tuc/<?php echo $listcate['slug'] ?>" class="btn btn-sm btn-outline-success">Xem thêm</a></p>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="row text-start pt-5 border-top">
                    <div class="col-md-12">
                        <div class="custom-pagination">
                            <?php
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<a href='?action=danhmuc&id=$id&page=$i' style='margin-left: 10px;'>$i</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
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
                <div class="sidebar-box">
                    <h3 class="heading">Tin tức nổi bật</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <?php
                            $sql_select_news_hot = "select * from news where statushot= '1' and status= '1' order by id desc limit 3";
                            $result_select_news_hot = $conn->query($sql_select_news_hot);

                            while ($newsHot = mysqli_fetch_array($result_select_news_hot)) {
                            ?>
                                <li>
                                    <a href="./tin-tuc/<?php echo $newsHot['slug'] ?>">
                                        <img src="./admin/uploads/<?php echo $newsHot['img'] ?>" alt="Image placeholder" class="me-4 rounded">
                                        <div class="text">
                                            <h6 class="text-black gon-chu"><?php echo $newsHot['title'] ?></h6>
                                            <div class="post-meta">
                                                <span class="mr-2"><?php echo $newsHot['created_at'] ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

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
                        ?>
                    </ul>
                </div>
                <!-- END sidebar-box -->


            </div>
        </div>
    </div>
</div>

<?php
include "./Template/Header.php";
?>