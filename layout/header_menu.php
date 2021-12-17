
<?php
if (isset($_SESSION['user'] ) && $_SESSION['user'] ) {

    echo '
            <div class="header_main-acc">
            <a href="./browse/account.php?username='.$_SESSION['user'].'" class="acc-info">';
            if (isset($_SESSION['avatar_user']) && $_SESSION['avatar_user']){
                echo'
                <img src="./admin/upload/users/'.$_SESSION['avatar_user'].'" alt="" class="acc_avt">';
            }
            else{
                echo'
                <img src="./assets/images/default-avatar.jpg" alt="" class="acc_avt">';
            };
            echo'
                <span class="header__navbar-user-name">' . $_SESSION['fullname'] . '</span>
            </a>

                <ul class="acc_menu">
                    <li class="header__navbar-user-item">
                        <a href="./browse/account.php?username='.$_SESSION['user'].'">Tài khoản của tôi</a>
                    </li>
                    <li class="header__navbar-user-item">
                        <a href="./browse/upload.php">Upload nhạc</a>
                    </li>
                    <li class="header__navbar-user-item">
                        <a href="./browse/manager.php?username='.$_SESSION['user'].'">Quản lý nhạc đã upload</a>
                    </li>
                    <li class="header__navbar-user-item header__navbar-user-item--separate">
                        <a href="./account/login/logout.php">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        ';
} else {
    echo '
        <div class="header_main-btn header_main">
            <a href="./account/register/register.php" class="btn-sign-up" id="signup-welcome">Đăng Ký</a>
            <a href="./account/login/login.php" class="btn-log-in" id="login">Đăng Nhập</a>
        </div>
        ';
}
?>
