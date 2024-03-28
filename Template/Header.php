<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../asset/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../asset/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../asset/css/tiny-slider.css">
    <link rel="stylesheet" href="../asset/css/aos.css">
    <link rel="stylesheet" href="../asset/css/glightbox.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">

    <link rel="stylesheet" href="../asset/css/flatpickr.min.css">

    <!-- Add Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <!-- Add Slick Slider JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- Add CKeditor -->
    <script src="../admin/assets/ckeditor/ckeditor.js"></script>




    <title>Vườn ươm doanh nghiệp tỉnh Trà Vinh</title>


    <style>
        .clear {
            clear: both;
        }
    </style>


    <style>
        .gon-chu {
            max-width: 450px;
            /* Đặt giới hạn chiều ngang là 200px */
            max-height: 4.8em;
            /* Đặt chiều cao tối đa tương ứng với 4 dòng */
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            /* Cho phép sử dụng các thuộc tính của flexbox */
            -webkit-line-clamp: 4;
            /* Số dòng muốn hiển thị trước khi áp dụng ellipsis */
            -webkit-box-orient: vertical;
            /* Đặt hướng chữ hiển thị là dọc */
        }

        .gon-chu-2 {
            max-width: 450px;
            /* Đặt giới hạn chiều ngang là 200px */
            max-height: 3em;
            /* Đặt chiều cao tối đa tương ứng với 4 dòng */
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            /* Cho phép sử dụng các thuộc tính của flexbox */
            -webkit-line-clamp: 4;
            /* Số dòng muốn hiển thị trước khi áp dụng ellipsis */
            -webkit-box-orient: vertical;
            /* Đặt hướng chữ hiển thị là dọc */
        }
    </style>

    <style>
        @import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800);

        .pricing6 {
            font-family: "Montserrat", sans-serif;
            color: #8d97ad;
            font-weight: 300;
        }

        .pricing6 h1,
        .pricing6 h2,
        .pricing6 h3,
        .pricing6 h4,
        .pricing6 h5,
        .pricing6 h6 {
            color: #3e4555;
        }

        .pricing6 .font-weight-medium {
            font-weight: 500;
        }

        .pricing6 .bg-light {
            background-color: #f4f8fa !important;
        }

        .pricing6 h5 {
            line-height: 22px;
            font-size: 18px;
        }

        .pricing6 .subtitle {
            color: #8d97ad;
            line-height: 24px;
        }

        .pricing6 .card.card-shadow {
            -webkit-box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
            box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
        }

        .pricing6 .price-box sup {
            top: -20px;
            font-size: 16px;
        }

        .pricing6 .price-box .display-5 {
            line-height: 58px;
            font-size: 3rem;
        }

        .pricing6 .btn-info-gradiant {
            background: #188ef4;
            background: -webkit-linear-gradient(legacy-direction(to right), #188ef4 0%, #316ce8 100%);
            background: -webkit-gradient(linear, left top, right top, from(#188ef4), to(#316ce8));
            background: -webkit-linear-gradient(left, #188ef4 0%, #316ce8 100%);
            background: -o-linear-gradient(left, #188ef4 0%, #316ce8 100%);
            background: linear-gradient(to right, #188ef4 0%, #316ce8 100%);
        }

        .pricing6 .btn-info-gradiant:hover {
            background: #316ce8;
            background: -webkit-linear-gradient(legacy-direction(to right), #316ce8 0%, #188ef4 100%);
            background: -webkit-gradient(linear, left top, right top, from(#316ce8), to(#188ef4));
            background: -webkit-linear-gradient(left, #316ce8 0%, #188ef4 100%);
            background: -o-linear-gradient(left, #316ce8 0%, #188ef4 100%);
            background: linear-gradient(to right, #316ce8 0%, #188ef4 100%);
        }

        .pricing6 .btn-md {
            padding: 15px 45px;
            font-size: 16px;
        }

        .pricing6 .text-info {
            color: #188ef4 !important;
        }

        .pricing6 .badge-danger {
            background-color: #ff4d7e;
        }

        .pricing6 .font-14 {
            font-size: 14px;
        }
    </style>

    <!-- phân trang -->
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .pagination .page-link {
            color: #333;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 0 3px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination .page-link.active,
        .pagination .page-link:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .page-link.disabled {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>


    <!-- pricing cart 2 -->
    <style>
        @import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800);

        .pricing8 {
            font-family: "Montserrat", sans-serif;
            color: #8d97ad;
            font-weight: 300;
        }

        .pricing8 h1,
        .pricing8 h2,
        .pricing8 h3,
        .pricing8 h4,
        .pricing8 h5,
        .pricing8 h6 {
            color: #3e4555;
        }

        .pricing8 h5 {
            line-height: 22px;
            font-size: 18px;
        }

        .pricing8 .subtitle {
            color: #8d97ad;
            line-height: 24px;
        }

        .pricing8 .display-5 {
            font-size: 3rem;
        }

        .pricing8 .font-14 {
            font-size: 14px;
        }

        .pricing8 .pricing-box sup {
            top: -20px;
            font-size: 16px;
        }

        .pricing8 .btn-info-gradiant {
            background: #188ef4;
            background: -webkit-linear-gradient(legacy-direction(to right), #188ef4 0%, #316ce8 100%);
            background: -webkit-gradient(linear, left top, right top, from(#188ef4), to(#316ce8));
            background: -webkit-linear-gradient(left, #188ef4 0%, #316ce8 100%);
            background: -o-linear-gradient(left, #188ef4 0%, #316ce8 100%);
            background: linear-gradient(to right, #188ef4 0%, #316ce8 100%);
        }

        .pricing8 .btn-info-gradiant:hover {
            background: #316ce8;
            background: -webkit-linear-gradient(legacy-direction(to right), #316ce8 0%, #188ef4 100%);
            background: -webkit-gradient(linear, left top, right top, from(#316ce8), to(#188ef4));
            background: -webkit-linear-gradient(left, #316ce8 0%, #188ef4 100%);
            background: -o-linear-gradient(left, #316ce8 0%, #188ef4 100%);
            background: linear-gradient(to right, #316ce8 0%, #188ef4 100%);
        }

        .pricing8 .btn-danger-gradiant {
            background: #ff4d7e;
            background: -webkit-linear-gradient(legacy-direction(to right), #ff4d7e 0%, #ff6a5b 100%);
            background: -webkit-gradient(linear, left top, right top, from(#ff4d7e), to(#ff6a5b));
            background: -webkit-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
            background: -o-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
            background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
        }

        .pricing8 .btn-danger-gradiant:hover {
            background: #ff6a5b;
            background: -webkit-linear-gradient(legacy-direction(to right), #ff6a5b 0%, #ff4d7e 100%);
            background: -webkit-gradient(linear, left top, right top, from(#ff6a5b), to(#ff4d7e));
            background: -webkit-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
            background: -o-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
            background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
        }
    </style>

    <!-- design service -->
    <style>
        @import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500);

        .pricing7 {
            font-family: "Montserrat", sans-serif;
            color: #8d97ad;
            font-weight: 300;
        }

        .pricing7 h1,
        .pricing7 h2,
        .pricing7 h3,
        .pricing7 h4,
        .pricing7 h5,
        .pricing7 h6 {
            color: #3e4555;
        }

        .pricing7 .font-weight-medium {
            font-weight: 500;
        }

        .pricing7 .subtitle {
            color: #8d97ad;
            line-height: 24px;
        }

        .pricing7 h5 {
            line-height: 22px;
            font-size: 18px;
        }

        .pricing7 .pricing-box sup {
            top: -20px;
            font-size: 16px;
        }

        .pricing7 .pricing-box .btn {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }

        .pricing7 .text-info {
            color: #188ef4 !important;
        }

        .pricing7 .display-6 {
            font-size: 36px;
        }

        .pricing7 .display-5 {
            font-size: 3rem;
        }

        .pricing7 .btn-info-gradiant {
            background: #188ef4;
            background: -webkit-linear-gradient(legacy-direction(to right), #188ef4 0%, #316ce8 100%);
            background: -webkit-gradient(linear, left top, right top, from(#188ef4), to(#316ce8));
            background: -webkit-linear-gradient(left, #188ef4 0%, #316ce8 100%);
            background: -o-linear-gradient(left, #188ef4 0%, #316ce8 100%);
            background: linear-gradient(to right, #188ef4 0%, #316ce8 100%);
        }

        .pricing7 .btn-info-gradiant:hover {
            background: #316ce8;
            background: -webkit-linear-gradient(legacy-direction(to right), #316ce8 0%, #188ef4 100%);
            background: -webkit-gradient(linear, left top, right top, from(#316ce8), to(#188ef4));
            background: -webkit-linear-gradient(left, #316ce8 0%, #188ef4 100%);
            background: -o-linear-gradient(left, #316ce8 0%, #188ef4 100%);
            background: linear-gradient(to right, #316ce8 0%, #188ef4 100%);
        }

        .pricing7 .btn-md {
            padding: 15px 45px;
            font-size: 16px;
        }
    </style>

    <style>
        .icon-check::before {
            content: "\f00c";
            /* Unicode của icon check (ví dụ: trong Font Awesome) */
            margin-right: 5px;
            /* Khoảng cách giữa icon và nội dung */
            font-family: "Font Awesome";
            /* Font icon */
            font-size: 16px;
            /* Kích thước của icon */
        }
    </style>

    <style>
        .partner-section {
            margin-top: 50px;
            padding: 20px;
            border: 2px solid #888;
            border-radius: 10px;
            background-color: #f8f9fa;
            /* Màu nền */
        }

        .partner-section h1 {
            font-weight: 800;
            color: green;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .partner-section .partner-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .partner-section .partner-col {
            flex: 0 0 33.33%;
            /* Chia đều thành 3 cột */
            text-align: center;
            padding: 10px;
        }

        .partner-section .partner-img {
            display: block;
            margin: 0 auto;
            padding: 10px;
            max-width: 100%;
            height: auto;
        }
    </style>

    <style>
        .partner-slider {
            overflow: hidden;
            width: 100%;
        }

        .partner-row {
            display: flex;
            transition: transform 0.5s ease;
        }

        .partner-col {
            flex: 0 0 auto;
            margin: 0 10px;
        }

        .partner-img {
            display: block;
            margin: auto;
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            z-index: 1;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }


        /* Thêm các quy tắc CSS sau vào phần CSS hiện tại */
        .prev,
        .next {
            background-color: #f2f2f2;
            border: none;
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .prev:hover,
        .next:hover {
            background-color: #ddd;
        }
    </style>


</head>

<body>