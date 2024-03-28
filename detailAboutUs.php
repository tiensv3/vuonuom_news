<?php
include "./Template/Header.php";
include "./Template/Navbar.php";
?>

<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('./asset/images/hero_5.jpg');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-6">
                <div class="post-entry text-center">
                    <h1 class="mb-4">GIỚI THIỆU NHÂN SỰ</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'chitiet') {
            include "./connect.php";

            $id = $_GET['id'];

            $sql_detail_personnel = "SELECT * FROM personnels WHERE id = '" . $id . "' AND status = '1' ";
            $result_detail_personnel = $conn->query($sql_detail_personnel);

            while ($row = mysqli_fetch_array($result_detail_personnel)) {
        ?>
                <div class="row blog-entries element-animate">

                    <div class="col-md-12 col-lg-12 main-content">

                        <div class="post-content-body">
                            <h2 class="text-center m-3 mb-5 text-black text-uppercase bold"><?php echo $row['title'] ?></h2>
                            <p class="text-justify" style="color: black;"><?php echo $row['position'] ?></p>
                        </div>


                        <div class="pt-5">
                            <!-- <p>Họ tên: <a href="#"><?php echo $row['name'] ?></a></p> -->
                        </div>
                    </div>

                    <div class="row">
                        <p><?php echo $row['des'] ?></p>

                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <h3 class="bold">Chứng chỉ hiện có</h3>
                            <?php
                            $data = $row['certificate'];

                            $cleaned_data = strip_tags($data);

                            $list_items = explode("\n", trim($cleaned_data));

                            $list_items = array_filter($list_items);

                            echo '<ol>';
                            foreach ($list_items as $item) {
                                echo '<li>' . $item . '</li>';
                            }
                            echo '</ol>';
                            ?>
                        </div>

                        <div class="col-lg-3" style="border-left:10px solid #888">
                            <h3 class="bold">Kinh nghiệm</h3>

                            <?php
                            $data = $row['experience'];
                            $cleaned_data = strip_tags($data);
                            $list_items = explode("\n", trim($cleaned_data));
                            $list_items = array_filter($list_items);
                            echo '<ul>';
                            foreach ($list_items as $item) {
                                echo '<li>' . $item . '</li>';
                            }
                            echo '</ul>';
                            ?>
                        </div>

                        <div class="col-lg-4 text-center">
                            <img src="./admin/uploads/<?php echo $row['img'] ?>" alt="<?php echo $row['name'] ?>" max-width="300" class="img-fluid w-50 rounded-circle mb-3">
                            <br>
                            <br>
                            <span><?php echo $row['name'] ?></span>
                        </div>


                    </div>



            <?php
            }
        }

            ?>


                </div>
    </div>
</section>

<?php
include "./Template/Footer.php";
?>