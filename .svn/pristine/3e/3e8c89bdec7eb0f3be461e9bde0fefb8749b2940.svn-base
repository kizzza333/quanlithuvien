<?php
class Nhanvien extends controller{
    private $nhanvien;
    function __construct()
    {
        $this->nhanvien = $this->model('Nhanvien_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'Nhanvien_v']);
    }
    public function them(){
        if(isset($_POST['btnLuu'])){
            $macanbo = $_POST['txtMaCanBo'];
            $tencanbo = $_POST['txtTenCanBo'];
            $taikhoan = $_POST['txtTaiKhoan'];
            $matkhau = $_POST['txtMatKhau'];
            $ngaysinh = $_POST['txtNgaySinh'];
            $gioitinh = $_POST['ddlGioiTinh'];
            $chucvu = $_POST['ddlChucVu'];
            $dienthoai = $_POST['txtDienThoai'];
            $email = $_POST['txtEmail'];
            $diachi = $_POST['txtDiaChi'];
            // kiem tra trung ma
            $trung = $this->nhanvien -> nhanvien_checktrungma($macanbo);
            if($trung){
                echo "<script>alert('Mã nhân viên bị trùng mời nhập lại!')</script>";
            }else{
                // insert
                $kq = $this->nhanvien -> nhanvien_ins($macanbo,$tencanbo,$taikhoan,$matkhau,$ngaysinh,$gioitinh,$chucvu,$dienthoai,$email,$diachi);
                if($kq){
                    echo "<script>alert('Thêm nhân viên thành công!')</script>";
                }else{
                    echo "<script>alert('Thêm nhân viên thất bại!')</script>";
                }
            }
            $this->view('Masterlayout',
            ['page'=>'Nhanvien_v',
            'MaCanBo'=>$macanbo,
            'TenCanBo'=>$tencanbo,
            'Username'=>$taikhoan,
            'Password'=>$matkhau,
            'NgaySinh'=>$ngaysinh,
            'GioiTinh'=>$gioitinh,
            'ChucVu'=>$chucvu,
            'DienThoai'=>$dienthoai,
            'Email'=>$email,
            'DiaChi'=>$diachi
        ]);
        }
    }
}
?>