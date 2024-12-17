<?php
session_start(); // Start session to track registration attempts

// Include the database connection file
include 'koneksi.php'; // Include koneksi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash password with MD5
    $role = $_POST['role']; // Get role from the form

    // Prepare the SQL query to insert data
    $stmt = $mysqli->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sss", $username, $password, $role);

        // Execute the query
        if ($stmt->execute()) {
            echo "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Prepare statement failed: " . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
?>
