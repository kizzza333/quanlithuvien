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
            // ✅ Lấy tất cả sách
            $result = $conn->query("SELECT * FROM sach");
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            echo json_encode($rows);
        } elseif ($action === 'detail' && isset($_GET['MaSach'])) {
            // ✅ Lấy 1 sách theo mã
            $ma = $_GET['MaSach'];
            $res = $conn->query("SELECT * FROM sach WHERE MaSach = '$ma'");
            echo json_encode($res->fetch_assoc() ?? []);
        } elseif ($action === 'search') {
            // ✅ Tìm kiếm sách
            $masach = $_GET['MaSach'] ?? '';
            $ten = $_GET['TenSach'] ?? '';
            $sql = "SELECT * FROM sach WHERE MaSach LIKE '%$masach%' AND TenSach LIKE '%$ten%'";
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
                $masach    = trim($data['MaSach'] ?? '');
                $tensach   = trim($data['TenSach'] ?? '');
                $matheloai = trim($data['MaTheLoai'] ?? '');
                $matacgia  = trim($data['MaTacGia'] ?? '');
                $manxb     = trim($data['MaNXB'] ?? '');
                $soluong   = trim($data['SoLuong'] ?? '');
                $noidung   = trim($data['NoiDung'] ?? '');
                $tinhtrang = trim($data['TinhTrang'] ?? 'Tốt');
        
                // Kiểm tra thiếu dữ liệu
                $required = ['MaSach', 'TenSach', 'MaTheLoai', 'MaTacGia', 'MaNXB', 'SoLuong', 'NoiDung', 'TinhTrang'];
                $missing = array_filter($required, fn($f) => empty($data[$f]));
                if (!empty($missing)) {
                    http_response_code(400);
                    echo json_encode(['message' => 'Thiếu: ' . implode(', ', $missing)]);
                    exit;
                }
        
                // Kiểm tra số lượng
                if (!is_numeric($soluong) || (int)$soluong <= 0) {
                    http_response_code(400);
                    echo json_encode(['message' => 'Số lượng phải là số nguyên dương']);
                    exit;
                }
                $soluong = (int)$soluong;
        
                // Kiểm tra tồn tại mã liên kết
                function exists($conn, $table, $column, $value) {
                    $stmt = $conn->prepare("SELECT 1 FROM $table WHERE $column = ? LIMIT 1");
                    $stmt->bind_param("s", $value);
                    $stmt->execute();
                    $stmt->store_result();
                    return $stmt->num_rows > 0;
                }
        
                if (!exists($conn, 'theloai', 'MaTheLoai', $matheloai)) {
                    response(400, '❌ Mã thể loại không tồn tại');
                }
                if (!exists($conn, 'tacgia', 'MaTacGia', $matacgia)) {
                    response(400, '❌ Mã tác giả không tồn tại');
                }
                if (!exists($conn, 'nhaxuatban', 'MaNXB', $manxb)) {
                    response(400, '❌ Mã nhà xuất bản không tồn tại');
                }
        
                // Kiểm tra trùng mã và tên
                $checkMa = $conn->query("SELECT * FROM sach WHERE MaSach = '$masach'");
                $checkTen = $conn->query("SELECT * FROM sach WHERE TenSach = '$tensach'");
                $checkCa = $conn->query("SELECT * FROM sach WHERE MaSach = '$masach' AND TenSach = '$tensach'");
        
                if ($checkMa->num_rows > 0) {
                    if ($checkCa->num_rows > 0) {
                        $row = $checkCa->fetch_assoc();
                        $newSoLuong = (int)$row['SoLuong'] + $soluong;
                        $conn->query("UPDATE sach SET SoLuong = $newSoLuong WHERE MaSach = '$masach'");
                        response(200, '✅ Cập nhật số lượng sách');
                    } else {
                        response(400, '❌ Mã sách đã tồn tại với tên khác');
                    }
                } else {
                    if ($checkTen->num_rows > 0) {
                        response(400, '❌ Tên sách đã tồn tại với mã khác');
                    }
        
                    $stmt = $conn->prepare("INSERT INTO sach (MaSach, TenSach, MaTheLoai, MaTacGia, MaNXB, SoLuong, NoiDung, TinhTrang) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssisss", $masach, $tensach, $matheloai, $matacgia, $manxb, $soluong, $noidung, $tinhtrang);
                    $ok = $stmt->execute();
                    response($ok ? 201 : 500, $ok ? '✅ Thêm sách thành công' : '❌ Thêm sách thất bại');
                }
            }
            break;
        
        
        
        
        
        

        case 'PUT':
            if ($action === 'update') {
        
                // 🔍 Kiểm tra có truyền mã sách không
                if (!isset($_GET['MaSach']) || empty(trim($_GET['MaSach']))) {
                    http_response_code(400);
                    echo json_encode(['message' => '⚠️ Chưa truyền mã sách']);
                    exit;
                }
        
                $ma = $_GET['MaSach'];
        
                // 🔍 Kiểm tra sách có tồn tại không
                $check = $conn->query("SELECT * FROM sach WHERE MaSach = '$ma'");
                if ($check->num_rows === 0) {
                    http_response_code(404);
                    echo json_encode(['message' => '❌ Không tìm thấy mã sách: ' . $ma]);
                    exit;
                }
        
                // 📦 Đọc dữ liệu PUT
                parse_str(file_get_contents("php://input"), $data);
        
                $ten = trim($data['TenSach'] ?? '');
                $tl  = trim($data['MaTheLoai'] ?? '');
                $tg  = trim($data['MaTacGia'] ?? '');
                $nxb = trim($data['MaNXB'] ?? '');
                $sl  = (int)($data['SoLuong'] ?? 0);
                $nd  = trim($data['NoiDung'] ?? '');
                $tt  = trim($data['TinhTrang'] ?? 'Tốt');
        
                // 🛑 Kiểm tra thiếu dữ liệu
                if (!$ten || !$tl || !$tg || !$nxb || !$sl || !$nd || !$tt) {
                    http_response_code(400);
                    echo json_encode(['message' => '⚠️ Thiếu dữ liệu cần cập nhật']);
                    exit;
                }
        
                // ✅ Tiến hành cập nhật
                $stmt = $conn->prepare("UPDATE sach SET TenSach=?, MaTheLoai=?, MaTacGia=?, MaNXB=?, SoLuong=?, NoiDung=?, TinhTrang=? WHERE MaSach=?");
                $stmt->bind_param("ssssisss", $ten, $tl, $tg, $nxb, $sl, $nd, $tt, $ma);
                $ok = $stmt->execute();
        
                echo json_encode([
                    'message' => $ok ? '✅ Cập nhật thành công' : '❌ Cập nhật thất bại'
                ]);
            }
            break;
        

        case 'DELETE':
            if ($action === 'delete') {
                if (!isset($_GET['MaSach']) || empty(trim($_GET['MaSach']))) {
                    http_response_code(400);
                    echo json_encode(['message' => '⚠️ Chưa truyền mã sách']);
                    exit;
                }
        
                $ma = $_GET['MaSach'];
                $result = $conn->query("DELETE FROM sach WHERE MaSach = '$ma'");
        
                if ($conn->affected_rows > 0) {
                    echo json_encode(['message' => '✅ Đã xoá mã sách: ' . $ma]);
                } else {
                    http_response_code(404);
                    echo json_encode(['message' => '❌ Không tìm thấy sách có mã: ' . $ma]);
                }
            }
            break;
        

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Phương thức không hỗ trợ']);
}
