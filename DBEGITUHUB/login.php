<?php
include 'db_connect.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$email = $_POST['email'];
$password = $_POST['password'];
$res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
if ($row = mysqli_fetch_assoc($res)) {
$_SESSION['user_id'] = $row['id'];
$_SESSION['is_admin'] = $row['is_admin'];
header("Location: " . ($row['is_admin'] ? "admin_dashboard.php" : "patient_dashboard.php"));
exit;
} else {
echo "<script>alert('Invalid email or password');</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Login</h2>
<form method="POST">
Email: <input type="email" name="email" required><br>
Password: <input type="password" name="password" required><br>
<button type="submit">Login</button>
</form>
</body>
</html>