<?php
session_start();
include_once("../../connect.php");
?>

<?php
include_once("../Template/header.php");
include_once("../Template/nav.php");
include_once("../Template/side.php");
?>
<?php
?>
<div class="container">

    <h2 class="text-center mt-3 text-uppercase">Danh mục</h2>
    <div class="row">
        <div class="col-md-4">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'add') {

            ?>
                <a hidden href="../categories/Categories.php?action=add" class="btn btn-success m-3">Thêm danh mục</a>
            <?php
            } else if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            ?>
                <a hidden href="../categories/Categories.php?action=add" class="btn btn-success m-3">Thêm danh mục</a>
            <?php
            } else {
            ?>
                <a href="../categories/Categories.php?action=add" class="btn btn-success m-3">Thêm danh mục</a>
            <?php
            }
            ?>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'add') {
        ?>
            <div class="row mt-3 mb-5">
                <h3 class="text-uppercase text-black">Thêm danh mục</h3>
                <div class="container">
                    <div class="col-md-12">
                        <form action="./HandleCategories.php" method="POST">
                            <div class="mb-3">
                                <label for="" class="form-label text-black">Tên danh mục:</label>
                                <input type="text" name="name" class="form-control " id="" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label text-black">Trạng thái:</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
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
        } else if (isset($_GET["action"]) && $_GET["action"] == 'edit') {
            $id = $_GET["id"];

            $sql_edit_categories = "SELECT * FROM categories WHERE id = '" . $id . "'";
            $result_edit_categories = $conn->query($sql_edit_categories);
        ?>
            <div class="row mt-3 mb-5">
                <h3 class="text-uppercase text-black">Sửa danh mục</h3>
                <div class="container">
                    <div class="col-md-12">
                        <?php
                        while ($edit_categories = mysqli_fetch_array($result_edit_categories)) {

                        ?>
                            <form action="./HandleCategories.php?id=<?php echo $edit_categories['id'] ?>" method="POST">
                                <div class="mb-3">
                                    <label for="" class="form-label text-black">Tên danh mục:</label>
                                    <input type="text" name="name" class="form-control" id="" required value="<?php echo $edit_categories['name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label text-black">Trạng thái:</label>
                                    <select name="status" id="" class="form-control">
                                        <?php
                                        if ($edit_categories['status'] == 1) {
                                        ?>
                                            <option value="1" selected>Hiển thị</option>
                                            <option value="0">Không hiển thị</option>
                                        <?php
                                        } else if ($edit_categories['status'] == 0) {
                                        ?>
                                            <option value="1">Hiển thị</option>
                                            <option value="0" selected>Không hiển thị</option>
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
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        <?php
        }
        ?>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead class="bg-primary text-uppercase" style="color: #fff;">
                    <th>Stt</th>
                    <th>Tên danh mục</th>
                    <th>Trang thái</th>
                    <th>Quản lý</th>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $sql_select_categories = "select * from categories order by id desc";
                    $result_select_categories = $conn->query($sql_select_categories);
                    while ($categories = mysqli_fetch_array($result_select_categories)) {
                        $i++;
                    ?>
                        <tr>
                            <td scope="col"><?php echo $i ?></td>
                            <td scope="col" class="gon-chu"><?php echo $categories['name'] ?></td>
                            <td scope="col">
                                <?php
                                if ($categories['status'] == 1) {
                                    echo '<span style="color: blue;">Hiển thị</span>';
                                } else if ($categories['status'] == 0) {
                                    echo '<span style="color: red;">Không hiển thị</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="./Categories.php?action=edit&id=<?php echo $categories['id'] ?>" class="btn btn-warning mr-3">Sửa</a>
                                <a onclick="confirmDeleteN(<?php echo $categories['id'] ?>)" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDeleteN(categoryId) {
        var confirmDelete = confirm("Bạn có chắc muốn xóa không?");
        if (confirmDelete) {
            // Nếu người dùng đồng ý, chuyển hướng đến trang xử lý xóa
            window.location.href = './HandleCategories.php?action=delete&id=' + categoryId;
        } else {
            // Người dùng không đồng ý, không làm gì cả
        }
    }
</script>

<?php
include_once("../Template/footer.php");
?>