<?php
include 'config.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $position = $_POST["position"];
    $salary = $_POST["salary"];

    $stmt = $conn->prepare("INSERT INTO employees (name, email, position, salary) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $name, $email, $position, $salary);
    $stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Employee</title></head>
<body>
    <h2>Add Employee</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="position" placeholder="Position" required><br>
        <input type="number" name="salary" placeholder="Salary" required><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
