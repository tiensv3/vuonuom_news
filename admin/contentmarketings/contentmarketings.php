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
                $sql_select_CM = "SELECT * FROM contentmarketings WHERE id = ?";
                $stmt = $conn->prepare($sql_select_CM);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($row = $result->fetch_assoc()) {
            ?>
            <h2 class="text-black text-uppercase text-center mt-3">Sửa Content Marketing</h2>
            <form action="./handleCM.php" method="post">
                <input type="hidden" name="id" id="" value="<?php echo $row['id'] ?>">
                <div class="form-group">
                    <label for="" class="text-black font-italic">Content Marketing:</label>
                    <input type="text" name="name" class="form-control form-control-lg"
                        value="<?php echo $row["name"] ?>" required>
                </div>

                <div class="form-group">
                    <label for="" class="text-black font-italic">Tên gói:</label>
                    <select name="unit" id="" class="form-control">
                        <option value="0" <?php echo ($row['unit'] == 0) ? 'selected' : ''; ?>>Gói cơ bản</option>
                        <option value="1" <?php echo ($row['unit'] == 1) ? 'selected' : ''; ?>>Gói nâng cao</option>
                        <option value="2" <?php echo ($row['unit'] == 2) ? 'selected' : ''; ?>>Gói chuyên nghiệp
                        </option>

                    </select>
                </div>


                <div class="form-group">
                    <label for="" class="text-black font-italic">Đơn giá:</label>
                    <input type="number" name="price" class="form-control form-control-lg" min="1000" maxlength="10"
                        value="<?php echo $row["price"] ?>" required>
                </div>

                <div class="form-group">
                    <label for="" class="text-black font-italic">Trạng thái:</label>
                    <select name="status" id="" class="form-control">
                        <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Không hiển thị</option>
                        <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Hiển thị</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="" class="text-black font-italic">Mô tả:</label>
                    <textarea name="des" id="textarea1" cols="30" rows="10"><?php echo $row['des']; ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="submit" name="updateCM" value="Sửa" class="btn btn-success w-50">
                        </div>

                    </div>
                </div>
            </form>

            <?php
                }
            } else {
                ?>
            <h2 class="text-black text-uppercase text-center mt-3">Thêm Marketing Content</h2>
            <form action="./handleCM.php" method="post">
                <div class="form-group">
                    <label for="" class="text-black font-italic">Content Marketing:</label>
                    <input type="text" name="name" class="form-control form-control-lg" required>
                </div>

                <div class="form-group">
                    <label for="" class="text-black font-italic">Tên gói:</label>
                    <select name="unit" id="" class="form-control">
                        <option value="0" selected>Gói cơ bản</option>
                        <option value="1">Gói nâng cao</option>
                        <option value="2">Gói chuyên nghiệp</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="" class="text-black font-italic">Đơn giá:</label>
                    <input type="number" name="price" class="form-control form-control-lg" min="1000" maxlength="10"
                        placeholder="" required>
                </div>

                <div class="form-group">
                    <label for="" class="text-black font-italic">Trạng thái:</label>
                    <select name="status" id="" class="form-control">
                        <option value="0">Không hiển thị</option>
                        <option value="1" selected>Hiển thị</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="" class="text-black font-italic">Mô tả:</label>
                    <textarea name="des" id="textarea1" cols="30" rows="10"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="submit" name="addCM" value="Thêm" class="btn btn-success w-50">
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
            $sql_select_CM = "SELECT * FROM contentmarketings";
            $stmt = $conn->prepare($sql_select_CM);
            $stmt->execute();
            $result = $stmt->get_result();
            ?>
            <table class="table">
                <thead>
                    <tr class="mt-5 bg-primary text-white">
                        <th scope="col">Stt</th>
                        <th scope="col">Dịch vụ</th>
                        <th scope="col">Đơn vị tính</th>
                        <th scope="col">Đơn giá</th>
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
                        <td><?php echo $row['name'] ?></td>
                        <td>
                            <?php
                                switch ($row['unit']) {
                                    case '0':
                                        echo "Gói cơ bản";
                                        break;
                                    case "1":
                                        echo "Gói nâng cao";
                                        break;
                                    case "2":
                                        echo "Gói chuyên nghiệp";
                                        break;
                                }
                                ?>
                        </td>

                        <td>
                            <?php
                                if ($row["price"] == null) {
                                    echo "Thỏa thuận";
                                } else {
                                    echo number_format($row["price"]) . " Đồng";
                                }
                                ?>

                        </td>

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
                            <a href="./contentmarketings.php?action=sua&&id=<?php echo $row['id'] ?>"
                                class="btn btn-warning">Sửa</a>

                            <a href="./handleCM.php?action=xoa&id=<?php echo $row['id'] ?>"
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