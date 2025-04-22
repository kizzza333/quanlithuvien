<?php
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'quanlymuontrasach';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['message' => 'Không thể kết nối CSDL']);
    exit;
}
function response($code, $message) {
    http_response_code($code);
    echo json_encode(['message' => $message]);
    exit;
}

// ===== XỬ LÝ TỪNG API ===== //
switch ($method) {
    case 'GET':
        if ($action === 'list') {
            // ✅ Lấy tất cả tác giả
            $result = $conn->query("SELECT * FROM tacgia");
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            echo json_encode($rows);
        } elseif ($action === 'detail' && isset($_GET['MaTacGia'])) {
            // ✅ Lấy 1 tác giả theo mã
            $ma = $_GET['MaTacGia'];
            $res = $conn->query("SELECT * FROM tacgia WHERE MaTacGia = '$ma'");
            echo json_encode($res->fetch_assoc() ?? []);
        } elseif ($action === 'search') {
            // ✅ Tìm kiếm tác giả
            $matacgia = $_GET['MaTacGia'] ?? '';
            $tentacgia = $_GET['TenTacGia'] ?? '';
            $sql = "SELECT * FROM tacgia WHERE MaTacGia LIKE '%$matacgia%' AND TenTacGia LIKE '%$tentacgia%'";
            $result = $conn->query($sql);
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            echo json_encode($rows);
        }
        break;

    case 'POST':
        if ($action === 'add') {
            $data = json_decode(file_get_contents("php://input"), true);

            // Gán giá trị
            $matacgia = trim($data['MaTacGia'] ?? '');
            $tentacgia = trim($data['TenTacGia'] ?? '');
            $ngaysinh = trim($data['NgaySinh'] ?? '');
            $gioitinh = trim($data['GioiTinh'] ?? '');
            $dienthoai = trim($data['DienThoai'] ?? '');
            $diachi = trim($data['DiaChi'] ?? '');

            // Kiểm tra thiếu dữ liệu
            $required = ['MaTacGia', 'TenTacGia', 'NgaySinh', 'GioiTinh', 'DienThoai', 'DiaChi'];
            $missing = array_filter($required, fn($f) => empty($data[$f]));
            if (!empty($missing)) {
                http_response_code(400);
                echo json_encode(['message' => 'Thiếu: ' . implode(', ', $missing)]);
                exit;
            }

            // Kiểm tra trùng mã
            $checkMa = $conn->query("SELECT * FROM tacgia WHERE MaTacGia = '$matacgia'");
            if ($checkMa->num_rows > 0) {
                response(400, '❌ Mã tác giả đã tồn tại');
            }

            // Thêm tác giả mới
            $stmt = $conn->prepare("INSERT INTO tacgia (MaTacGia, TenTacGia, NgaySinh, GioiTinh, DienThoai, DiaChi) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $matacgia, $tentacgia, $ngaysinh, $gioitinh, $dienthoai, $diachi);
            $ok = $stmt->execute();
            response($ok ? 201 : 500, $ok ? '✅ Thêm tác giả thành công' : '❌ Thêm tác giả thất bại');
        }
        break;

    case 'PUT':
        if ($action === 'update') {
            // 🔍 Kiểm tra có truyền mã tác giả không
            if (!isset($_GET['MaTacGia']) || empty(trim($_GET['MaTacGia']))) {
                http_response_code(400);
                echo json_encode(['message' => '⚠️ Chưa truyền mã tác giả']);
                exit;
            }

            $ma = $_GET['MaTacGia'];

            // 🔍 Kiểm tra tác giả có tồn tại không
            $check = $conn->query("SELECT * FROM tacgia WHERE MaTacGia = '$ma'");
            if ($check->num_rows === 0) {
                http_response_code(404);
                echo json_encode(['message' => '❌ Không tìm thấy mã tác giả: ' . $ma]);
                exit;
            }

            // 📦 Đọc dữ liệu PUT
            parse_str(file_get_contents("php://input"), $data);

            $tentacgia = trim($data['TenTacGia'] ?? '');
            $ngaysinh = trim($data['NgaySinh'] ?? '');
            $gioitinh = trim($data['GioiTinh'] ?? '');
            $dienthoai = trim($data['DienThoai'] ?? '');
            $diachi = trim($data['DiaChi'] ?? '');

            // 🛑 Kiểm tra thiếu dữ liệu
            if (!$tentacgia || !$ngaysinh || !$gioitinh || !$dienthoai || !$diachi) {
                http_response_code(400);
                echo json_encode(['message' => '⚠️ Thiếu dữ liệu cần cập nhật']);
                exit;
            }

            // ✅ Tiến hành cập nhật
            $stmt = $conn->prepare("UPDATE tacgia SET TenTacGia=?, NgaySinh=?, GioiTinh=?, DienThoai=?, DiaChi=? WHERE MaTacGia=?");
            $stmt->bind_param("ssssss", $tentacgia, $ngaysinh, $gioitinh, $dienthoai, $diachi, $ma);
            $ok = $stmt->execute();

            echo json_encode([
                'message' => $ok ? '✅ Cập nhật thành công' : '❌ Cập nhật thất bại'
            ]);
        }
        break;

    case 'DELETE':
        if ($action === 'delete') {
            if (!isset($_GET['MaTacGia']) || empty(trim($_GET['MaTacGia']))) {
                http_response_code(400);
                echo json_encode(['message' => '⚠️ Chưa truyền mã tác giả']);
                exit;
            }

            $ma = $_GET['MaTacGia'];
            $result = $conn->query("DELETE FROM tacgia WHERE MaTacGia = '$ma'");

            if ($conn->affected_rows > 0) {
                echo json_encode(['message' => '✅ Đã xoá mã tác giả: ' . $ma]);
            } else {
                http_response_code(404);
                echo json_encode(['message' => '❌ Không tìm thấy tác giả có mã: ' . $ma]);
            }
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Phương thức không hỗ trợ']);
}
?>
