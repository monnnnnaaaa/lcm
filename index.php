<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login-style.css">
</head>
<body>
    <div class="login-container">
        <img src="img/logo.png" alt="Logo" class="logo">
        <h2>QUOTATION SYSTEM</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="uname" class="label-left">Username</label>
                <input type="text" id="uname" name="uname" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password" class="label-left">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
