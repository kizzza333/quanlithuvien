<?php
class TKmuonquahan extends controller{
    private $muonquahan;
    function __construct()
    {
        $this->muonquahan = $this->model('TKmuonquahan_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'TKmuonquahan_v',
    ]);
    }
    public function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $thedg = $_POST['txtTheDG'];
            $tenDG = $_POST['txtTenDG'];
            $dulieu=$this->muonquahan->quahan_find($thedg,$tenDG);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'TKmuonquahan_v',
                'dulieu'=>$dulieu,
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
        $thedg = '';
        $tenDG = '';
        $dulieu=$this->muonquahan->quahan_find($thedg,$tenDG);
        //Gọi lại giao diện và truyền $dulieu ra
        $this->view('Masterlayout',[
            'page'=>'TKmuonquahan_v',
            'dulieu'=>$dulieu,
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