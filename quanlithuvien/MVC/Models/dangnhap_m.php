<?php
class dangnhap_m extends connectDB {

    function checkdangnhap($username, $password) {
        $sql = "SELECT * FROM nhanvien WHERE Username='$username' AND Password='$password'";
        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0) {
            // Đăng nhập thành công, trả về thông tin người dùng
            $user = mysqli_fetch_assoc($result);
            return $user;
        } else {
            // Đăng nhập không thành công
            return false;
        }
    }
    function checkUsername($username) {
        $sql = "SELECT * FROM nhanvien WHERE Username = '$username'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_num_rows($result) > 0;
    }

}

?>