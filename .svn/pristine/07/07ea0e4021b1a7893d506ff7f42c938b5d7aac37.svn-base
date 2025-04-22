<?php
class themdocgia_ctrl extends controller{
    private $nutthem;
    function __construct()
    {
        $this->nutthem = $this->model('docgia_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'docgia']);
    }
    public function them(){
        if(isset($_POST['btnluu'])){
            $TheDG = $_POST['txtTheDG'];
            $TenDG = $_POST['txtTenDG'];
            $MaLop = $_POST['txtMaLop'];
            $NgaySinh = $_POST['dNgaySinh'] ;
            $GioiTinh = $_POST['txtGioiTinh'];
            $SoDienThoai = $_POST['txtSoDienThoai'];
            $DiaChi = $_POST['txtDiaChi'];
            $NgayMuaThe= $_POST['dNgayMuaThe'];
            $NgayHetHan = $_POST['dNgayHetHan'];
            // kiem tra trung ma
            $trung = $this->nutthem-> docgia_checktrungma($TheDG);
            if($trung){
                echo "<script>alert('Mã độc giả bị trùng mời nhập lại')</script>";
            }else{
                // insert
                $kq = $this->nutthem -> docgia_ins($TheDG,$TenDG,$MaLop,$NgaySinh,$GioiTinh,$SoDienThoai,$DiaChi,$NgayMuaThe,$NgayHetHan);
                if($kq){
                    echo "<script>alert('Thêm mới độc giả thành công!')</script>";
                }else{
                    echo "<script>alert('Thêm mới độc giả thất bại!')</script>";
                }
            }
            $this->view('Masterlayout',
            ['page'=>'docgia',
            'TheDG' =>$TheDG,
            'TenDG'=>$TenDG,
            'MaLop' =>$MaLop,
            'NgaySinh'=>$NgaySinh,
            'GioiTinh'=>$GioiTinh,
            'SoDienThoai' =>$SoDienThoai,
            'DiaChi' =>$DiaChi,
            'NgayMuaThe' =>$NgayMuaThe,
            'NgayHetHan' =>$NgayHetHan
             ]);
        }
    }
    
}