<?php
require_once '../admin/connect.php';
session_start();
if(empty($_SESSION['user']))
{
    header('Location: ../account/login/login.php');
    exit;
}
$connect = ConnectDB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Sound - Thưởng thức âm nhạc miễn phí</title>

    <link rel="icon" href="../assets/images/logo-thumb.png" />

    <link rel="stylesheet" href="../css/app.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700;900&display=swap" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" />


</head>

<body>
    <div class="layout">
        <div class="layout_sidebar">
            <div class="layout_sidebar-logo">
                <a href="../index.php"><img src="../assets/images/logo.png" alt="" class="logo" /></a>
            </div>
            <div class="layout_sidebar-menu">
                <ul>
                    <li class="menu_item active">
                        <a href="../index.php"><i class="bi bi-music-note-beamed"></i><span>Khám Phá</span></a>
                    </li>
                    <li class="menu_item">
                        <span><i class="bi bi-music-player-fill"></i><span>Podcast
                            </span><small>(commingsoon)</small></span>
                    </li>
                    <li class="menu_item">
                        <a href="./newest.php"><i class="bi bi-activity"></i><span>Bài hát mới</span></a>
                    </li>
                    <li>
                        <hr />
                    </li>
                    <li class="menu_item">
                        <a href=""><i class="bi bi-heart-fill"></i><span>Ưa thích</span></a>
                    </li>
                    <li class="menu_item">
                        <a href=""><i class="bi bi-music-note-list"></i><span>Playlist</span></a>
                    </li>
                    <li>
                        <hr />
                    </li>
                    <li class="menu_item">
                        <a href=""><i class="bi bi-info-circle-fill"></i><span>Giới thiệu</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="layout_content">
            <header class="header">
                <div class="header_main">
                    <div class="header_main-search">
                        <form action="./search.php" class="search" method="get">
                            <input class="search_button bd-none" type="submit" name="ok" value="search"
                                style="visibility: hidden;">
                            <button class="search_button">
                                <i class="bi bi-search"></i>
                            </button>
                            </input>
                            <input type="text" name="search" class="search_input"
                                placeholder="Tìm kiếm bài hát, nghệ sĩ, thể loại" />
                        </form>
                    </div>
                    <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']){
        
                            echo '
                            <div class="header_main-acc">
                            <a href="./browse/account.php" class="acc-info">';
                            if (isset($_SESSION['avatar_user']) && $_SESSION['avatar_user']){
                                echo'
                                <img src="../admin/upload/users/'.$_SESSION['avatar_user'].'" alt="" class="acc_avt">';
                            }
                            else{
                                echo'
                                <img src="../assets/images/default-avatar.jpg" alt="" class="acc_avt">';
                            };
                            echo'
                                <span class="header__navbar-user-name">' . $_SESSION['user'] . '</span>
                            </a>
                    
                                    <ul class="acc_menu">
                                        <li class="header__navbar-user-item">
                                            <a href="./account.php?username='.$_SESSION['user'].'">Tài khoản của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="./upload.php">Upload nhạc</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="./manager.php?username='.$_SESSION['user'].'">Quản lý nhạc đã upload</a>
                                        </li>
                                        <li class="header__navbar-user-item header__navbar-user-item--separate">
                                            <a href="../account/login/logout.php">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                            ';
                        }else{
                            echo '
                            <div class="header_main-btn header_main">
                                <a href="../account/register/register.php" class="btn-sign-up" id="signup-welcome">Đăng Ký</a>
                                <a href="../account/login/login.php" class="btn-log-in" id="login">Đăng Nhập</a>
                            </div>
                            ';
                        }
                    ?>
                </div>
            </header>

            <div class="main_content">
                <section class="home_page">
                    <div class="container">
                    <?php 
                        if(isset($_GET['username'])){
                            $username = $_GET['username'];
                        }
                        else{
                            $username = "";
                        }

                        $sql = "select * from musics where artist='$username'";
                        $result = $connect->query($sql);
            
                        if ($result->num_rows > 0) {
                            $account = $result->fetch_assoc();
                            echo'
                            <div class="home_page-title">
                                <span class="title_heading">Danh sách nhạc đã upload của '.$account[fullname].'</span>
                                <span class="title_sub-heading">Bạn muốn thay đổi điều gì à?</span>
                            </div>';
                        }
                    ?>
                        <div class="home_page-content">
                            <div class="content_wrapper">
                            
                                <div class="content_wrapper-item">
                                    <span class="item_title"> Uploaded songs </span>
                                </div>
                                <div class="content_wrapper-tracks">
                                    <div class="track">

                                        <?php 
                                            if( isset( $_POST['delete'] ) ) {
                                                $id = $_POST['id'];
                                                $query = "DELETE FROM musics WHERE id=".$id;
                                                $connect->query($query);
                                            }

                                            $sql = "SELECT * from musics where uploaded_by='$username'";
                                            $result = $connect->query($sql);
                                
                                            if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo '
                                                <div class="track_items">
                                                    <div class="track_items-info">
                                                        <div class="track_items-avatar">
                                                            <img src="../admin/upload/music/img/'.$row['image'].'" alt="" class="music_img" />
                                                        </div>
                                                        <div class="track_desc">
                                                            <div class="music_name">
                                                                <a href="./artist.php?artist='.$row['artist'].'">'.$row["artist"].'</a>
                                                            </div>
                                                            <div class="music_artist">
                                                                <p>'.$row["name"].'</p>
                                                            </div>
                                                        </div>
                                                        <audio controls src="../admin/upload/music/audio/'.$row['file'].'"></audio>
                                                        <form method="post">
                                                            <input type=hidden name=id value="'.$row["id"].'">
                                                            <a href="./edit.php?id='.$row["id"].'" name=edit class="btn btn-border">Chỉnh sửa</a>
                                                            <input type=submit value=Xóa name=Delete></input>
                                                        </form>
                                                    </div>
                                                </div>
                                            ';}
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../js/slick.js"></script>

    <script src="https://unpkg.com/wavesurfer.js@4.6.0/dist/wavesurfer.js"></script>
    <!-- <script src="../js/player.js"></script> -->
</body>

</html>
