<!DOCTYPE html>
<html lang="en">
<head>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra xem người dùng có phải là admin không
if($_SESSION['username'] == 'admin'){
    $isAdmin = isset($_SESSION['username']) && $_SESSION['username'];
}else {
    $isAdmin = '';
}

// Sau đó, sử dụng điều kiện để hiển thị hoặc ẩn liên kết trên navbar
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư viện UTT</title>
    <link rel="stylesheet" href="http://localhost/quanlithuvien/Public/css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .hidden {
            display: none;
        }
        /* Định dạng header */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Căn giữa các phần tử */
            padding: 10px;
            background-color: #f8f9fa; /* Thay đổi màu nền */
            border-bottom: 1px solid #ddd; /* Thêm viền dưới */
        }
        .header img {
            height: 80px; /* Giảm kích thước ảnh */
        }
        .header h1 {
            color: #007bff; /* Thay đổi màu chữ */
            font-size: 36px; /* Thay đổi kích thước chữ */
            font-weight: bold; /* In đậm chữ */
            cursor: pointer; /* Biến con trỏ thành pointer khi di chuột qua */
        }
        /* Định dạng navbar */
        .navbar-inverse {
            margin: 0; /* Xóa margin */
        }
        .navbar-inverse .navbar-nav > li > a {
            color: #fff;
            font-size: 18px; /* Thay đổi kích thước font chữ */
        }
        .navbar-inverse .navbar-nav > li > a:hover,
        .navbar-inverse .navbar-nav > li > a:focus {
            color: #ffc107; /* Thay đổi màu khi di chuột qua */
            background-color: transparent;
        }
        .navbar-inverse .navbar-nav > .dropdown > a .caret {
            border-top-color: #fff;
            border-bottom-color: #fff;
        }
        .navbar-inverse .navbar-nav > .dropdown > a:hover .caret,
        .navbar-inverse .navbar-nav > .dropdown > a:focus .caret {
            border-top-color: #ffc107; /* Thay đổi màu biểu tượng caret khi di chuột qua */
            border-bottom-color: #ffc107; /* Thay đổi màu biểu tượng caret khi di chuột qua */
        }
        .navbar-inverse .navbar-collapse {
            padding: 0; /* Xóa padding */
        }
        
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="http://localhost/quanlithuvien/home">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh Mục<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost/quanlithuvien/loaisach_ctrl/timkiem1">Quản lý loại sách</a></li>
                            <li><a href="http://localhost/quanlithuvien/sach_ctrl/timkiem1">Quản lý sách</a></li>
                            <?php if ($isAdmin): ?>
                            <li><a href="http://localhost/quanlithuvien/tacgia_ds_c">Quản lý tác giả</a></li>
                            <li><a href="http://localhost/quanlithuvien/nxb_ds_c">Quản lý nhà xuất bản</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php if ($isAdmin): ?>
                    <li><a href="http://localhost/quanlithuvien/docgia_ctrl/timkiem1">Quản lý độc giả</a></li>
                    <li><a href="http://localhost/quanlithuvien/Danhsachnhanvien/timkiem1">Quản lý nhân viên</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Quản lý nghiệp vụ<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost/quanlithuvien/themmuonsach_ctrl/">Mượn sách</a></li>
                            <li><a href="http://localhost/quanlithuvien/trasach_ds_c">Trả sách</a></li>
                            <li><a href="http://localhost/quanlithuvien/giahanmuon_ctrl/timkiem1">Gia hạn mượn</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Báo cáo thống kê<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost/quanlithuvien/trasach_muon_c">Thống kê mượn quá hạn </a></li>
                            <li><a href="http://localhost/quanlithuvien/sachmuonnhieunhat/">Thống kê sách mượn nhiều nhất</a></li>
                            <li><a href="http://localhost/quanlithuvien/quanlitinhtrang_ctrl/timkiem1">Thống kê tình trạng sách đã trả</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
                <!-- Các nút bên phải -->
                <ul class="nav navbar-nav navbar-right">
                    <label for="myUsername" ></label>
                    <li><a name = "aUsername" href=""><span class="glyphicon glyphicon-user"></span><?php echo isset($_SESSION['username'])? $_SESSION['username'] : '' ; ?></a></li>
                    <li><a href="http://localhost/quanlithuvien/dangnhap_ctrl"><span class="glyphicon glyphicon-log-in"></span> Thoát</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nội dung -->
    <div class="content1">
        <?php 
            include_once './MVC/Views/Pages/'.$data['page'].'.php';
        ?>
    </div>
    <!-- Footer -->
    <div></div>
</body>
</html>
