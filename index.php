<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/TaiKhoanController.php';
require_once './controllers/LienHeController.php';
require_once './controllers/SanPhamController.php';
require_once './controllers/DonHangController.php';
require_once './controllers/TinTucController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/LienHe.php';
require_once './models/DonHang.php';
require_once './models/TinTuc.php';


// Route
$act = $_GET['act'] ?? '/';
// var_dump($_GET['act']);die();

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController())->home(),
    // Trường hợp đặc biệt
//route trang thai binh luan
// 'update-trang-thai-binh-luan' => (new SanPhamController())->updateTrangThaiBinhLuan(),
 // sản phẩm
 'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
 'danh-sach-san-pham' => (new HomeController())->danhSachSanPham(),

    
    // Base URL/?act=dnah-sach-san-pham
    'them-gio-hang' => (new HomeController())->addGioHang(),
    'gio-hang' => (new HomeController())->gioHang(),
    'thanh-toan' =>(new HomeController())->thanhToan(),
    'post-thanh-toan' =>(new HomeController())->postThanhToan(),
    
    // 'xoa-san-pham-gio-hang' 

    // +
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'logout' => (new HomeController())->Logout(),
    'dangky' => (new HomeController())->formAddDangky(),
    'check-dangky' => (new HomeController())->postAddDangKy(),
    //
    'update-gio-hang' => (new HomeController())->updateGioHang(),


   

//tin tuc


    'list-tai-khoan' => (new TaiKhoanController())->danhSach(),
    'form-them' => (new TaiKhoanController())->formAdd(),
    'them' => (new TaiKhoanController())->postAdd(),
//
'form-them-lien-he' => (new LienHeController())->formAdd(), // Hiển thị form thêm liên hệ
'them-lien-he' => (new LienHeController())->postAdd(),      // Xử lý thêm liên hệ

//search
'search' => (new SanPhamController())->searchSanPham(),
//
'don-hang' => (new DonHangController())->donHang(),
'chi-tiet-don-hang' => (new DonHangController())->chiTietDonHang(),
//xoa san pham gio hang
'xoa-san-pham-gio-hang'  =>(new HomeController()) ->xoaSanPhamGioHang(),
//
'huy-don-hang' =>(new DonHangController())->huyDonHang(),
'da-nhan-don-hang' => (new DonHangController())->daNhanDonHang(),

//
'danh-sach-tin-tuc' => (new TinTucController())->danhSachTinTuc(),
'chi-tiet-tin-tuc' => (new TinTucController())->detailTinTuc(),





};