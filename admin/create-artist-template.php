<?php
require_once 'connect.php';
include 'layout/header.php';
$conn = ConnectDB();
session_start();
if(empty($_SESSION['user']))
{
    header('Location: ../account/login/login.php');
    exit;
}

?>
<div class="container-fluid">
    <div class="row">
        <?php
      include 'layout/menu.php';
      ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Thể loại</h1>

            </div>
            <div class="table-responsive">
                <h1>Admin</h1>
            </div>

            <form action="create-artist.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nhập Tên Ca sĩ</label>
                    <input name="artist" type="text" class="form-control" placeholder="Nhập tên ca sĩ">
                </div>

                <div class="form-group">
                    <label>Ảnh thể loại</label>
                    <input type="file" name="fileToUpload"  id="fileToUpload"  class="form-control-file" accept=".jpg,.png,.jpeg">
                </div>

                <input type='submit' value='submit' name='submit'>
            </form>
        </main>
    </div>
</div>

<?php
include 'layout/footer.php';