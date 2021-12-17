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
        <h1 class="h2">Product</h1>
      </div>
        <a href="create-genre-template.php" class="btn btn-danger">Nhập thể loại</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên thể loại</th>
              <th>Ảnh</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
          if( isset( $_POST['delete'] ) ) {
              $id = $_POST['id'];
              $query = "DELETE FROM genres WHERE id=".$id;
              $conn->query($query);
          }
          $sql = "SELECT * FROM genres";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>".$row['id']."</td>
                          <td>".$row['genre_name']."</td>
                          <td>".$row['image']."</td>
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
