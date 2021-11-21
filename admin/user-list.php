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
        <h1 class="h2">Tài khoản</h1>
      </div>
        <a href="create-user-template.php" class="btn btn-danger">Tạo tài khoản</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên</th>
              <th>Tên đăng nhập</th>
              <th>Email</th>
              <th>Loại tài khoản</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
          if( isset( $_POST['delete'] ) ) {
              $id = $_POST['id'];
              $query = "DELETE FROM user WHERE id_user=".$id;
              $conn->query($query);
          }
          $sql = "SELECT * FROM user";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>".$row['id_user']."</td>
                          <td>".$row['name_user']."</td>
                          <td>".$row['username_user']."</td>
                          <td>".$row['email_user']."</td>
                          <td>".$row['user_type']."</td>
                          <td> <form method='POST'>
                                <input type=hidden name=id value=".$row["id_user"]." >
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
