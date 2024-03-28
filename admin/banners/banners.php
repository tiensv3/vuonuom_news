<?php
include_once("../Template/header.php");
include_once("../Template/nav.php");
include_once("../Template/side.php");
include_once("../../connect.php");
?>
<div class="container">
    <div class="row">

    </div>
    <div class="row">
        <div class="col-lg-4">
            <?php
            if (isset($_GET['action']) == 'sua') {
                $id = $_GET['id'];
                $sql_select_BN = "SELECT * FROM banners WHERE id = ?";
                $stmt = $conn->prepare($sql_select_BN);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($row = $result->fetch_assoc()) {
            ?>
                    <h2 class="text-black text-uppercase text-center mt-3">Sửa banner</h2>
                    <form action="./handleBN.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label for="" class="text-black font-italic">Banner:</label>
                            <input type="file" name="img" class="form-control form-control-lg">
                            <img src="<?php echo $row['img'] ?>" alt="Lỗi" width="100%">
                        </div>

                        <div class="form-group">
                            <label for="" class="text-black font-italic">Liên kết:</label>
                            <input type="text" value="<?php echo $row['url'] ?>" name="url" class="form-control form-control-lg">
                        </div>

                        <div class="form-group">
                            <label for="" class="text-black font-italic">Trạng thái:</label>
                            <select name="status" id="" class="form-control">
                                <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Không hiển thị</option>
                                <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Hiển thị</option>

                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" name="updateBN" value="Sửa" class="btn btn-success w-50">
                                </div>

                            </div>
                        </div>
                    </form>

                <?php
                }
            } else {
                ?>
                <h2 class="text-black text-uppercase text-center mt-3">Thêm banner</h2>
                <form action="./handleBN.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="" class="text-black font-italic">Banner</label>
                        <input type="file" name="img" class="form-control form-control-lg" required>
                    </div>

                    <div class="form-group">
                        <label for="" class="text-black font-italic">Liên kết:</label>
                        <input type="text" name="url" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="" class="text-black font-italic">Trạng thái:</label>
                        <select name="status" id="" class="form-control">
                            <option value="0">Không hiển thị</option>
                            <option value="1" selected>Hiển thị</option>

                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" name="addBN" value="Thêm" class="btn btn-success w-50">
                            </div>

                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
        <div class="col-lg-7">
            <?php
            $sql_select_BN = "SELECT * FROM banners";
            $stmt = $conn->prepare($sql_select_BN);
            $stmt->execute();
            $result = $stmt->get_result();

            ?>
            <table class="table">
                <thead>
                    <tr class="mt-5 bg-primary text-white">
                        <th scope="col">Stt</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><img src="<?php echo $row['img'] ?>" alt="Lỗi" width="100%"></td>

                            <td>
                                <?php
                                if ($row['status'] == 1) {
                                    echo '<span class="text text-primary">Hiển thị</span>';
                                } elseif ($row['status'] == 0) {
                                    echo '<span class="text text-danger">Không hiển thị</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="./banners.php?action=sua&&id=<?php echo $row['id'] ?>" class="btn btn-warning">Sửa</a>

                                <a href="./handleBN.php?action=xoa&id=<?php echo $row['id'] ?>" class="btn btn-danger">Xóa</a>
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

<?php
include_once("../Template/footer.php");
?>