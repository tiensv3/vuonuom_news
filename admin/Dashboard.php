<?php
include_once('../isAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vườn ươm doanh nghiệp</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <link rel="stylesheet" href="./assets/css/dataTable.min.css">



</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-xl-block">

                </div>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="assets/images/faces/face.png" alt="image">
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">Admin</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                            aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/images/faces/face.png"
                                    alt="">
                            </div>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="/logout.php">
                                <span>Đăng xuất</span>
                                <i class="mdi mdi-logout ml-1"></i>
                            </a>
                        </div>
            </div>
            </li>


            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
    </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-category">Trung tâm</li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/Dashboard.php">
                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                        <span class="menu-title">Trang chủ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="icon-bg"><i class="mdi mdi-clipboard-text menu-icon"></i></span>
                        <span class="menu-title">Danh sách gói</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/admin/basicservices/basicservices.php">Gói
                                    dịch
                                    vụ cơ bản </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="/admin/contentmarketings/contentmarketings.php">Gói content marketing</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="/admin/designservices/designservices.php">Gói
                                    dịch vụ thiết
                                    kế</a></li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="/admin/fanpageservices/fanpageservices.php">Gói
                                    chăm sóc
                                    fanpage</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basics" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="icon-bg"><i class="mdi mdi-clipboard-text menu-icon"></i></span>
                        <span class="menu-title">Quản lý tin tức</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basics">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/admin/categories/Categories.php">Danh
                                    mục
                                    tin tức</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/admin/news/News.php">Bài viết</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/events/Event.php">
                        <span class="icon-bg"><i class="mdi mdi-truck menu-icon"></i></span>
                        <span class="menu-title">Quản lý sự kiện</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/personnels/personnels.php">
                        <span class="icon-bg"><i class="mdi mdi-account-multiple menu-icon"></i></span>
                        <span class="menu-title">Quản lý nhân sự</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/banners/banners.php">
                        <span class="icon-bg"><i class="mdi mdi-gradient menu-icon"></i></span>
                        <span class="menu-title">Quản lý banner</span>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="/admin/partners/partners.php">
                        <span class="icon-bg"><i class="mdi mdi-gradient menu-icon"></i></span>
                        <span class="menu-title">Quản lý logo đối tác</span>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" href="/admin/contacts/contacts.php">
                        <span class="icon-bg"><i class="mdi mdi-gradient menu-icon"></i></span>
                        <span class="menu-title">Liên hệ</span>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="container mt-5">

                <h1 class="text-center text-uppercase mt-5">Danh sách đăng ký dịch vụ</h1>
                <table class="table" id="dtTable">
                    <thead class="table table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Tên gói</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Đơn vị tính</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../connect.php');
                        $sql_select_pk = "
SELECT 
    a.name AS aname, 
    a.email, 
    a.phone, 
    CASE 
        WHEN b.id IS NOT NULL THEN b.name  
        WHEN c.id IS NOT NULL THEN c.name  
        WHEN d.id IS NOT NULL THEN d.name 
        WHEN e.id IS NOT NULL THEN 'Dịch vụ chăm sóc Fanpage'  
    END AS service_name,
    CASE 
        WHEN b.id IS NOT NULL THEN b.unit
        WHEN c.id IS NOT NULL THEN c.unit
        WHEN d.id IS NOT NULL THEN d.unit
        WHEN e.id IS NOT NULL THEN e.unit
    END AS unit,
    CASE 
        WHEN b.id IS NOT NULL THEN 'basicservices'
        WHEN c.id IS NOT NULL THEN 'contentmarketings'
        WHEN d.id IS NOT NULL THEN 'designservices'
        WHEN e.id IS NOT NULL THEN 'fanpageservices'
    END AS table_service,
    CASE 
        WHEN b.id IS NOT NULL THEN b.price 
        WHEN c.id IS NOT NULL THEN c.price 
        WHEN d.id IS NOT NULL THEN d.price 
        WHEN e.id IS NOT NULL THEN e.price 
    END AS price
FROM 
    signuppackages a
LEFT JOIN 
    basicservices b ON a.bsid = b.id
LEFT JOIN 
    contentmarketings c ON a.cmid = c.id
LEFT JOIN 
    designservices d ON a.dsid = d.id
LEFT JOIN 
    fanpageservices e ON a.fsid = e.id
    ORDER BY a.id DESC
    ";
                        $result_select_pk = $conn->query($sql_select_pk);
                        $i = 1;
                        while ($row = $result_select_pk->fetch_assoc()) {


                        ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $row['aname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td>
                                <?php
                                    echo $row['service_name'];

                                    ?>
                            </td>

                            <td>
                                <?php
                                    echo number_format($row['price']);

                                    ?>
                            </td>

                            <td>
                                <?php
                                    $tablename = $row['table_service'];
                                    $unit = $row['unit'];
                                    if ($tablename == 'basicservices') {
                                        switch ($unit) {
                                            case '0':
                                                echo 'Buổi';
                                                break;
                                            case '1':
                                                echo 'Tháng';
                                                break;
                                            case '2':
                                                echo 'Gói cơ bản';
                                                break;
                                            case '3':
                                                echo 'Gói doanh nghiệp';
                                                break;
                                            case '4':
                                                echo 'Gói chuyên nghiệp';
                                                break;
                                        }
                                    } elseif ($tablename == 'contentmarketings') {
                                        switch ($unit) {
                                            case '0':
                                                echo 'Gói cơ bản';
                                                break;
                                            case '1':
                                                echo 'Gói nâng cao';
                                                break;
                                            case '2':
                                                echo 'Gói chuyên nghiệp';
                                                break;
                                        }
                                    } elseif ($tablename == 'contentmarketings') {
                                        switch ($unit) {
                                            case '0':
                                                echo 'Gói cơ bản';
                                                break;
                                            case '1':
                                                echo 'Gói nâng cao';
                                                break;
                                            case '2':
                                                echo 'Gói chuyên nghiệp';
                                                break;
                                        }
                                    } elseif ($tablename == 'designservices') {
                                        switch ($unit) {
                                            case '0':
                                                echo 'Gói cơ bản';
                                                break;
                                            case '1':
                                                echo 'Gói nâng cao';
                                                break;
                                            case '2':
                                                echo 'Gói chuyên nghiệp';
                                                break;
                                        }
                                    } elseif ($tablename == 'fanpageservices') {
                                        switch ($unit) {
                                            case '0':
                                                echo 'Gói cơ bản';
                                                break;
                                            case '1':
                                                echo 'Gói nâng cao';
                                                break;
                                            case '2':
                                                echo 'Gói chuyên nghiệp';
                                                break;
                                        }
                                    }

                                    ?>
                            </td>


                        </tr>
                        <?php
                            $i++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="footer-inner-wraper">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            TBI 2024</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <a
                                href="https://www.facebook.com/vuonuomdoanhnghieptinhtravinh/" target="_blank">Vườn
                                Ươm Doanh Nghiệp</a> Tỉnh
                            Trà Vinh</span>
                    </div>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="assets/js/dashboard.js"></script> -->
    <!-- End custom js for this page -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->

    <script src="./assets/js/dataTable.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#dtTable').DataTable({
            "columnDefs": [{
                "targets": 1,
                // Apply to columns with class "truncated-column"
                "render": function(data, type, row) {
                    if (type === 'display' && data.length > 30) {
                        return '<span title="' + data + '">' + data.substr(0, 30) +
                            '...</span>';
                    } else {
                        return data;
                    }
                }
            }]
        });
    });
    </script>


</body>

</html>