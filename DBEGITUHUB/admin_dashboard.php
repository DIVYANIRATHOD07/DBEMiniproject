<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
header("Location: login.php");
exit;
}
$res = mysqli_query($conn, "SELECT a.*, u.full_name AS patient, d.name AS doctor, d.specialization
FROM appointments a
JOIN users u ON a.patient_id = u.id
JOIN doctors d ON a.doctor_id = d.id
ORDER BY a.appointment_date DESC, a.appointment_time DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title><link rel="stylesheet" href="style.css"></head>
<body>
<nav>
<a href="doctor.php">Add Doctor</a> |
<a href="logout.php">Logout</a>
</nav>
<h2>All Appointments</h2>
<table border="1">
<tr><th>Patient</th><th>Doctor</th><th>Specialization</th><th>Date</th><th>Time</th><th>Status</th></tr>
<?php while($a = mysqli_fetch_assoc($res)) { ?>
<tr>
<td><?= $a['patient'] ?></td>
<td><?= $a['doctor'] ?></td>
<td><?= $a['specialization'] ?></td>
<td><?= $a['appointment_date'] ?></td>
<td><?= $a['appointment_time'] ?></td>
<td><?= $a['status'] ?></td>
</tr>
<?php } ?>
</table>
</body>
</html>