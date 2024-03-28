<?php
include_once("../Template/header.php");
include_once("../Template/nav.php");
include_once("../Template/side.php");
include_once("../../connect.php");

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-5 mb-5 text-uppercase">Quản lý sự kiện</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
            ?>
                <a hidden href="./Event.php?action=add" class="btn btn-success">Thêm sự kiện</a>
            <?php
            } else if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            ?>
                <a hidden href="./Event.php?action=add" class="btn btn-success">Thêm sự kiện</a>
            <?php
            } else {
            ?>
                <a href="./Event.php?action=add" class="btn btn-success">Thêm sự kiện</a>
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
        <div class="row m-3">
            <div class="col-md-12">
                <form action="./HandleEvent.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label text-black">Tên sự kiện: </label>
                        <input type="text" name="name" class="form-control" id="title" onkeyup="ChangeToSlug();" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black"> Đường dẫn thân thiện: </label>
                        <input type="text" name="slug" class="form-control" id="slug" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Link đăng ký: </label>
                        <input type="text" name="url" class="form-control" id="" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Hình ảnh: </label>
                        <input type="file" name="image" class="form-control" id="" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Nội dung: </label>
                        <textarea name="content" id="textarea1" cols="30" rows="80" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Mô tả ngắn: </label>
                        <input type="text" name="des" class="form-control" id="" required>
                    </div>

                    <div class=" mb-3">
                        <label for="" class="form-label text-black">Trạng thái: </label>
                        <select name="status" id="" class="form-control w-50">
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label text-black">Trạng thái nổi bật: </label>
                        <select name="statusHot" id="" class="form-control w-50">
                            <option value="0" selected>Tắt</option>
                            <option value="1">Bật</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">

                            <button type="submit" name="add" class="btn btn-success w-100">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    } else if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    ?>
        <div class="row m-3">
            <div class="col-md-12">
                <?php
                $id = $_GET['id'];

                $sql_get_event = "select * from events where id = '" . $id . "'";
                $result_get_event = $conn->query($sql_get_event);

                while ($get_event_id = mysqli_fetch_array($result_get_event)) {
                ?>
                    <form action="./HandleEvent.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $get_event_id['id'] ?>">
                        <div class="mb-3">
                            <label for="" class="form-label text-black">Tên sự kiện: </label>
                            <input type="text" name="name" class="form-control" id="title" onkeyup="ChangeToSlug();" value="<?php echo $get_event_id['name'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Đường dẫn thân thiện </label>
                            <input type="text" name="slug" class="form-control" id="slug" value="<?php echo $get_event_id['slug'] ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Link đăng ký: </label>
                            <input type="text" name="url" class="form-control" value="<?php echo $get_event_id['url'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Hình ảnh: </label>
                            <input type="file" name="image" class="form-control" id="">
                            <img src="../uploads/<?php echo $get_event_id['img'] ?>" alt="" srcset="" width="250" class="mt-3">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Nội dung: </label>
                            <textarea name="content" id="textarea1" cols="30" rows="10" required><?php echo $get_event_id['content'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Mô tả ngắn: </label>
                            <input type="text" name="des" class="form-control" id="" value="<?php echo $get_event_id['des'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Trạng thái: </label>
                            <select name="status" id="" class="form-control w-50">
                                <?php
                                if ($get_event_id['status'] == 1) {
                                ?>
                                    <option value="1" selected>Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                <?php
                                } else {
                                ?>
                                    <option value="1">Hiển thị</option>
                                    <option value="0" selected>Không hiển thị</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-black">Trạng thái nổi bật: </label>
                            <select name="statusHot" id="" class="form-control w-50">
                                <?php
                                if ($get_event_id['statusHot'] == 1) {
                                ?>
                                    <option value="0">Tắt</option>
                                    <option value="1" selected>Bật</option>
                                <?php
                                } else {
                                ?>
                                    <option value="0" selected>Tắt</option>
                                    <option value="1">Bật</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-5"></div>
                            <div class="col-md-2">

                                <button type="submit" name="edit" class="btn btn-success w-100">Sửa</button>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>
    <table class="table display" id="eventTable">
        <thead>
            <tr class="bg-primary text-white">
                <th scope="col">Stt</th>
                <th scope="col">Tên sự kiện</th>
                <th scope="col">Link</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Nổi bật</th>
                <th scope="col">Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $sql_select_event = "Select * from events order by id desc ";
            $result_select_event = $conn->query($sql_select_event);

            while ($events = mysqli_fetch_array($result_select_event)) {
                $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td class="truncated-column"><?php echo $events['name'] ?></td>
                    <td>
                        <a href="<?php echo $events['url'] ?>">
                            <?php
                            if (isset($events['url'])) {
                                echo "Đường link";
                            } else {
                                echo "Đường link không khả dụng";
                            }
                            ?>
                        </a>
                    </td>
                    <td>
                        <img src="../uploads/<?php echo $events['img'] ?>" alt="" srcset="">
                    </td>
                    <td>
                        <?php
                        if ($events['status'] == 1) {
                            echo '<span style="color: blue;">Hiển thị</span>';
                        } else {
                            echo '<span style="color: red;">Không hiển thị</span>';
                        }
                        ?>
                    </td>
                    <td><?php echo $events['created_at'] ?></td>
                    <td>
                        <?php
                        if ($events['statusHot'] == 1) {
                            echo '<span style="color: blue;">Bật</span>';
                        } else {
                            echo '<span style="color: red;">Tắt</span>';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="./Event.php?action=edit&id=<?php echo $events['id'] ?>" class="btn btn-warning">Sửa</a>
                        <a onclick="confirmDeleteEvents(<?php echo $events['id'] ?>)" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDeleteEvents(eventId) {
        var confirmDeleteNews = confirm("Bạn có chắc muốn xóa không?");
        if (confirmDeleteNews) {
            // Nếu người dùng đồng ý, chuyển hướng đến trang xử lý xóa
            window.location.href = './HandleEvent.php?action=delete&id=' + eventId;
        }
    }
</script>

<script src="../assets/js/ChangeToSlug.js"></script>
<!-- <script src="../assets/js/dataTable.min.js"></script> -->

<?php
include_once("../Template/footer.php");
?>