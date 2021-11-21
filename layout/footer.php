
<!--Modal layout -->
<!-- Register Form -->
<div class="modal modal-register js-modal-register">
    <div class="modal__overlay js-modal-close">
    </div>
    <div class="modal__body">
        <form method="post" action="index.php" class="auth-form">
            <div class="auth-form__container">

                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng ký</h3>
                    <span class="auth-form__switch-btn btn-log-in">Đăng nhập</span>
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input type="text" class="auth-form__input" placeholder="Họ và tên" name="name">
                    </div>
                    <div class="auth-form__group">
                        <input type="text" class="auth-form__input" placeholder="Email của bạn" name="email">
                    </div>
                    <div class="auth-form__group">
                        <input type="text" class="auth-form__input" placeholder="Tên người dùng" name="username">
                    </div>
                    <div class="auth-form__group">
                        <input type="password" class="auth-form__input" placeholder="Nhập mật khẩu của bạn" name="password_1">
                    </div>
                    <div class="auth-form__group">
                        <input type="password" class="auth-form__input" placeholder="Nhập lại mật khẩu của bạn" name="password_2">
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
                    <button type="submit" class="btn btn--primary" name="register_btn">ĐĂNG KÝ</button>

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
        </form>
    </div>
</div>

<!-- login Form -->
<div class="modal modal-login js-modal-login">
    <div class="modal__overlay js-modal-close">
    </div>
    <div class="modal__body">
        <form method="post" class="auth-form">
            <div class="auth-form__container">

                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng nhập</h3>
                    <span class="auth-form__switch-btn btn-sign-up">Đăng ký</span>
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input type="text" class="auth-form__input" placeholder="Tên đăng nhập" name="username">
                    </div>
                    <div class="auth-form__group">
                        <input type="password" class="auth-form__input" placeholder="Nhập mật khẩu của bạn" name="password">
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
                    <button type="submit" class="btn btn--primary" name="login_btn">ĐĂNG NHẬP</button>

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
        </form>
    </div>
</div>


<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="./js/slick.js"></script>


<script src="https://unpkg.com/wavesurfer.js@4.6.0/dist/wavesurfer.js"></script>
<!-- <script src="/js/player.js"></script> -->

<script src="./js/modal.js"></script>
</body>

</html>