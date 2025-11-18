<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }
$uid = $_SESSION['user_id'];
$res = mysqli_query($conn, "SELECT a.*, d.name AS doc_name, d.specialization
FROM appointments a
JOIN doctors d ON a.doctor_id = d.id
WHERE a.patient_id = $uid
ORDER BY a.appointment_date DESC, a.appointment_time DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title><link rel="stylesheet" href="style.css"></head>
<body>
<nav>
<a href="book_appointment.php">Book Appointment</a> |
<a href="logout.php">Logout</a>
</nav>
<h2>Your Appointments</h2>
<table border="1">
<tr><th>Doctor</th><th>Specialization</th><th>Date</th><th>Time</th><th>Status</th><th>Action</th></tr>
<?php while($a = mysqli_fetch_assoc($res)) { ?>
<tr>
<td><?= $a['doc_name'] ?></td>
<td><?= $a['specialization'] ?></td>
<td><?= $a['appointment_date'] ?></td>
<td><?= $a['appointment_time'] ?></td>
<td><?= $a['status'] ?></td>
<td>
<?php if ($a['status'] == 'Scheduled') { ?>
<a href="cancel_appointment.php?id=<?= $a['id'] ?>">Cancel</a>
<?php } ?>
</td>
</tr>
<?php } ?>
</table>
</body>
</html>