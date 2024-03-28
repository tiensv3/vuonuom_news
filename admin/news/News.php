<?php
include_once("../Template/header.php");
include_once("../Template/nav.php");
include_once("../Template/side.php");
include_once("../../connect.php");

?>
<div class="container">
    <h2 class="text-uppercase text-center m-4">Bài viết</h2>

    <div class="row m-3">
        <div class="col-md-4">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
            ?>
            <a hidden href="./News.php?action=add" class="btn btn-success">Thêm bài viết</a>
            <?php
            } else if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            ?>
            <a hidden href="./News.php?action=add" class="btn btn-success">Thêm bài viết</a>
            <?php
            } else {
            ?>
            <a href="./News.php?action=add" class="btn btn-success">Thêm bài viết</a>
            <?php
            }
            ?>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'add') {
    ?>
    <div class="row mt-3 mb-5">
        <div class="container">
            <div class="col-md-12">
                <form action="./HandleNews.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Danh mục bài viết:</label>
                        <select name="category" id="" class="form-control">
                            <?php
                                $sql_select_categories_news = "SELECT * FROM categories ORDER BY id desc";
                                $result_select_categories_news = $conn->query($sql_select_categories_news);

                                while ($categories = mysqli_fetch_array($result_select_categories_news)) {
                                ?>
                            <option value="<?php echo $categories['id'] ?>"><?php echo  $categories['name'] ?></option>
                            <?php
                                }
                                ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label text-black">Tên bài viết:</label>
                        <input type="text" name="title" class="form-control " id="title" onkeyup="ChangeToSlug();"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Đường dẫn thân thiện:</label>
                        <input type="text" name="slug" class="form-control " id="slug" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Mô tả:</label>
                        <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Nội dung:</label>
                        <textarea name="content" id="textarea1" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Hình ảnh:</label>
                        <input type="file" name="image" id="" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Trạng thái:</label>
                        <select name="status" id="" class="form-control w-50">
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Trạng thái nổi bật:</label>
                        <select name="statusHot" id="" class="form-control w-50">
                            <option value="0" selected>Tắt</option>
                            <option value="1">Bật</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" name="add" class="btn btn-primary w-100 text-uppercase">Thêm</button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <?php
    } else if (isset($_GET['action']) && $_GET['action'] == 'edit') {
        $id = $_GET['id'];
    ?>

    <div class="row mt-3 mb-5">
        <div class="container">
            <h3 class="text-center text-black">Sửa thông tin</h3>
            <div class="col-md-12">
                <?php
                    $sql_edit_news = "SELECT * FROM news WHERE id = '" . $id . "'";
                    $result_edit_news = $conn->query($sql_edit_news);
                    $newsEdit = mysqli_fetch_array($result_edit_news)
                    ?>
                <form action="./HandleNews.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $newsEdit['id'] ?>">
                    <div class="mb-3">
                        <label for="" class="form-label text-black">Danh mục bài viết:</label>
                        <select name="category" id="" class="form-control">
                            <?php
                                $sql_select_categories_news = "SELECT * FROM categories ORDER BY id DESC";
                                $result_select_categories_news = $conn->query($sql_select_categories_news);

                                while ($categories = mysqli_fetch_array($result_select_categories_news)) {
                                    $selected = ($newsEdit['categoryid'] == $categories['id'] && isset($newsEdit['categoryid'])) ? "selected" : "";
                                ?>
                            <option value="<?php echo $categories['id'] ?>" <?php echo $selected ?>>
                                <?php echo  $categories['name'] ?></option>
                            <?php
                                }
                                ?>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Tên bài viết:</label>
                        <input type="text" name="title" class="form-control " id="title"
                            value="<?php echo $newsEdit['title'] ?>" onkeyup="ChangeToSlug();" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Đường dẫn thân thiện:</label>
                        <input type="text" name="slug" class="form-control " id="slug"
                            value="<?php echo $newsEdit['slug'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Mô tả:</label>
                        <textarea name="description" id="" class="form-control" cols="30"
                            rows="10"><?php echo $newsEdit['des'] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Nội dung:</label>
                        <textarea name="content" id="textarea1" cols="30"
                            rows="10"><?php echo $newsEdit['content'] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Hình ảnh:</label>
                        <input type="file" name="image" id="" class="form-control">
                        <img src="../uploads/<?php echo $newsEdit['img'] ?>" alt="" sizes="" srcset="" width="250"
                            class="mt-2">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Trạng thái:</label>
                        <select name="status" id="" class="form-control">
                            <?php
                                if ($newsEdit['status'] == 1) {
                                ?>
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                            <?php
                                } else if ($newsEdit['status'] == 0) {
                                ?>
                            <option value="1">Hiển thị</option>
                            <option value="0" selected>Không hiển thị</option>
                            <?php
                                }
                                ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Trạng thái nổi bật:</label>
                        <select name="statusHot" id="" class="form-control">
                            <?php
                                if ($newsEdit['statusHot'] == 1) {
                                ?>
                            <option value="1" selected>Bật</option>
                            <option value="0">tắt</option>
                            <?php
                                } else if ($newsEdit['statusHot'] == 0) {
                                ?>
                            <option value="1">Bật</option>
                            <option value="0" selected>tắt</option>
                            <?php
                                }
                                ?>
                        </select>
                    </div>


                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" name="edit" class="btn btn-primary w-100 text-uppercase">Sửa</button>

                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <?php
    }
    ?>

    <table class="table" id="newsTable">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Stt</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Danh mục</th>

                <th scope="col">Mô tả</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Nổi bật</th>
                <th scope=""></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $sql_select_cate = "select news.* , categories.*, news.id as idNews , news.status as statusNews from news INNER JOIN categories ON news.categoryid = categories.id  order by news.id desc";
            $result_select_cate = $conn->query($sql_select_cate);

            while ($newsList = mysqli_fetch_array($result_select_cate)) {
                $i++;
            ?>
            <tr>
                <th scope="row"><?php echo $i ?></th>
                <td class="gon-chu"><?php echo $newsList['title'] ?></td>
                <td>
                    <?php echo $newsList['name'] ?>
                </td>


                <td class="gon-chu"><?php echo $newsList['des'] ?></td>
                <td><?php
                        if ($newsList['statusNews'] == 1) {
                            echo '<span style="color: blue;">Hiển thị</span>';
                        } else {
                            echo '<span style="color: red;">Không kiển thị</span>';
                        }
                        ?>
                </td>

                <td>
                    <img src="../uploads/<?php echo $newsList['img'] ?>" alt="" srcset="">
                </td>

                <td>
                    <?php
                        if ($newsList['statusHot'] == 1) {
                            echo '<span style="color: blue;">Bật</span>';
                        } else {
                            echo '<span style="color: red;">Tắt</span>';
                        }
                        ?>
                </td>

                <td>
                    <a href="./News.php?action=edit&id=<?php echo $newsList['idNews'] ?>"
                        class="btn btn-warning mr-2">Sửa</a>
                    <a onclick="confirmDeleteNews(<?php echo $newsList['id'] ?>)" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>
function confirmDeleteNews(newsId) {
    var confirmDeleteNews = confirm("Bạn có chắc muốn xóa không?");
    if (confirmDeleteNews) {
        // Nếu người dùng đồng ý, chuyển hướng đến trang xử lý xóa
        window.location.href = './HandleNews.php?action=delete&id=' + newsId;
    } else {
        // Người dùng không đồng ý, không làm gì cả
    }
}
</script>

<script src="../assets/js/ChangeToSlug.js"></script>


<?php
include_once("../Template/footer.php");

?>