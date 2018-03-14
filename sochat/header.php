<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>SoChat</title>
    <link rel="stylesheet" type="text/css" href="includes/style.css">
</head>
<body>
<header>

    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>

            <div class="nav-login">
                <form action="includes/login.inc.php" method="POST">
                    <input type="text" name="username" placeholder="username">
                    <input type="password" name="password" placeholder="password">
                    <button type="submit" name="submit">Login</button>
                </form>
                <a href="signup.php">Sign up</a>
            </div>
        </div>

    </nav>
</header>
