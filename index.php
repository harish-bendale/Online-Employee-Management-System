<?php
include 'config.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM employees");
?>

<!DOCTYPE html>
<html>
<head><title>Employee Management</title></head>
<body>
    <h2>Employee List</h2>
    <a href="add.php">Add Employee</a> | <a href="logout.php">Logout</a>
    <table border="1">
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Position</th><th>Salary</th><th>Actions</th></tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["position"] ?></td>
                <td>$<?= $row["salary"] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
