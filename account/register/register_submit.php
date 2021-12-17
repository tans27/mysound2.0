<?php
    session_status();
    require_once '../../admin/connect.php';
    
    
    
    if(isset($_POST['submit']) && $_POST['username_user'] != '' && $_POST['password_user'] != '' && $_POST['repassword'] != '' ) {
        $conn = ConnectDB();
        //Thuc hien xu ly khi nguoi dung an nut submit va day du thong tin
        $username_user = $_POST["username_user"];
        $email_user = $_POST["email_user"];
        $avatar_user = $_FILES['fileToUpload']['name'];
        $user_type = "1";

        //thư mục upload ảnh

        $target_img_dir = "../../admin/upload/users/";

        $target_img_file = $target_img_dir . basename($_FILES["fileToUpload"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_img_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");


        $fullname = $_POST["fullname"];
        $password_user = $_POST["password_user"];
        // $fullname = 'Chua co gi';
        $repassword = $_POST["repassword"];

        if($password_user != $repassword){
            $_SESSION["thongbao"] = "Passowrd nhập lại không chính xác!";
            header("location:register.php");
            die();
        }
        $sql = "SELECT * FROM user WHERE username_user='$username_user' ";
        $result = $conn->query($sql);
        $password_user = md5($password_user);
        if( mysqli_num_rows($result) > 0){
            $_SESSION["thongbao"] = "Username đã tồn tại!";
            header("location:register.php");
            die();
        }

        if( in_array($imageFileType,$extensions_arr) ){
        $sql = "INSERT INTO user (fullname, username_user, email_user, password_user, avatar_user, user_type) VALUES 
        ('$fullname','$username_user','$email_user', '$password_user', '$avatar_user', '$user_type')";
        mysqli_query($conn,$sql);
        $_SESSION["thongbao"] = "Đã đăng ký thành công. CHuyển đến trang đăng nhập.";
        header("location:../login/login.php");
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_img_dir.$avatar_user);

    }else {
        header("location:register.php");
    }