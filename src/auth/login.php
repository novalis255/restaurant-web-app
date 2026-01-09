<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Blanc Restaurant</title>
    <link rel="stylesheet" href="../assets/css/landing.css">
</head>

<body class="login-page">

    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <p class="login-subtitle">Welcome back to Blanc Restaurant</p>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="login-alert">
                    <?= $_SESSION['error']; ?>
                </div>
            <?php
                unset($_SESSION['error']);
            endif;
            ?>

            <form method="post" action="proses_login.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" class="btn-primary full-width">
                    Login
                </button>
            </form>

            <a href="../landing/index.php" class="back-link">
                ← Back to Home
            </a>
        </div>
    </div>

</body>

</html>