<?php
class quanlitinhtrang_ctrl extends controller{
    private $tinhtrang;
    function __construct()
    {
        $this->tinhtrang = $this->model('quanlitinhtrang_m');
    }
    function Get_data() {
        $dulieu = $this->tinhtrang->sachtra_ListAll();
        $this->view('Masterlayout', [
            'page' => 'quanlitinhtrang_v',
            'dulieu' => $dulieu
        ]);
    }
    public function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $masach = $_POST['txtMaSach'];
            $thedg = $_POST['txtTheDG'];
            $dulieu=$this->tinhtrang->sachtra_find($masach, $thedg);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'quanlitinhtrang_v',
                'dulieu'=>$dulieu,
                'MaSach'=>$masach,
                'TheDG'=>$thedg
                // 'MaPhieu'=>$maphieu,
                // 'MaSach'=>$masach,
                // 'NgayLap' => $ngaylap,
                // 'NgayHenTra'=> $ngayhentra,
                // 'SoLuong' => $soluong,
                // 'GhiChu' => $ghichu,
                // 'TinhTrang' => $tinhtrang
            ]);
        }
    }
    public function timkiem1(){
            $masach = '';
            $thedg = '';
            $dulieu=$this->tinhtrang->sachtra_find($masach, $thedg);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'quanlitinhtrang_v',
                'dulieu'=>$dulieu,
                'MaSach'=>$masach,
                'TheDG'=>$thedg
                // 'MaPhieu'=>$maphieu,
                // 'MaSach'=>$masach,
                // 'NgayLap' => $ngaylap,
                // 'NgayHenTra'=> $ngayhentra,
                // 'SoLuong' => $soluong,
                // 'GhiChu' => $ghichu,
                // 'TinhTrang' => $tinhtrang
            ]);
    }
}
?>