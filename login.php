<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/loginstyle.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="cek-login.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <!-- Tampilkan alert di sini jika ada -->
                <tr>
                    <td colspan="3">
                        <?php
                        session_start();
                        if (isset($_SESSION['error'])) {
                            echo "<div class='alert'>" . $_SESSION['error'] . "</div>";
                            unset($_SESSION['error']); // Hapus error setelah ditampilkan
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="Log in"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
