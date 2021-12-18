<?php
require_once '../admin/connect.php';
session_start();
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
                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                }
                                else{
                                    $id = "";
                                }

                                $sql = "select * from genres where id='$id'";
                                $result = $connect->query($sql);
                    
                                if ($result->num_rows > 0) {
                                    while($genre = $result->fetch_assoc()) {
                                    echo'
                        <div class="home_page-title">
                            <span class="title_heading">'.$genre['genre_name'].'</span>
                            <span class="title_sub-heading">Nắm bắt âm nhạc xu hướng hiện tại.</span>
                        </div>';}}?>
                        <div class="home_page-content">
                            <div class="content_wrapper">
                            
                                <div class="content_wrapper-item">
                                    <span class="item_title"> Khám phá </span>
                                </div>
                                <div class="content_wrapper-tracks">
                                    <div class="track">

                                        <?php 
                                            $sql = "SELECT * from musics where genre_id='$id'";
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
                                                                <p>'.$row["name"].'</p>
                                                            </div>
                                                            <div class="music_artist">
                                                                <a href="./artist.php?artist='.$row['artist'].'">'.$row["artist"].'</a>
                                                            </div>
                                                            <div class="music_artist">
                                                                <a href="./user.php?user='.$row['uploaded_by'].'" style="color:#ccc"><i>Uploaded by: @'.$row["uploaded_by"].'</i></a>
                                                            </div>
                                                        </div>
                                                        <audio controls src="../admin/upload/music/audio/'.$row['file'].'"></audio>
                                                        <a href="../admin/upload/music/audio/'.$row['file'].'" download="'.$row["name"].'.mp3">Download</a>
                                                    </div>
                                                </div>
                                            ';}
                                            }
                                        ?>
                                        <!-- <div class="track_items">
                                            <div class="track_items-info">
                                                <div class="track_items-avatar">
                                                    <img src="../assets/images/songs/sol7.jpg" alt=""
                                                        class="music_img" />
                                                </div>
                                                <div class="track_desc">
                                                    <div class="music_name">
                                                        <p>Back to da Hometown</p>
                                                    </div>
                                                    <div class="music_artist">
                                                        <p>Sol7</p>
                                                    </div>
                                                </div>
                                                <audio controls src="../assets/audio/backtohometown.mp3"></audio>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- <section class="audio-player-music">
        <div class="audio-player">
            <div class="audio-player-cover">
                <img src="../assets/images/songs/iceman.jpg" alt="" />
            </div>
            <div class="audio-player-control">
                <button id="prevButton" class="prev-button">
                    <img id="prevButtonIcon" class="prev-button-icon" src="../assets/icons/prev.svg"
                        alt="Prev Button" />
                </button>
                <button id="playButton" class="play-button">
                    <img id="playButtonIcon" class="play-button-icon" src="../assets/icons/play.svg"
                        alt="Play Button" />
                </button>
                <button id="nextButton" class="next-button">
                    <img id="nextButtonIcon" class="next-button-icon" src="../assets/icons/next.svg"
                        alt="Next Button" />
                </button>
            </div>
            <div class="player-body">
                <p id="song-title">Artist - Track Title</p>
                <div id="waveform" class="waveform"></div>
                <div class="controls">
                    <div class="volume">
                        <img id="volumeIcon" class="volume-icon" src="../assets/icons/volume-up.svg" alt="Volume" />
                        <input id="volumeSlider" class="volume-slider" type="range" name="volume-slider" min="0"
                            max="100" value="50" />
                        <button id="likeButton" class="like-button">
                            <img id="likeButtonIcon" class="like-button-icon" src="../assets/icons/unheart.svg"
                                alt="Like Button" />
                        </button>
                    </div>
                    <div class="timecode">
                        <span id="currentTime">00:00:00</span>
                        <span>/</span>
                        <span id="totalDuration">00:00:00</span>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../js/slick.js"></script>

    <script src="https://unpkg.com/wavesurfer.js@4.6.0/dist/wavesurfer.js"></script>
    <!-- <script src="../js/player.js"></script> -->
</body>

</html>
