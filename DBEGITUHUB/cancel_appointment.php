<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }
$id = $_GET['id'];
mysqli_query($conn, "UPDATE appointments SET status='Cancelled' WHERE id=$id");
header("Location: patient_dashboard.php");
exit;
?>