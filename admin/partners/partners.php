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
                $sql_select_PN = "SELECT * FROM partners WHERE id = $id";
                $result = $conn->query($sql_select_PN);

                if ($row = $result->fetch_assoc()) {
            ?>
            <h2 class="text-black text-uppercase text-center mt-3">Sửa Đối tác</h2>
            <form action="./handlePN.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="" value="<?php echo $row['id'] ?>">
                <div class="form-group">
                    <label for="" class="text-black font-italic">Đối tác:</label>
                    <input type="file" name="img" class="form-control form-control-lg" required>
                    <img src="<?php echo $row['img'] ?>" alt="Lỗi" width="100%">
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
                            <input type="submit" name="updatePN" value="Sửa" class="btn btn-success w-50">
                        </div>

                    </div>
                </div>
            </form>

            <?php
                }
            } else {
                ?>
            <h2 class="text-black text-uppercase text-center mt-3">Thêm Đối tác</h2>
            <form action="./handlePN.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="" class="text-black font-italic">Đối tác</label>
                    <input type="file" name="img" class="form-control form-control-lg" required>
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
                            <input type="submit" name="addPN" value="Thêm" class="btn btn-success w-50">
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
            $sql_select_PN = "SELECT * FROM partners";
            $result = $conn->query($sql_select_PN);
            ?>
            <table class="table">
                <thead>
                    <tr class="mt-5 bg-primary text-white">
                        <th scope="col">Stt</th>
                        <th scope="col">Đối tác</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
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
                            <a href="./partners.php?action=sua&&id=<?php echo $row['id'] ?>"
                                class="btn btn-warning">Sửa</a>

                            <a href="./handlePN.php?action=xoa&id=<?php echo $row['id'] ?>"
                                class="btn btn-danger">Xóa</a>
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