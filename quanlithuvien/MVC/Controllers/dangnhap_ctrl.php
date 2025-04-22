<?php 
class dangnhap_ctrl extends controller{
    private $dangnhap;
    private $muonsach;
    function __construct()
    {
        $this->dangnhap = $this->model('dangnhap_m');
        $this->muonsach = $this->model('muonsach_m');
    }
    function Get_data(){
        $this->view('space',[
            'page'=>'dangnhap'
        ]);
    }
    function dangnhap() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['txtUsername']);
            $password = trim($_POST['txtPassword']);

            // ⚠️ Kiểm tra ô trống
            if (empty($username)) {
                http_response_code(400); // Bad Request
                echo "<script>alert('Không được để trống username');</script>";
                $this->view('space', ['page' => 'dangnhap']);
                return;
            }

            if (empty($password)) {
                http_response_code(400); // Bad Request
                echo "<script>alert('Không được để trống password');</script>";
                $this->view('space', ['page' => 'dangnhap']);
                return;
            }

            // Kiểm tra tài khoản hợp lệ
            $user = $this->dangnhap->checkdangnhap($username, $password);

            if ($user) {
                // ✅ Đăng nhập thành công
                http_response_code(200);
                echo "<script>alert('Đăng nhập thành công!')</script>";
                $_SESSION['username'] = $username;

                if ($username == "admin") {
                    $this->view('Masterlayout', [
                        'page' => 'muonsach_v',
                        'sach' => $this->muonsach->sach_ListAll(),
                        'docgia' => $this->muonsach->docgia_ListAll(),
                    ]);
                } else {
                    $this->view('Masterlayout', ['page' => 'Home_v']);
                }
            } else {
                // ❌ Tài khoản không đúng → kiểm tra username/password
                if (!$this->dangnhap->checkUsername($username)) {
                    http_response_code(401); // Unauthorized
                    echo "<script>alert('Username không đúng');</script>";
                } else {
                    http_response_code(401); // Unauthorized
                    echo "<script>alert('Password không đúng');</script>";
                }

                $this->view('space', ['page' => 'dangnhap']);
            }
        }
    }
    public function logout() {
        // Xóa các biến session
        session_unset();

        // Hủy phiên session
        session_destroy();

        // Chuyển hướng về trang đăng nhập hoặc trang chính
        $this->view('space',[
            'space'=>'dangnhap',
        ]);
    }

}
?>