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
                        <a href=""><i class="bi bi-activity"></i><span>Bài hát mới</span></a>
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
                    <!-- <div class="header_main-btn">
                        <span class="btn-sign-up" id="signup-welcome">Đăng Ký</span>
                        <span class="btn-log-in" id="login">Đăng Nhập</span>
                    </div> -->
                    <div class="header_main-acc">
                        <a href="./account.html" ><img src="../assets/images/songs/sol7.jpg" alt="" class="acc_avt"></a>
                        <ul class="acc_menu">
                            <li><a href="./upload.html">Upload</a></li>
                            <li><a href="./account.html">Thay đổi thông tin</a></li>
                        </ul>
                    </div>
                </div>
            </header>

            <div class="main_content">
                <section class="home_page">
                    <div class="container">
                        <div class="home_page-title">
                            <span class="title_heading">Upload nhạc</span>
                        </div>
                        <div class="home_page-content">
                            <div class="content_wrapper">
                                <div class="content_wrapper-item">
                                    <span class="item_title"> Chia sẻ với mọi người về bài nhạc của bạn</span>
                                </div>
                                <div class="content_wrapper-form">
                                    <form action="../admin/create-music.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên bài hát</label>
                                            <input name="music_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên bài hát">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Ca sĩ</label>
                                            <input name="artist" type="text" class="form-control" id="exampleInputPassword1" placeholder="Ca sĩ">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Thể loại</label>
                                            <select name="genre_id" class="form-control" id="exampleFormControlSelect1">
                                            
                                            <?php
                                                $sql = "SELECT * FROM genres";
                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="'.$row["id"].'">'.$row["genre_name"].'</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>                  
                                        <div class="form-group">
                                            <label>Bài hát được upload</label>
                                            <input type="file" name="audioToUpload" id="musicToUpload" class="form-control-file-img" accept=".mp3,.wav,.ogg">
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh bài hát</label>
                                            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file-audio" accept=".jpg,.png,.jpeg">
                                        </div>
                                        <input type='submit' value='submit' name='submit'>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                
            </div>
        </div>
    </div>
    </section>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../js/slick.js"></script>

    <!-- <script src="https://unpkg.com/wavesurfer.js@4.6.0/dist/wavesurfer.js"></script> -->
    <!-- <script src="../js/player.js"></script> -->
    <!-- <script src="../js/modal.js"></script> -->
</body>

</html>