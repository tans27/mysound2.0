<?php
require_once 'connect.php';
session_start();

if(isset($_POST['submit'])){
    $conn = ConnectDB();
    // lấy thông tin từ form
    
    $name_audio = $_POST['music_name'];
    $artist = $_POST['artist'];
    $genre_id = $_POST['genre_id'];
    $uploaded_by = $_SESSION['user'];

    //lấy tên file ảnh
    $name_img = $_FILES['fileToUpload']['name'];

    //thư mục upload ảnh
    $target_img_dir = "upload/music/img/";

    $target_img_file = $target_img_dir . basename($_FILES["fileToUpload"]["name"]);


    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    //lấy tên file nhạc
    $audio_img = $_FILES['audioToUpload']['name'];

    //thư mục upload nhạc
    $target_audio_dir = "upload/music/audio/";

    $target_audio_file = $target_audio_dir . basename($_FILES["audioToUpload"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_img_file,PATHINFO_EXTENSION));
    $audioFileType = strtolower(pathinfo($target_audio_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_img_arr = array("jpg","jpeg","png","gif");
    $extensions_audio_arr = array("mp3","wav","ogg");
    // Check extension
    if( in_array($imageFileType,$extensions_img_arr) && in_array($audioFileType,$extensions_audio_arr) ){
        // Insert record
        $sql = "INSERT INTO musics (name, artist, genre_id, file, image,uploaded_by) VALUES ('$name_audio','$artist', '$genre_id', '$audio_img','$name_img','$uploaded_by')";

        if (mysqli_query($conn, $sql)) {
            $message = "Bạn đã upload thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("location:.././index.php");
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);

        // Upload file
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_img_dir.$name_img);
        move_uploaded_file($_FILES['audioToUpload']['tmp_name'],$target_audio_dir.$audio_img);

    }
    else {
        print_r("file khong dung dịnh dạng");
    }


}









