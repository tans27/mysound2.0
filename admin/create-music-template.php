<?php
require_once 'connect.php';
include 'layout/header.php';
session_start();
if(empty($_SESSION['user']))
{
    header('Location: ../account/login/login.php');
    exit;
}

$connect = ConnectDB();
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

            <form action="create-music.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên bài hát</label>
                <input name="music_name" type="text" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Nhập tên bài hát">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ca sĩ</label>
                <input name="artist" type="text" class="form-control"
                    id="exampleInputPassword1" placeholder="Ca sĩ">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Thể loại</label>
                <select name="genre_id" class="form-control" id="exampleFormControlSelect1">

                    <?php
                    $sql = "select * from genres";
                    $result = $connect->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo
                                '<option value="' . $row['id'] . '"> '. $row['genre_name'] .'</option>';
                            
                            }
                    }?>
                </select>
            </div>
            <div class="form-group">
                <label>Bài hát được upload</label>
                <input type="file" name="audioToUpload" id="musicToUpload"
                    class="form-control-file-img" accept=".mp3,.wav,.ogg">
            </div>
            <div class="form-group">
                <label>Ảnh bài hát</label>
                <input type="file" name="fileToUpload" id="fileToUpload"
                    class="form-control-file-audio" accept=".jpg,.png,.jpeg">
            </div>
            <input type='submit' value='submit' name='submit'>
            </form>
        </main>
    </div>
</div>

<?php
include 'layout/footer.php';