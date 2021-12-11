<?php
require_once '../admin/connect.php';
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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;700;900&display=swap" rel="stylesheet" />

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
                        <a href="#"><i class="bi bi-music-note-beamed"></i><span>Khám Phá</span></a>
                    </li>
                    <li class="menu_item">
                        <span><i class="bi bi-music-player-fill"></i><span>Podcast
                            </span><small>(commingsoon)</small></span>
                    </li>
                    <li class="menu_item">
                        <a href=""><i class="bi bi-activity"></i><span>Trending</span></a>
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
                        <form action="." class="search">
                            <button class="search_button">
                                <i class="bi bi-search"></i>
                            </button>
                            <input type="text" class="search_input" placeholder="Tìm kiếm bài hát, nghệ sĩ, thể loại" />
                        </form>
                    </div>
                    <div class="header_main-btn">
                        <span class="btn-sign-up" id="signup-welcome">Đăng Ký</span>
                        <span class="btn-log-in" id="login">Đăng Nhập</span>
                    </div>
                </div>
            </header>

            <div class="main_content">
                <section class="home_page">
                    <div class="container">
                        <div class="home_page-title">
                            <span class="title_heading">Nhạc Pop</span>
                            <span class="title_sub-heading">Nắm bắt âm nhạc xu hướng hiện tại.</span>
                        </div>
                        <div class="home_page-content">
                            <div class="content_wrapper">
                                <div class="content_wrapper-item">
                                    <span class="item_title"> Khám phá </span>
                                </div>
                                <div class="content_wrapper-tracks">
                                    <div class="track">
                                        <?php 
                                            $sql = "select * from musics";
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
                                                                <p>'.$row["artist"].'</p>
                                                            </div>
                                                            <div class="music_artist">
                                                                <p>'.$row["name"].'</p>
                                                            </div>
                                                        </div>
                                                        <audio controls src="../admin/upload/music/audio/'.$row['file'].'"></audio>
                                                    </div>
                                                </div>
                                            ';}
                                            }
                                        ?>
                                        <div class="track_items">
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
                                            </div>
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
    <!--Modal layout -->
    <!-- Register Form -->
    <section>
        <div class="modal modal-register js-modal-register">
            <div class="modal__overlay js-modal-close">
            </div>
            <div class="modal__body">
                <div class="auth-form">
                    <div class="auth-form__container">
    
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng ký</h3>
                            <span class="auth-form__switch-btn btn-log-in">Đăng nhập</span>
                        </div>
    
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" placeholder="Họ và tên">
                            </div>
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" placeholder="Email của bạn">
                            </div>
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" placeholder="Tên người dùng">
                            </div>
                            <div class="auth-form__group">
                                <input type="password" class="auth-form__input" placeholder="Nhập mật khẩu của bạn">
                            </div>
                            <div class="auth-form__group">
                                <input type="password" class="auth-form__input" placeholder="Nhập lại mật khẩu của bạn">
                            </div>
                        </div>
    
                        <div class="auth-form__aside">
                            <p class="auth-form__policy-text">
                                Bằng việc đăng ký, bạn đã đồng ý với MySound về
                                <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                                <a href="" class="auth-form__text-link">Chính sách bảo mật.</a>
                            </p>
                        </div>
    
                        <div class="auth-form__contrls">
                            <button class="btn auth-form__contrl-back btn--normal js-modal-close">TRỞ LẠI</button>
                            <button class="btn btn--primary">ĐĂNG KÝ</button>
    
                        </div>
                    </div>
                    <div class="socials-text"><i>Hoặc đăng nhập bằng</i></div>
                    <div class="auth-form__socials">
                        <a href="" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
                            <i class="auth-form__social-icon fab fa-facebook-square"></i>
                            <span class="auth-form__socials-title">Facebook</span>
                        </a>
                        <a href="" class="auth-form__socials--google btn btn--size-s btn--with-icon">
                            <i class="auth-form__social-icon fab fa-google"></i>
                            <span class="auth-form__socials-title">Google</span>
    
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- login Form -->
        <div class="modal modal-login js-modal-login">
            <div class="modal__overlay js-modal-close">
            </div>
            <div class="modal__body">
                <div class="auth-form">
                    <div class="auth-form__container">
    
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng nhập</h3>
                            <span class="auth-form__switch-btn btn-sign-up">Đăng ký</span>
                        </div>
    
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" placeholder="Email của bạn">
                            </div>
                            <div class="auth-form__group">
                                <input type="password" class="auth-form__input" placeholder="Nhập mật khẩu của bạn">
                                <div id="eye">
                                    <i class="far fa-eye"></i>
                                </div>
                            </div>
                        </div>
    
                        <div class="auth-form__aside">
                            <div class="auth-form__help">
                                <a href="" class="auth-form__help-fogot auth-form__help-link">Quên mật khẩu</a>
                                <span class="auth-form__help-separate"></span>
                                <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                            </div>
                        </div>
    
                        <div class="auth-form__contrls">
                            <button class="btn auth-form__contrl-back btn--normal js-modal-close">TRỞ LẠI</button>
                            <button class="btn btn--primary">ĐĂNG NHẬP</button>
    
                        </div>
                    </div>
                    <div class="socials-text"><i>Hoặc đăng nhập bằng</i></div>
                    <div class="auth-form__socials">
                        <a href="" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
                            <i class="auth-form__social-icon fab fa-facebook-square"></i>
                            <span class="auth-form__socials-title">Facebook</span>
                        </a>
                        <a href="" class="auth-form__socials--google btn btn--size-s btn--with-icon">
                            <i class="auth-form__social-icon fab fa-google"></i>
                            <span class="auth-form__socials-title">Google</span>
    
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../js/slick.js"></script>

    <script src="https://unpkg.com/wavesurfer.js@4.6.0/dist/wavesurfer.js"></script>
    <!-- <script src="../js/player.js"></script> -->
    <script src="../js/modal.js"></script>
</body>

</html>

?>