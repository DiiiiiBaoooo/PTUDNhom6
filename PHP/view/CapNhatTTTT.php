<?php
session_start();
?>

<STYle>
    /* CSS cho thông báo với hiệu ứng di chuyển từ dưới lên */
    .message-3d {
        font-size: 12px;
        /* Giảm kích thước chữ */
        font-weight: bold;
        color: #fff;
        padding: 12px;
        border-radius: 10px;
        margin: 10px;
        text-transform: uppercase;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3), -4px -4px 10px rgba(0, 0, 0, 0.3);
        background: linear-gradient(145deg, #8B0000, #B22222);
        animation: slideUp 2s ease-out;
        /* Áp dụng animation di chuyển lên */
    }

    @keyframes slideUp {
        0% {
            transform: translateY(50px);
            /* Vị trí ban đầu (dưới) */
            opacity: 0;
            /* Ban đầu không hiển thị */
        }

        100% {
            transform: translateY(0);
            /* Vị trí cuối (ở vị trí ban đầu) */
            opacity: 1;
            /* Sau khi di chuyển lên, hiển thị */
        }
    }

    form {
        max-width: 1000px;
        /* Tăng chiều rộng form */
        margin: 0 auto;
        /* Căn giữa form */
        padding: 40px;
        /* Thêm khoảng cách bên trong */
    }
</STYle>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gymnast - Gym Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
      <link href="../assets/img/logo.png" rel="icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="../assets/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link rel="stylesheet" href="login/css/chitiethd.css">
    <link rel="stylesheet" href="login/css/style.css">
    <link rel="stylesheet" href="../assets/css/icon-hover.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/style.min.css" rel="stylesheet">
</head>
<STYle>
    h2.text-center {
        margin-bottom: -50px;
        /* Giảm khoảng cách dưới tiêu đề */
    }

    .table {
        margin-top: 0;
        /* Giảm khoảng cách trên bảng */
    }
</STYle>

