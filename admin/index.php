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
        <h1 class="h2">Product</h1>

      </div>
      <div class="table-responsive">
        <h1>Admin</h1>
      </div>
    </main>
  </div>
</div>

<?php
include 'layout/footer.php';
