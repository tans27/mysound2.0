<?php 

    if (isset($_SESSION['user']) && $_SESSION['user']){
        
        echo '
            <li class="header__navbar-item header__navbar-user">
                <img src="./public/img/balo.jfif" alt="" class="header__navbar-user-img">
                <span class="header__navbar-user-name">'.$_SESSION['user'].'</span>

                <ul class="header__navbar-user-menu">
                    <li class="header__navbar-user-item">
                        <a href="./browse/account.html">Tài khoản của tôi</a>
                    </li>
                    <li class="header__navbar-user-item">
                        <a href="./browse/upload.html">Upload nhac</a>
                    </li>
                    <li class="header__navbar-user-item header__navbar-user-item--separate">
                        <a href="./account/login/logout.php">Đăng xuất</a>
                    </li>
                </ul>
            </li>
        ';
    }else{
        echo '
        <div class="header_main-btn">
            <a href="./account/register/register.php" class="btn-sign-up" id="signup-welcome">Đăng Ký</a>
            <a href="./account/login/login.php" class="btn-log-in" id="login">Đăng Nhập</a>
        </div>
        ';
    }
?>
