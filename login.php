<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            header("Location: index.html?status=success");
        } else {
            header("Location: index.html?status=error");
        }
    } else {
        header("Location: index.html?status=error");
    }

    $conn->close();
}
?>
