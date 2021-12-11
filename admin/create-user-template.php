<?php
require_once 'connect.php';
include 'layout/header.php';
$conn = ConnectDB();
?>
<div class="container-fluid">
    <div class="row">
        <?php
      include 'layout/menu.php';
      ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Quản trị người dùng</h1>

            </div>
            <div class="table-responsive">
                <h1>Quản lý tài khoản người dùng</h1>
            </div>

            <form action="create-user.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên người dùng</label>
                    <input name="name_user" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="Nhập tên người dùng">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input name="username_user" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="usernameHelp" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email_user" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập Email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Loại tài khoản</label>
                    <select name="user_type" class="form-control" id="exampleFormControlSelect1">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password_user" class="form-control" id="exampleInputPassword1" aria-desribedby="passwordHelp" placeholder="Nhập mật khẩu"></input>
                </div>


                
                <input type='submit' value='submit' name='submit'>
            </form>
        </main>
    </div>
</div>

<?php
include 'layout/footer.php';