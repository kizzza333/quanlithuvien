<?php
class themmuonsach_ctrl extends controller{
    private $muonsach;
    function __construct()
    {
        $this->muonsach = $this->model('muonsach_m');
    }
    function Get_data(){
        $this->view('Masterlayout',['page'=>'muonsach_v',
        'sach' => $this->muonsach -> sach_ListAll(),
        'docgia'=> $this->muonsach -> docgia_ListAll(), 
    ]);
    }
    public function them(){
        if(isset($_POST['btnLuu'])){
            $maphieu = $_POST['txtMaPhieu'];
            $masach = $_POST['cboMaSach'];
            $thedocgia = $_POST['cboTheDG'];
            $macanbo = $_POST['txtCanBo'];
            $ngaylap = $_POST['dateNgayLap'];
            $ngayhentra = $_POST['dateNgayHenTra'];
            $ngayketthuc = '0000-00-00';
            $soluong = $_POST['txtSoLuong'];
            $ghichu  = $_POST['txtGhiChu'];
            $tinhtrang = $_POST['txtTinhTrang'];
            $trangthai = 'Chưa trả';
            $ngayhomnay = date("Y-m-d");;
            $soluongconlai = $_POST['txtSoLuongConLai'];
            // kiem tra trung ma
            $trung = $this->muonsach -> muonsach_checktrungma($maphieu);
            $trung1 = $this->muonsach -> muonsach_checktrungmaDG($maphieu,$thedocgia);
            $trung2 =$this->muonsach -> muonsach_checktrungmaphieuvamasach($maphieu,$masach);
            // $checkhethanthe = $this->muonsach ->muonsach_checkThe($thedocgia); 
            $kq2 = $soluongconlai - $soluong;
            if($trung){
                if($trung1){
                    
                    if($kq2>0){
                        
                            if($soluong>4){
                                echo "<script>alert('Mỗi mã phiếu chỉ được mượn tối đa 4 quyển mỗi loại, mời chọn quyển khác!')</script>";
                            }else{
                                $kq1 = $this->muonsach -> muonsachchitietphieu_ins($maphieu,$masach,$ngayhentra,$ngayketthuc,$soluong,$ghichu,$tinhtrang);
                        $kq3 = $this->muonsach -> sach_updsach($masach,$kq2);
                            if($kq1&&$kq3){
                                echo "<script>alert('Mượn sách thành công!')</script>";
                            }else{
                                echo "<script>alert('Mượn sách thất bại!')</script>";
                            }
                            }
                        
                            }else{
                                echo "<script>alert('Vui lòng chọn lại số lượng sách!!')</script>";
                            }
                }else{
                    echo "<script>alert('Mượn sách thất bại! Mời chọn Mã độc giả khác!!')</script>";
                }
            }else{
                if($kq2>0){
                    if($soluong>4){
                        echo "<script>alert('Tối đa mượn 4 quyển mỗi loại sách!')</script>";
                    }else{
                        $kq = $this->muonsach -> muonsachphieu_ins($maphieu,$macanbo,$thedocgia,$ngaylap,$ngayhentra,$ngayketthuc,$trangthai);
                $kq1 = $this->muonsach -> muonsachchitietphieu_ins($maphieu,$masach,$ngayhentra,$ngayketthuc,$soluong,$ghichu,$tinhtrang);
                $kq3 = $this->muonsach -> sach_updsach($masach,$kq2);
                if($kq && $kq1 && $kq3){
                    echo "<script>alert('Mượn sách thành công!')</script>";
                }else{
                    echo "<script>alert('Mượn sách thất bại!')</script>";
                }
                    }
                }else{
                    echo "<script>alert('Vui lòng chọn lại số lượng sách!!')</script>";
                }
                
            } 
            // in lại giao diện  
            $this->view('Masterlayout',
            ['page'=>'muonsach_v',
            'MaPhieu' => $maphieu,
            'MaCanBo' => $macanbo,
            'TheDG' => $thedocgia,
            'NgayLap'=>$ngaylap,
            'NgayHenTra' => $ngayhentra,
            'NgayTra'=> $ngayketthuc,
            'sach' => $this->muonsach -> sach_ListAll(),
             'docgia'=> $this->muonsach -> docgia_ListAll(),
             'SoLuong' => $soluong,
             'GhiChu' => $ghichu,
             'TinhTrang' => $tinhtrang,
             'TrangThai' => $trangthai
            ]);
            
        }
        if(isset($_POST['btnTimkiem'])){
            if(isset($_POST['txtMaDocGia'])){
                $theDG = isset($_POST['txtMaDocGia']) ? isset($_POST['txtMaDocGia']) : '' ;
                $maphieu = isset($_POST['txtMaPhieu']) ? isset($_POST['txtMaPhieu']) : '' ;
                $masach = isset($_POST['cboMaSach']) ? isset($_POST['cboMaSach']) : '' ;
                $thedocgia = isset($_POST['cboTheDG']) ? isset($_POST['cboTheDG']) : '' ;
                $macanbo =  isset($_POST['txtCanBo']) ? isset($_POST['txtCanBo']) : '' ;
                $ngaylap = $_POST['dateNgayLap'];
                $ngayhentra = $_POST['dateNgayHenTra'];
                $ngayketthuc = isset($_POST['dateNgayKetThuc']) ? isset($_POST['dateNgayKetThuc']) : '0000-00-00';
                $soluong = $_POST['txtSoLuong'];
                $ghichu  = $_POST['txtGhiChu'];
                $tinhtrang = $_POST['txtTinhTrang'];
                $maphieu  = isset($_POST['txtMaPhieu']) ? isset($_POST['txtMaPhieu']) : '' ;
                $masach  = isset($_POST['cboMaSach']) ? isset($_POST['cboMaSach']) : '' ;
                $thedocgia = isset($_POST['cboTheDG']) ? isset($_POST['cboTheDG']) : '' ;
                $macanbo = isset($_POST['txtCanBo']) ? isset($_POST['txtCanBo']) : '' ;
                $ngaylap  = isset($_POST['dateNgayLap']) ? isset($_POST['dateNgayLap']) : '' ; 
                $ngayhentra = isset($_POST['dateNgayHenTra']) ? isset($_POST['dateNgayHenTra']) : '' ;  
                $soluong  = isset($_POST['txtSoLuong']) ? isset($_POST['txtSoLuong']) : '';
                $ghichu = isset($_POST['txtGhiChu']) ? isset($_POST['txtGhiChu']) : '';
                $tinhtrang = isset($_POST['txtTinhTrang']) ? isset($_POST['txtTinhTrang']) : '';
                $dulieu=$this->muonsach->muonsach_find($theDG);
                //Gọi lại giao diện và truyền $dulieu ra
                $this->view('Masterlayout',[
                    'page'=>'muonsach_v',
                    'dulieu'=>$dulieu,
                    'MaCanBo' => $macanbo,
                    'TheDG' => $thedocgia,
                    'NgayLap'=>$ngaylap,
                    'NgayHenTra' => $ngayhentra,
                    'MaPhieu'=>$maphieu,
                    'MaSach'=>$masach,
                    'NgayLap' => $ngaylap,
                    'NgayHenTra'=> $ngayhentra,
                    'SoLuong' => $soluong,
                    'GhiChu' => $ghichu,
                    'TinhTrang' => $tinhtrang
                ]);
            }
        }
        
    }
    public function timkiem(){
        if(isset($_POST['txtMaDocGia'])){
            $theDG = $_POST['txtMaDocGia'];
            $maphieu = isset($_POST['txtMaPhieu']) ? isset($_POST['txtMaPhieu']) : '' ;
            $masach = isset($_POST['cboMaSach']) ? isset($_POST['cboMaSach']) : '' ;
            $thedocgia = isset($_POST['cboTheDG']) ? isset($_POST['cboTheDG']) : '' ;
            $macanbo =  isset($_POST['txtCanBo']) ? isset($_POST['txtCanBo']) : '' ;
            $ngayketthuc = isset($_POST['dateNgayKetThuc']) ? isset($_POST['dateNgayKetThuc']) : '0000-00-00';
            $maphieu  = isset($_POST['txtMaPhieu']) ? isset($_POST['txtMaPhieu']) : '' ;
            $masach  = isset($_POST['cboMaSach']) ? isset($_POST['cboMaSach']) : '' ;
            $ngaylap  = isset($_POST['dateNgayLap']) ? isset($_POST['dateNgayLap']) : '' ; 
            $ngayhentra = isset($_POST['dateNgayHenTra']) ? isset($_POST['dateNgayHenTra']) : '' ;  
            $soluong  = isset($_POST['txtSoLuong']) ? isset($_POST['txtSoLuong']) : '';
            $ghichu = isset($_POST['txtGhiChu']) ? isset($_POST['txtGhiChu']) : '';
            $tinhtrang = isset($_POST['txtTinhTrang']) ? isset($_POST['txtTinhTrang']) : '';
            $dulieu=$this->muonsach->muonsach_find($theDG);
            //Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout',[
                'page'=>'muonsach_v',
                'dulieu'=>$dulieu,
                'MaPhieu' => $maphieu,
                'MaCanBo' => $macanbo,
                'TheDG' => $thedocgia,
                'NgayLap'=>$ngaylap,
                'NgayHenTra' => $ngayhentra,
                'NgayTra'=> $ngayketthuc,
                'sach' => $this->muonsach -> sach_ListAll(),
                'docgia'=> $this->muonsach -> docgia_ListAll(),
                'SoLuong' => $soluong,
                'GhiChu' => $ghichu,
                'TinhTrang' => $tinhtrang,
                'MaPhieu'=>$maphieu,
                'MaSach'=>$masach,
                'NgayLap' => $ngaylap,
                'NgayHenTra'=> $ngayhentra,
                'SoLuong' => $soluong,
                'GhiChu' => $ghichu,
                'TinhTrang' => $tinhtrang
            ]);
        }
    }
    
}