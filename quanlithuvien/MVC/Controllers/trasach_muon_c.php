<?php 
class trasach_muon_c extends controller{
    private $ds;

    function __construct()
    {
        $this->ds = $this->model('trasach_m');
    }

    function Get_data() {
            $dulieu = $this->ds->muon();
            $this->view('Masterlayout', [
                'page' => 'trasach_muon_v',
                'dulieu' => $dulieu,
            ]);
    }

    function timkiem() {
        if (isset($_POST['btnTimkiem'])) {
            $maphieu = $_POST['txtMaPhieu'];
            $thedg = $_POST['txtTheDG'];
            $dulieu = $this->ds->find_muon($maphieu,$thedg);

            // Gọi lại giao diện và truyền $dulieu ra
            $this->view('Masterlayout', [
                'page' => 'trasach_muon_v',
                'dulieu' => $dulieu,
                'MaPhieu' => $maphieu,
                'TheDG' => $thedg
            ]);
        }
    }
    function truyen($maphieu) {
        $dulieu = $this->ds->find2($maphieu);

        $this->view('Masterlayout', [
            'page' => 'trasach_phat_v',
            'dulieu' => $dulieu,
        ]);
    }
//
}
?>
