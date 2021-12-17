<?php
require_once '../../admin/connect.php';
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Sound - Đăng ký</title>

    <link rel="icon" href="../assets/images/logo-thumb.png" />

    <link rel="stylesheet" href="../../css/app.css" />
    <link rel="stylesheet" href="../login/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700;900&display=swap" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" />

    </style>
</head>

<body>
    <div class="layout">
        <div class="layout_sidebar">
            <div class="layout_sidebar-logo">
                <a href="../../index.php"><img src="../../assets/images/logo.png" alt="" class="logo" /></a>
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
                    </div>
                    <div class="header_main-acc">
                        <a href="./account.html" ><img src="../assets/images/songs/sol7.jpg" alt="" class="acc_avt"></a>
                        <ul class="acc_menu">
                            <li><a href="./upload.html">Upload</a></li>
                            <li><a href="./account.html">Thay đổi thông tin</a></li>
                        </ul>
                    </div> -->
                    <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']){
        
                            echo '
                            <div class="header_main-acc">
                            <a href="./browse/account.php" class="acc-info">
                                <img src="../assets/images/default-avatar.jpg" alt="" class="acc_avt">
                                <span class="header__navbar-user-name">' . $_SESSION['user'] . '</span>
                            </a>
                    
                                    <ul class="acc_menu">
                                        <li class="header__navbar-user-item">
                                            <a href="../browse/account.html">Tài khoản của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="../browse/upload.php">Upload nhac</a>
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
                                <a href="../register/register.php" class="btn-sign-up" id="signup-welcome">Đăng Ký</a>
                                <a href="../login/login.php" class="btn-log-in" id="login">Đăng Nhập</a>
                            </div>
                            ';
                        }
                    ?>
                </div>
            </header>

    <div class="main_content">
                <section class="home_page">
                    <div class="container">
                        <div class="home_page-title">
                            <span class="title_heading">Đăng ký tài khoản MySound</span>
                        </div>
                        <div class="home_page-content">
                            <div class="content_wrapper">
                                <div class="content_wrapper-item">
                                    <i class="item_title" style="font-weight:300"> Tham gia và chia sẻ âm nhạc của bạn tới mọi người </i>

                </div>
                <?php
                    if(isset($_SESSION["thongbao"])) {
                        echo $_SESSION["thongbao"];
                        session_unset("thongbao");
                    }
                ?>
                <form action="register_submit.php" method="POST" enctype="multipart/form-data">
                    <div class="auth-form">
                        <div class="auth-form__container">

                            <div class="auth-form__header">
                                <h3 class="auth-form__heading">Đăng ký</h3>
                                <a href="../login/login.php" class="auth-form__switch-btn js-login-btn">Đăng nhập</a>
                            </div>

                            <div class="auth-form__form">
                                <div class="auth-form__group">
                                    <input type="text" name="fullname" class="auth-form__input" require placeholder="Họ và tên">
                                </div>
                                <div class="auth-form__group">
                                    <input type="email" name="email_user" class="auth-form__input" require placeholder="Email">
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" name="username_user" class="auth-form__input" require placeholder="Tên đăng nhập">
                                </div>
                                <div class="auth-form__group facb mb-2">
                                    <div>
                                        <p>Chọn ảnh đại diện</p>
                                        <input type="file" name="fileToUpload" id="fileToUpload" class="auth-form__input margin_none" onchange="loadFile(event)" accept="image/x-png,image/gif,image/jpeg">
                                    </div>
                                    <div style="max-width: 100px; max-height:100px"><img class="auth-form_img" id="output"/> </div> 
                                </div>
                                <div class="auth-form__group">
                                    <input type="password" name="password_user" class="auth-form__input" require placeholder="Mật khẩu">
                                </div>
                                <div class="auth-form__group">
                                    <input type="password" name="repassword" class="auth-form__input" require placeholder="Nhập lại mật khẩu">
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
                                <a href="../../index.php" class="btn auth-form__contrl-back btn--normal js-modal-close">Trang chủ</a>
                                <input type='submit' value='Đăng ký' class="btn btn--primary btn-border" name='submit'>


                            </div>
                        </div>
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
                </form>
            </main>

        </div>

        <footer class="footer">
                    <div class="grid">
                        <div class="grid__row">
                            <div class="grid__column-3">
                                <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                                <ul class="footer-list">
                                    <li class="footer-item">
                                        <a href="" class="footer-item__link">Trung tâm trợ giúp</a>
                                    </li>
                                    <li class="footer-item">
                                        <a href="" class="footer-item__link">MySound Library</a>
                                    </li>
                                    <li class="footer-item">
                                        <a href="" class="footer-item__link">Hướng dẫn mua hàng</a>
                                    </li>
                                </ul>
                            </div>
        
                            <div class="grid__column-3">
                                <h3 class="footer__heading"> Về MySound </h3>
                                <ul class="footer-list">
                                    <li class="footer-item">
                                        <a href="" class="footer-item__link">Giới thiệu về MySound</a>
                                    </li>
                                    <li class="footer-item">
                                        <a href="" class="footer-item__link">Chính hãng</a>
                                    </li>
                                    <li class="footer-item">
                                        <a href="" class="footer-item__link">Điều khoản</a>
                                    </li>
                                </ul>
                            </div>
        
                            <div class="grid__column-3">
                                <h3 class="footer__heading">Theo dõi chúng tôi trên</h3>
                                <ul class="footer-list">
                                    <li class="footer-item">
                                        <a href="" class="footer-item__link">
                                            <i class="footer-item__icon fab fa-facebook"></i>
                                            Facebook
                                        </a>
                                    </li>
                                    <li class="footer-item">
                                        <a href="" class="footer-item__link">
                                            <i class="footer-item__icon fab fa-instagram-square"></i>
                                            Instagram
                                        </a>
                                    </li>
                                    <li class="footer-item">
                                        <a href="" class="footer-item__link">
                                            <i class="footer-item__icon fab fa-linkedin"></i>
                                            LinkedIn
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
        
                    </div>
                    <div class="footer__bottom">
                        <div class="grid__row">
                            <p class="footer__text">© Bản quyền thuộc về MySound</p>
                        </div>
                    </div>
                </footer>
    </div>

    <script>
        var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
</body>
</html>