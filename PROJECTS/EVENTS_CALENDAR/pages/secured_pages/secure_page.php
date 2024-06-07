<?php
session_start();
if (!isset($_SESSION['username'])) {
    // If the session variables are not set, redirect to login page
    header('Location: ../../index.php');
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Secure Page</title>
</head>

<body>
    <h1>Welcome to the Secure Page</h1>
    <p>You are logged in as <?php echo $_SESSION['username']; ?></p>
    <!-- Rest of your secure content goes here -->
    <form action="../../php/logout.php" method="post">
        <button type="submit">Log Out</button>
    </form>

</body>


</html>