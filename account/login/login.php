<?php
    session_start();
    require_once '../../admin/connect.php';
    $connect = ConnectDB();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="https://logosrated.net/wp-content/uploads/parser/Pet-care-Logo-1.png" type="image/x-icon" />  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets Care-Đăng nhập</title>
    <Link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css"></Link>
    <link rel="stylesheet" href="../../public/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="./login.css">

</head>
<body>
    <header class="header">
        <div class="grid">
            <nav class="header__navbar">
                <ul class="header__navbar-list">
                    <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate ">
                        <span class="header__navbar-title--no-pointer">Chào mừng quý khách đến với Pets Care ^^ </span> 
                    </li>
                    <li class="header__navbar-item">
                        <span class="header__navbar-title--no-pointer">Kết nối</span>
                        <a href="" class="header__navbar-icon-link">
                            <i class="header__navbar-icon fab fa-facebook"></i>
                        </a>
                        <a href="" class="header__navbar-icon-link">
                            <i class="header__navbar-icon fab fa-instagram"></i>
                        </a>
    
                    </li>
                </ul>
    
                <ul class="header__navbar-list">
                    <li class="header__navbar-item header__navbar-item--has-notify">
                        <a href="" class="header__navbar-item-link">
                            Chào bạn đến với trang đăng nhập!
                        </a>
                    </li>
    
                    

                    <!-- <li class="header__navbar-item header__navbar-user">
                        <img src="./public/img/balo.jfif" alt="" class="header__navbar-user-img">
                        <span class="header__navbar-user-name">Nguyen Duc Phung</span>
                    
                        <ul class="header__navbar-user-menu">
                            <li class="header__navbar-user-item">
                                <a href="">Tài khoản của tôi</a>
                            </li>
                            <li class="header__navbar-user-item">
                                <a href="">Địa chỉ của tôi</a>
                            </li>
                            <li class="header__navbar-user-item">
                                <a href="">Đơn mua</a>
                            </li>
                            <li class="header__navbar-user-item header__navbar-user-item--separate">
                                <a href="">Đăng xuất</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </nav>
        </div>
    </header>
    <div class="app">

        <div class="main center">
            <!-- Register Form -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 border">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Đăng Nhập tài khoản của bạn.</h1>

                </div>

                <form action="login_submit.php" method="POST" role="form">
                    <div class="auth-form">
                        <div class="auth-form__container">
                
                            <div class="auth-form__header">
                                <h3 class="auth-form__heading">Đăng nhập</h3>
                                <a href="../register/register.php" class="auth-form__switch-btn js-login-btn">Đăng ký</a>
                            </div>
                
                            <div class="auth-form__form">
                                <div class="auth-form__group">
                                    <input type="text" name="username_user" class="auth-form__input" placeholder="Nhập tên tài khoản của bạn">
                                </div>
                                <div class="auth-form__group">
                                    <input type="password" name="password_user" class="auth-form__input" placeholder="Nhập mật khẩu của bạn">
                                    <div id="eye">
                                        <i class="far fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                
                            <div class="auth-form__aside">
                                <div class="auth-form__help">
                                    <a href="#" class="auth-form__help-link auth-form__help-fogot">Quên mật khẩu</a>
                                    <span class="auth-form__help-separate"></span>
                                    <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                                </div>
                            </div>
                
                            <div class="auth-form__contrls">
                                <a href="../../index.php" class="btn auth-form__contrl-back btn--normal js-modal-close">Trang chủ</a>
                                <input type='submit' value='Đăng nhập' class="btn btn--primary" name='submit'>
                
                            </div>
                        </div>
                        <div class="auth-form__socials">
                            <a href="" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
                                <i class="auth-form__social-icon fab fa-facebook-square"></i>
                                <span class="auth-form__socials-title">Kết nối với Facebook</span>
                            </a>
                            <a href="" class="auth-form__socials--google btn btn--size-s btn--with-icon">
                                <i class="auth-form__social-icon fab fa-google"></i>
                                <span class="auth-form__socials-title">Kết nối với Google</span>
                
                            </a>
                        </div>
                    </div> 
                </form>
            </main>

        </div>

        <footer class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Trung tâm trợ giúp</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Pets Care Mall</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Hướng dẫn mua hàng</a>
                            </li>
                        </ul>
                    </div>

                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Về Pets Care</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Giới thiệu về Pets Care</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Chính hãng</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Điều khoản</a>
                            </li>
                        </ul>
                    </div>

                    <div class="grid__column-2-4">
                        
                    </div>

                    <div class="grid__column-2-4">
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

                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Chăm sóc thú cưng</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Thức ăn cho thú cưng</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Phụ kiện cho thú cưng</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Tư vấn miễn phí</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="footer__bottom">
                <div class="grid__row">
                    <p class="footer__text">© 2021 - Bản quyền thuộc về Đức Phụng</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="login.js"></script>

</body>
</html>