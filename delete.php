<?php
include 'config.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$id = $_GET["id"];
$conn->query("DELETE FROM employees WHERE id=$id");
header("Location: index.php");
?>
