<?php
    session_status();
    require_once '../../admin/connect.php';
    
    
    if(isset($_POST['submit']) && $_POST['username_user'] != '' && $_POST['password_user'] != '' && $_POST['repassword'] != '' ) {
        //Thuc hien xu ly khi nguoi dung an nut submit va day du thong tin
        $connect = ConnectDB();
        $username_user = $_POST["username_user"];
        $password_user = $_POST["password_user"];
        // $fullname = 'Chua co gi';
        $repassword = $_POST["repassword"];

        if($password_user != $repassword){
            $_SESSION["thongbao"] = "Passowrd nhập lại không chính xác!";
            header("location:register.php");
            die();
        }
        $sql = "SELECT * FROM user WHERE username_user='$username_user' ";
        $result = $connect->query($sql);
        $password_user = md5($password_user);
        if( mysqli_num_rows($result) > 0){
            $_SESSION["thongbao"] = "Username đã tồn tại!";
            header("location:register.php");
            die();
        }

        $sql = "INSERT INTO user (username_user, password_user) VALUES ('$username_user','$password_user')";
        mysqli_query($connect,$sql);
        $_SESSION["thongbao"] = "Đã đăng ký thành công. CHuyển đến trang đăng nhập.";
        header("location:../login/login.php");
    }else {
        header("location:register.php");
    }