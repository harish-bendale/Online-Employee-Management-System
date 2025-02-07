<?php
include 'config.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM employees WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $position = $_POST["position"];
    $salary = $_POST["salary"];

    $conn->query("UPDATE employees SET name='$name', email='$email', position='$position', salary=$salary WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Employee</title></head>
<body>
    <h2>Edit Employee</h2>
    <form method="POST">
        <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
        <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
        <input type="text" name="position" value="<?= $row['position'] ?>" required><br>
        <input type="number" name="salary" value="<?= $row['salary'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
