<?php
include_once("../Template/header.php");
include_once("../Template/nav.php");
include_once("../Template/side.php");
include_once("../../connect.php");

?>
<div class="container">
    <h2 class="text-uppercase text-center m-4">Nhân sự</h2>

    <div class="row m-3">
        <div class="col-md-4">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
            ?>
                <a hidden href="./personnels.php?action=add" class="btn btn-success">Thêm nhân sự</a>
            <?php
            } else if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            ?>
                <a hidden href="./personnels.php?action=add" class="btn btn-success">Thêm nhân sự</a>
            <?php
            } else {
            ?>
                <a href="./personnels.php?action=add" class="btn btn-success">Thêm nhân sự</a>
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
                    <form action="./handlePersonnels.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Tên bài giới thiệu nhân sự:</label>
                            <input type="text" name="title" class="form-control " id="title" onkeyup="ChangeToSlug();" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-black">Đường dẫn thân thiện:</label>
                            <input type="text" name="slug" class="form-control " id="slug" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Tên nhân sự:</label>
                            <input type="text" name="name" class="form-control " id="" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Chức vụ hiện tại:</label>
                            <input type="text" name="position" class="form-control " id="" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Ngày sinh:</label>
                            <input type="date" name="birthday" class="form-control " id="" placeholder="dd/mm/yyyy" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Chứng chỉ:</label>
                            <textarea name="certificate" id="textarea1" cols="30" rows="10" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Kinh nghiệm:</label>
                            <textarea name="experience" class="form-control " id="textarea2" cols="30" rows="10" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Mô tả:</label>
                            <textarea name="des" class="form-control" id="textarea3" cols="30" rows="10" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Ảnh bìa:</label>
                            <input type="file" name="image" id="" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Trạng thái:</label>
                            <select name="status" id="" class="form-control w-50">
                                <option value="1" selected>Hiển thị</option>
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
    } else if (isset($_GET['action']) && $_GET['action'] == 'edit') {
        $id = $_GET['id'];
    ?>

        <div class="row mt-3 mb-5">
            <div class="container">
                <h3 class="text-center text-black">Sửa thông tin nhân sự</h3>
                <div class="col-md-12">
                    <?php
                    $sql_edit_personnels = "SELECT * FROM personnels WHERE id = '" . $id . "'";
                    $result_edit_personnels = $conn->query($sql_edit_personnels);
                    $personnelsEdit = mysqli_fetch_array($result_edit_personnels)
                    ?>
                    <form action="./handlePersonnels.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $personnelsEdit['id'] ?>">
                        <div class="mb-3">
                            <label for="" class="form-label text-black">Tên bài giới thiệu nhân sự:</label>
                            <input type="text" name="title" class="form-control " id="title" onkeyup="ChangeToSlug();" value="<?php echo $personnelsEdit['title'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-black">Đường dẫn thân thiện:</label>
                            <input type="text" name="slug" class="form-control " id="slug" value="<?php echo $personnelsEdit['slug'] ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Tên nhân sự:</label>
                            <input type="text" name="name" class="form-control " id="" value="<?php echo $personnelsEdit['name'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Chức vụ hiện tại:</label>
                            <input type="text" name="position" class="form-control " id="" value="<?php echo $personnelsEdit['position'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Ngày sinh:</label>
                            <input type="date" name="birthday" class="form-control " id="" placeholder="dd/mm/yyyy" value="<?php echo $personnelsEdit['birthday'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Chứng chỉ:</label>
                            <textarea name="certificate" id="textarea1" cols="30" rows="10"><?php echo $personnelsEdit['certificate'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Kinh nghiệm:</label>
                            <textarea name="experience" class="form-control " id="textarea2" cols="30" rows="10" required><?php echo $personnelsEdit['experience'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Mô tả:</label>
                            <textarea name="des" class="form-control" id="textarea3" cols="30" rows="10" required><?php echo $personnelsEdit['des'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Ảnh bìa:</label>
                            <input type="file" name="image" id="" class="form-control">
                            <img src="../uploads/<?php echo $personnelsEdit['img'] ?>" alt="Lỗi">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Trạng thái:</label>
                            <select name="status" id="" class="form-control w-50">
                                <option value="1" selected>Hiển thị</option>
                                <option value="0">Không hiển thị</option>
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

    <table class="table" id="personnelsTable">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Stt</th>
                <th scope="col">Họ Tên</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>

        </thead>
        <tbody>
            <?php
            $i = 0;
            $sql_select_personnel = "SELECT * FROM personnels ORDER BY id DESC";
            $result_select_personnel = $conn->query($sql_select_personnel);

            while ($row = mysqli_fetch_array($result_select_personnel)) {
                $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td>
                        <?php echo $row['position'] ?>
                    </td>

                    <td>
                        <?php
                        if ($row['status'] == 1) {
                            echo '<span style="color: blue;">Hiển thị</span>';
                        } else {
                            echo '<span style="color: red;">Không hiển thị</span>';
                        }
                        ?>
                    </td>

                    <td>
                        <a href="./personnels.php?action=edit&id=<?php echo $row['id'] ?>" class="btn btn-warning mr-2">Sửa</a>
                        <a onclick="confirmDeletepersonnels(<?php echo $row['id'] ?>)" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDeletepersonnels(personnelsId) {
        var confirmDeletepersonnels = confirm("Bạn có chắc muốn xóa không?");
        if (confirmDeletepersonnels) {
            // Nếu người dùng đồng ý, chuyển hướng đến trang xử lý xóa
            window.location.href = './handlePersonnels.php?action=delete&id=' + personnelsId;
        } else {
            // Người dùng không đồng ý, không làm gì cả
        }
    }
</script>

<script src="../assets/js/ChangeToSlug.js"></script>


<?php
include_once("../Template/footer.php");

?>