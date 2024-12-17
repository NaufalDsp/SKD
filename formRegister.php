
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/loginstyle.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="register.php">
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
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td>
                        <select name="role" required>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="Register"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
