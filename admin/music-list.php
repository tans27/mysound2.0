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
        <h1 class="h2">Danh sách dữ liệu bài hát</h1>
      </div>
        <a href="./create-music-template.php" class="btn btn-danger">Nhập bài hát</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên</th>
              <th>Ca sĩ</th>
              <th>Thể loại</th>
              <th>Audio</th>
              <th>Ảnh bài hát</th>
              <th>Người Upload</th>
            </tr>
          </thead>
          <tbody>
          <?php
          if( isset( $_POST['delete'] ) ) {
              $id = $_POST['id'];
              $query = "DELETE FROM musics WHERE id=".$id;
              $conn->query($query);
          }
          $sql = "SELECT * FROM musics";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>".$row['id']."</td>
                          <td>".$row['name']."</td>
                          <td>".$row['artist']."</td>
                          <td>".$row['genre_id']."</td>
                          <td>".$row['file']."</td>
                          <td>".$row['image']."</td>
                          <td>".$row['uploaded_by']."</td>
                          <td> <form method='POST'>
                                <input type=hidden name=id value=".$row["id"]." >
                                <input type=submit value=Delete name=delete >
                                </form>
                        </tr>";
              }
          } else {
              echo "0 results";
          }
          ?>

          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php
include 'layout/footer.php';
