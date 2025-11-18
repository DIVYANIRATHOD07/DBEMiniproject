<?php
include 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "INSERT INTO users (full_name, email, password, is_admin)
VALUES ('$full_name', '$email', '$password', 0)";
if (mysqli_query($conn, $sql)) {
echo "<script>alert('Registration successful!');window.location='login.php';</script>";
} else {
echo "Error: " . mysqli_error($conn);
}
}
?>
<!DOCTYPE html>
<html>
<head><title>Register</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Patient Registration</h2>
<form method="POST">
Full Name: <input type="text" name="full_name" required><br>
Email: <input type="email" name="email" required><br>
Password: <input type="password" name="password" required><br>
<button type="submit">Register</button>
</form>
</body>
</html>