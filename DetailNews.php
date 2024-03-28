<?php
include "./Template/Header.php";
include "./Template/Navbar.php";
?>

<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('/asset/images/header\ VU.png');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-6">
                <div class="post-entry text-center">
                    <h1 class="mb-4">CHI TIẾT</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'chitiet') {

?>
    <section class="section">
        <div class="container">
            <?php
            include "./connect.php";

            // $id = $_GET['id'];
            $slug = $_GET['slug'];

            $sql_detail_new = "SELECT * FROM news INNER JOIN categories ON news.categoryid = categories.id WHERE news.slug = '" . $slug . "' AND news.status = '1' ";
            $result_detail_new  = $conn->query($sql_detail_new);

            while ($detail_new = mysqli_fetch_array($result_detail_new)) {
            ?>
                <div class="row blog-entries element-animate">

                    <div class="col-md-12 col-lg-12 main-content">

                        <div class="post-content-body">
                            <h2 class="text-center m-3 mb-5 text-black text-uppercase"><?php echo $detail_new['title'] ?></h2>
                            <p class="" style="color: black; text-align:justify;"><?php echo $detail_new['content'] ?></p>
                        </div>


                        <div class="pt-5">
                            <p>Danh mục: <a href="#"><?php echo $detail_new['name'] ?></a></p>
                        </div>
                    </div>
                </div>

        <?php
            }
        }
        ?>
        </div>
    </section>

    <!-- Start posts-entry -->
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-uppercase text-black" style="font-weight: 600;">Bài viết liên quan</div>
            </div>
            <div class="row">
                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'chitiet') {
                    include './connect.php';

                    $current_news_slug = $_GET['slug'];;

                    $sql_select_news_more = "SELECT * FROM news WHERE status = '1' AND slug <> '$current_news_slug' ORDER BY RAND() LIMIT 4";
                    $result_select_news_more = $conn->query($sql_select_news_more);

                    while ($row = mysqli_fetch_array($result_select_news_more, MYSQLI_ASSOC)) {
                ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="blog-entry">
                                <a href="/tin-tuc/<?php echo $row['slug'] ?>" class="img-link">
                                    <img src="/admin/uploads/<?php echo $row['img'] ?>" alt="Image" class="" width="300px" height="220px">
                                </a>
                                <span class="date"><?php echo $row['created_at']; ?></span>
                                <h2><a href="/tin-tuc/<?php echo $row['slug'] ?>" class="gon-chu	"><?php echo $row['title']; ?></a>
                                </h2>
                                <p class="gon-chu-2"><?php echo $row['des']; ?></p>
                                <p><a href="/tin-tuc/<?php echo $row['slug'] ?>" class="btn btn-outline-success">Đọc tiếp</a></p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>
    <!-- End posts-entry -->

    <?php
    include "./Template/Footer.php";
    ?>