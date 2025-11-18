<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
header("Location: login.php");
exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $_POST['name'];
$specialization = $_POST['specialization'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$sql = "INSERT INTO doctors (name, specialization, email, phone)
VALUES ('$name', '$specialization', '$email', '$phone')";
if (mysqli_query($conn, $sql)) {
echo "<script>alert('Doctor added successfully');</script>";
} else {
echo "Error: " . mysqli_error($conn);
}
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Doctor</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Add Doctor</h2>
<form method="POST">
Name: <input type="text" name="name" required><br>
Specialization: <input type="text" name="specialization" required><br>
Email: <input type="email" name="email" required><br>
Phone: <input type="text" name="phone" required><br>
<button type="submit">Add Doctor</button>
</form>
</body>
</html>