<body class="bg-white">
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="../index.php" class="navbar-brand">
                <h1 class="m-0 display-4 font-weight-bold text-uppercase text-white">Gymnast</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4 bg-secondary">
                    <a href="../index.php" class="nav-item nav-link active">Trang chủ</a>
                    <a href="about.php" class="nav-item nav-link">Về chúng tôi</a>
                    <a href="feature.php" class="nav-item nav-link">Tin tức</a>
                    <a href="class.php" class="nav-item nav-link">Lớp học</a>

                    <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
                    <?php
                    if (!isset($_SESSION['dn'])) {
                        echo '<a href="dieukien.php" class="nav-item nav-link">Đăng nhập</a>';
                        echo '<a href="dangkitapthu.php" class="nav-item nav-link">Đăng ký tập thử</a>';
                    } else {
                        if ($_SESSION['dn'] == 1 || $_SESSION['dn'] == 2 || $_SESSION['dn'] == 3) {
                            echo '<a href="thongtinchungnv.php" class="nav-item nav-link">Hồ sơ</a>';
                        } else {
                            echo '<a href="thongtinchungtv.php" class="nav-item nav-link">Hồ sơ</a>';
                        }
                        echo '<a href="dangxuat.php" class="nav-item nav-link">Đăng xuất</a>';
                    }
                    ?>


                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5"
            style="min-height: 400px">
            <h4 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase font-weight-bold">Kế toán</h4>
            <div class="d-inline-flex">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Quản lý hóa đơn</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container pt-5">
        <div class="left">
            <div class="sidebar">
                <div class="menu">
                    <p>Menu</p>
                    <ul>
                        <?php
                        if (!$_SESSION['dn']) {
                            echo "<script>alert('Bạn không có quyền truy cập vào trang');</script>";
                            echo "<script>window.location.href = '../index.php';</script>";
                        }
                        echo '<li><a href="ThongTinchungNV.php">Thông tin chung</a></li>';
                        switch ($_SESSION['dn']) {
                            case 1: {
                                    echo ' <li><a href="QLNV.php">Quản lý nhân viên</a></li>';
                                    echo  '<li><a href="QLKM.php">Quản lý khuyến mãi</a></li>';
                                    echo  '<li><a href="QLLLV.php">Quản lý lịch làm việc</a></li>';
                                    echo  '<li><a href="QLGT.php">Quản lý Gói tập</a></li>';
                                    break;
                                }
                          case 2: {
                                    echo ' <li><a href="QLTV.php">Quản lý Thành viên</a></li>';
                                    echo  '<li><a href="QLTB.php">Quản lý thiết bị</a></li>';
                                    echo  '<li><a href="QLTBloi.php">Quản lý lỗi thiết bị</a></li>';
                                    break;
                                }
                            case 3: {
                                    echo ' <li><a href="QLHD.php">Quản lý hóa đơn</a></li>';
                                    break;
                                }
                        }




                         echo   '<li><a href="dangxuat.php">Đăng xuất</a></li>';

                        ?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="right">
            <div class="update-info-container">
            </div>
            <!-- Page Header End -->
            <?php
            include_once("../controller/cHoaDon.php");

            $successMessage = ''; // Biến để lưu thông báo thành công
            $errorMessage = ''; // Biến để lưu thông báo lỗi

            if (isset($_POST['btnUpdate'])) {
                $idhd = $_GET['idhd']; // Lấy ID Hóa Đơn từ URL
                $trangThai = $_POST['trangThai']; // Lấy trạng thái thanh toán từ form

                // Tạo đối tượng cHoaDon và gọi phương thức updateTT
                $cHoaDon = new cHoaDon();
                $result = $cHoaDon->updateTT($idhd, $trangThai);

                if ($result) {
                    $successMessage = 'Cập nhật trạng thái thanh toán thành công!'; // Lưu thông báo thành công
                    // Sau khi hiển thị thông báo, sẽ tự động chuyển hướng sau 3 giây
                    echo '<script>
                setTimeout(function() {
                    window.location.href = "QLHD.php";
                }, 1000); // Chuyển hướng sau 2 giây
              </script>';
                } else {
                    $errorMessage = 'Cập nhật thất bại!'; // Lưu thông báo lỗi
                }
            }
            ?>
            <?php
            if ($_SESSION['dn'] != 3) {
                echo "<script>alert('Bạn không có quyền truy cập vào trang');</script>";
                echo "<script>window.location.href = 'ThongTinChungNV.php';</script>";
            }

            ?>
            <!-- Form HTML -->
            <div class="col-lg-9,center">
                <div class="bg-light p-4">
                    <h2 class="text-center">Cập Nhật Trạng Thái Thanh Toán</h2>

                    <!-- Hiển thị thông báo thành công -->
                    <?php if ($successMessage): ?>
                        <div class="alert alert-success text-center message-3d">
                            <?php echo $successMessage; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Hiển thị thông báo lỗi -->
                    <?php if ($errorMessage): ?>
                        <div class="alert alert-danger text-center message-3d">
                            <?php echo $errorMessage; ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST" class="mt-4">
                        <div class="form-group">
                            <label for="trangThai"></label>
                            <select name="trangThai" id="trangThai" class="form-control" required>
                                <option value="" disabled selected>-- Chọn trạng thái --</option>
                                <option value="Đã thanh toán">Đã thanh toán</option>
                                <option value="Chưa thanh toán">Chưa thanh toán</option>
                            </select>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" name="btnUpdate" class="btn btn-primary px-4">Cập nhật</button>
                            <a href="QLHD.php" class="btn btn-secondary px-4">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Start -->
    <div class="footer container-fluid mt-5 py-5 px-sm-3 px-md-5 text-white">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <!-- Additional Footer Content -->
        </div>
        <div class="container border-top border-dark pt-5">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                by
                <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="../assets/mail/contact.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>