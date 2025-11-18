<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$doctor_id = $_POST['doctor_id'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$patient_id = $_SESSION['user_id'];
$sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time)
VALUES ($patient_id, $doctor_id, '$appointment_date', '$appointment_time')";
if (mysqli_query($conn, $sql)) {
echo "<script>alert('Appointment booked successfully!');window.location='patient_dashboard.php';</script>";
}
}
$doctors = mysqli_query($conn, "SELECT * FROM doctors");
?>
<!DOCTYPE html>
<html>
<head><title>Book Appointment</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Book Appointment</h2>
<form method="POST">
<label>Select Doctor:</label>
<select name="doctor_id" required>
<option value="">-- Choose --</option>
<?php while($d = mysqli_fetch_assoc($doctors)) { ?>
<option value="<?= $d['id'] ?>"><?= $d['name'] ?> — <?= $d['specialization'] ?></option>
<?php } ?>
</select><br>
<label>Date:</label>
<input type="date" name="appointment_date" required><br>
<label>Time:</label>
<input type="time" name="appointment_time" required><br>
<button type="submit">Book</button>
</form>
</body>
</html>