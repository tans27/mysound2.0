<?php
require_once 'connect.php';

if(isset($_POST['submit'])){
    $conn = ConnectDB();
    // lấy thông tin từ form
    $username_user = $_POST['username_user'];
    $password_user = md5($_POST['password_user']);
    $fullname = $_POST['fullname'];
    $email_user = $_POST['email_user'];
    $user_type = $_POST['user_type'];

        // Insert record
        $sql = "INSERT INTO user (fullname, username_user, email_user, user_type, password_user) VALUES ('$fullname','$username_user','$email_user', '$user_type', '$password_user')";

        if (mysqli_query($conn, $sql)) {
            header('Location: user-list.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
}









