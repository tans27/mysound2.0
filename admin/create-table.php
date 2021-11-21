<?php

$servername = "localhost";
$username = "root";
$password = "";

// Delete all tables in database
$conn = mysqli_connect($servername, $username, $password);

$sql_drop = "DROP DATABASE if exists mysound";
if (mysqli_query($conn, $sql_drop)) {
    echo "Drop all table success";
} else {
    echo "Error creating table: " . mysqli_error($conn); echo "";
}


// Create database
$sql_createDB = "CREATE DATABASE mysound";
if (mysqli_query($conn, $sql_createDB)) {
//    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

//mysqli_close($connect);
$db = "mysound";
// Create connection
$connect = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}



// sql to create table musics
$sql_music = "CREATE TABLE musics (
    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(30) NOT NULL ,
    `artist` VARCHAR(30) NOT NULL ,
    `file` VARCHAR(100) NOT NULL ,
    `genre_id` INT(6) NOT NULL ,
    `image` VARCHAR(100) NOT NULL ,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)"
    ;

if (mysqli_query($connect, $sql_music)) {
   echo "Table musics created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connect);
}

// create table categories
$sql_genre = "CREATE TABLE genres (
    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `genre_name` VARCHAR(30) NOT NULL,
    `image` varchar(100) NOT NULL, 
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)"
    ;

if (mysqli_query($connect, $sql_genre)) {
    echo "Table categories created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connect);
}

// create table user 
$sql_user = "CREATE TABLE user (
    `id_user` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name_user` VARCHAR(100) NOT NULL ,
    `username_user` VARCHAR(100) NOT NULL ,
    `email_user` VARCHAR(100) NOT NULL ,
    `user_type` VARCHAR(100) NOT NULL ,
    `password_user` VARCHAR(100) NOT NULL ,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)"
    ;
    
    if (mysqli_query($connect, $sql_user)) {
        echo "Table users created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($connect);
    }
    

mysqli_close($connect);