<?php 
session_start();

// kết nối tới csdl
$db = mysqli_connect('localhost', 'root', '', 'banhoa');

// khởi tạo giá trị mặc định
$name 	  = "";
$username = "";
$email    = "";
$errors   = array(); 

// gọi hàm đăng ký nếu button register được click
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	global $db, $errors, $username, $email;

	// Nhận tất cả các giá trị được nhập, gọi hàm e được định nghĩa bên dưới
	$name    	 =  e($_POST['name']);
	$email       =  e($_POST['email']);
	$username    =  e($_POST['username']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// Xác thực biểu mẫu
	if (empty($username)) { 
		array_push($errors, "Tên đăng nhập là bắt buộc"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email là bắt buộc"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Mật khẩu là bắt buộc"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "Mật khẩu phải trùng nhau");
	}

	// Đăng ký nếu không có lỗi trong form
	if (count($errors) == 0) {
		$password = md5($password_1);//Mã hóa mật khẩu bằng hàm md5

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO user (name_user, username_user, email_user, user_type, password_user) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO user (name_user, username_user, email_user, user_type, password_user) 
					  VALUES('$name', '$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// Nhận id được tạo
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "Bạn đã có thể đăng nhập ngay";
			header('location: index.php');				
		}
	}
}

// đưa ra mảng các giá trị từ người dùng từ ID
function getUserById($id){
	global $db;
	$query = "SELECT * FROM user WHERE id_user=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc(@$result);
	return $user;
}

// thoát chuỗi
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
// gọi hàm login nếu nút register được nhấn
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// lấy từ giá trị
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// chắc chắn rằng mọi thứ được nhập đầy đủ
	if (empty($username)) {
		array_push($errors, "Tên đăng nhập là bắt buộc");
	}
	if (empty($password)) {
		array_push($errors, "Mật khẩu là bắt buộc");
	}

	// Đăng nhập nếu không có lỗi từ form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM user WHERE username_user='$username' AND password_user='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if ($results && mysqli_num_rows($results) == 1) { // tìm thấy thành viên
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "Bạn đã đăng nhập";
				header('location: admin/index.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "Bạn đã đăng nhập";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Sai tên đăng nhập hoặc mật khẩu");
		}
	}
}
// LOGOUT USER
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}

// ADMIN 
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}