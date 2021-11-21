<?php
require_once 'connect.php';

if(isset($_POST['submit'])){
    $conn = ConnectDB();
    // lấy thông tin từ form
    $name_us = $_POST['name_user'];
    $username_us = $_POST['username_user'];
    $email_us = $_POST['email_user'];
    $type_us = $_POST['user_type'];
    $password_us = md5($_POST['password_user']);

        // Insert record
        $sql = "INSERT INTO user (name_user, username_user, email_user, user_type, password_user) VALUES ('$name_us','$username_us','$email_us', '$type_us', '$password_us')";

        if (mysqli_query($conn, $sql)) {
            header('Location: user-list.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
}









