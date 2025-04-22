<?php
header('Content-Type: application/json');
require_once '../Core/connectDB.php';

class login_api extends connectDB {
    public function handle() {
        // Nhận dữ liệu JSON từ body
        $data = json_decode(file_get_contents("php://input"), true);

        // Kiểm tra thiếu hoặc rỗng
        if (
            !$data ||
            empty($data['username']) 
        ) {
            http_response_code(400);
            echo json_encode([
                'status' => 'error',
                'message' => 'Thiếu username'
            ]);
            return;
        }

        if (
            !$data ||
            empty($data['password'])
        ) {
            http_response_code(400);
            echo json_encode([
                'status' => 'error',
                'message' => 'Thiếu password'
            ]);
            return;
        }

        $username = trim($data['username']);
        $password = trim($data['password']);

        // Truy vấn theo username
        $sql = "SELECT * FROM nhanvien WHERE Username = '$username'";
        $result = mysqli_query($this->con, $sql);

        // Không tồn tại username
        if (!$result || mysqli_num_rows($result) === 0) {
            http_response_code(401);
            echo json_encode([
                'status' => 'fail',
                'message' => 'Username không tồn tại'
            ]);
            return;
        }

        $row = mysqli_fetch_assoc($result);

        // Kiểm tra mật khẩu (bản chưa mã hóa)
        if (trim($row['Password']) !== $password) {
            http_response_code(401);
            echo json_encode([
                'status' => 'fail',
                'message' => 'Sai mật khẩu'
            ]);
            return;
        }

        // Trả kết quả thành công
        echo json_encode([
            'status' => 'success',
            'message' => 'Đăng nhập thành công',
            'data' => [
                'ten' => $row['MaCanBo'],
                'vaitro' => $row['ChucVu'],
            ]
        ]);
        
    }
}

$api = new login_api();
$api->handle();
