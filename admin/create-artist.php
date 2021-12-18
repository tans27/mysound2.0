<?php
require_once 'connect.php';

if(isset($_POST['submit'])){
    $conn = ConnectDB();
    // lấy thông tin từ form
    $artist_name = $_POST['artist'];
    $artist_img = $_FILES['fileToUpload']['name'];

    if (empty($artist_name)) {
		array_push($errors, "Tên thể loại là bắt buộc");
	}
	if (empty($artist_img)) {
		array_push($errors, "Hình ảnh là bắt buộc");
	}

    //thư mục upload ảnh

    $target_img_dir = "upload/artist/";

    $target_img_file = $target_img_dir . basename($_FILES["fileToUpload"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_img_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    if( in_array($imageFileType,$extensions_arr) ){
        // Insert record
        $sql = "INSERT INTO artist (artist_name, image) VALUES ('$artist_name', '$artist_img')";

        if (mysqli_query($conn, $sql)) {
            echo 'Tạo mới thành công';
            header('Location: http://localhost/mysound2.0/admin/index.php');
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);

        move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_img_dir.$artist_img);

    }
    else {
        print_r("file khong dung dịnh dạng");
    }
}









