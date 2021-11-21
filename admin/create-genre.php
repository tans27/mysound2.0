<?php
require_once 'connect.php';

if(isset($_POST['submit'])){
    $conn = ConnectDB();
    // lấy thông tin từ form
    $genre_name = $_POST['genre'];
    $genre_img = $_FILES['fileToUpload']['name'];

    if (empty($genre_name)) {
		array_push($errors, "Tên thể loại là bắt buộc");
	}
	if (empty($genre_img)) {
		array_push($errors, "Hình ảnh là bắt buộc");
	}

    //thư mục upload ảnh
    $target_dir = "upload/genre/";

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    if( in_array($audioFileType,$extensions_audio_arr) ){
        // Insert record
        $sql = "INSERT INTO genres (genre_name, image) VALUES ('$genre_name', '$genre_img')";

        if (mysqli_query($conn, $sql)) {
            $message = "Bạn đã tạo thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: http://localhost/mysound2.0/admin/genre-list.php');
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }
    else {
        print_r("file khong dung dịnh dạng");
    }
}









