<?php
    session_start();
    require_once '../../admin/connect.php';
    
    if(isset($_POST['submit']) && $_POST['username_user'] != '' && $_POST['password_user'] != '' ) {
        $connect = ConnectDB();
        //Thuc hien xu ly khi nguoi dung an nut submit va day du thong tin
        $username_user = $_POST["username_user"];
        $password_user = $_POST["password_user"];
        $password_user = md5($password_user);
        
        $sql = "SELECT * FROM user WHERE username_user='$username_user' AND password_user='$password_user' ";
        $user = $connect->query($sql);

        if ($user->num_rows > 0) {
			$logged_in_user = mysqli_fetch_assoc($user);
            $avatar_user = $logged_in_user['avatar_user'];
            $fullname = $logged_in_user['fullname'];

            if ($logged_in_user['user_type'] == '0') {
            $_SESSION["user"] = $username_user;
            // $_SESSION["fullname"] = $fullname;
            // $_SESSION["phone"] = $phone;
            // $_SESSION["email"] = $email;
            // $_SESSION["bird"] = $bird;
            // $_SESSION["avatar_user"] = $logged_in_user['avatar_user'];

            header('location: ../../admin/index.php');
        }else{
            $_SESSION['user'] = $username_user;
            $_SESSION["avatar_user"] = $avatar_user;
            $_SESSION["fullname"] = $fullname;
            // $_SESSION['success']  = "Bạn đã đăng nhập";
            
            header("location:../../index.php");
            }

        }else {
            $_SESSION["thongbao"] =  "Bạn đã đăng nhập sai username_user hoặc password. Vui lòng kiểm tra lại!!";
             
            header("location:login.php");

        }
        if (isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['user']);
            header("location: ../index.php");
        }

    }else {
        header("location:login.php");
    }