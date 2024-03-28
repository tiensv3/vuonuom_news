<?php
include "./Template/Header.php";
include "./Template/Navbar.php";

?>
<?php
include "./connect.php";
if (isset($_GET['action']) && $_GET['action'] == 'chitiet') {
    $slug = $_GET['slug'];

    $sql_detail = "SELECT * FROM events WHERE slug  = '" . $slug . "'";
    $result_detail = $conn->query($sql_detail);

    while ($row = mysqli_fetch_array($result_detail)) {
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

        <section class="section">
            <div class="container">

                <div class="row blog-entries element-animate">

                    <div class="col-md-12 col-lg- main-content">
                        <h2 class="text-black heading text-center mb-5"><?php echo $row['name'] ?></h2>

                        <div class="post-content-body">
                            <div style="text-align:justify; color:black;"><?php echo $row['content'] ?></div>
                        </div>




                <?php
            }
        }

                ?>
                    </div>
                </div>
            </div>
        </section>


        <!-- Start posts-entry -->
        <section class="section posts-entry posts-entry-sm bg-light">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12 text-uppercase text-black" style="font-weight: 600;">Sự kiện liên quan</div>
                </div>
                <div class="row">
                    <?php
                    if (isset($_GET['action']) && $_GET['action'] == 'chitiet') {
                        include './connect.php';

                        $current_event_slug = $_GET['slug'];;

                        $sql_select_news_more = "SELECT * FROM events WHERE status = '1' AND slug <> '$current_event_slug' ORDER BY RAND() LIMIT 4";
                        $result_select_news_more = $conn->query($sql_select_news_more);

                        while ($row = mysqli_fetch_array($result_select_news_more, MYSQLI_ASSOC)) {
                    ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="blog-entry">
                                    <a href="/su-kien/<?php echo $row['slug'] ?>" class="img-link">
                                        <img src="/admin/uploads/<?php echo $row['img'] ?>" alt="Image" class="" width="300px" height="220px">
                                    </a>
                                    <span class="date"><?php echo $row['created_at']; ?></span>
                                    <h2><a href="/su-kien/<?php echo $row['slug'] ?>" class="gon-chu	"><?php echo $row['name']; ?></a>
                                    </h2>
                                    <p class="gon-chu-2"><?php echo $row['des']; ?></p>
                                    <p><a href="/su-kien/<?php echo $row['slug'] ?>" class="btn btn-outline-success">Đọc tiếp</a></p>
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