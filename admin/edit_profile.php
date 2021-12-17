<?php
require_once 'connect.php';
session_start();

if(isset($_POST['save'])){
    $conn = ConnectDB();
    // lấy thông tin từ form
    
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    //lấy tên file ảnh
    $name_img = $_FILES['fileToUpload']['name'];

    //thư mục upload ảnh
    $target_img_dir = "upload/users/";

    $target_img_file = $target_img_dir . basename($_FILES["fileToUpload"]["name"]);




    // Select file type
    $imageFileType = strtolower(pathinfo($target_img_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_img_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_img_arr)){
        // Insert record
        $sql = "UPDATE user SET fullname='$fullname',email_user='$email',`avatar_user`='$name_img' WHERE `username_user` =$username";

        if (mysqli_query($conn, $sql)) {
            $message = "Bạn đã thay đổi thông tin thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("location:.././browse/account.php?username='$username'");
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);

        // Upload file
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_img_dir.$name_img);

    }
    else {
        print_r("file khong dung dịnh dạng");
    }


}









