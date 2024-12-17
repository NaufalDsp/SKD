<?php
session_start(); // Start session to track login attempts

// Include the database connection file
include 'koneksi.php';

// Initialize session variables for login attempts
if (!isset($_SESSION['attempt'])) {
    $_SESSION['attempt'] = 0;
    $_SESSION['last_attempt'] = 0; // Initialize last attempt time
}

// Set block time (30 seconds)
$blockTime = 30;

// Check if user is blocked
if (isset($_SESSION['last_attempt']) && (time() - $_SESSION['last_attempt'] < $blockTime)) {
    $timeLeft = $blockTime - (time() - $_SESSION['last_attempt']);
    $_SESSION['error'] = "Anda telah diblokir karena terlalu banyak percobaan login gagal. Silakan coba lagi dalam " . $timeLeft . " detik.";
    header("Location: login.php");
    exit();
}

// Retrieve the username and password from the POST request
$username = $_POST['username'];
$password = md5($_POST['password']); // Hash password with MD5 (to match the stored hashed password)

// Prepare the SQL statement to prevent SQL injection
$stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Reset login attempts if successful login
    $_SESSION['attempt'] = 0;

    // Fetch the associative array of the result
    $aName1 = $result->fetch_assoc();
    
    // Get the user role
    $role = $aName1['role'];

    // Store role and username in session for further use
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    // Display a message based on the role
    echo "Login berhasil! <br>";
    echo "Halo, " . htmlspecialchars($username) . "! Anda login sebagai " . htmlspecialchars($role) . ".";
} else {
    // Increment login attempt count
    $_SESSION['attempt']++;
    $_SESSION['error'] = "Username atau password salah.";

    // Check if attempts have reached 3
    if ($_SESSION['attempt'] >= 3) {
        $_SESSION['last_attempt'] = time(); // Record the time of last failed attempt
        $_SESSION['error'] .= " Anda telah mencapai batas percobaan. Silakan tunggu 30 detik.";
    }

    // Redirect back to login page with error
    header("Location: login.php");
    exit();
}

// Close the statement
$stmt->close();

// Close the database connection
$mysqli->close();
?>
