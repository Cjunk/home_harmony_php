<!-- 
    Home Harmony Front Landing Pages
    Author: Jericho Sharman
    Date: 2024
    Description: This file serves as the main entry point for the Home Harmony application.
    It does not include any layout templates and directly includes individual components. 
    It is an unsecured html
-->

<?php
// Start or resume a session
session_start();

// Redirects to the home page if the user is already logged in
if (isset($_SESSION['username'])) {
  header("Location: ./pages/secured_pages/home_project_page/home.php");
  exit; // Ensure no further execution after redirection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Home Harmony - Simplify your home management with our comprehensive dashboard for organizing and tracking your household tasks and projects.">
  <meta name="keywords" content="home management, household dashboard, home projects, task management">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Favicon for the site -->
  <link rel="icon" type="image/x-icon" href="/favicon.ico">

  <!-- Character set declaration -->
  <meta charset="UTF-8" />

  <!-- Uncomment the line below to redirect to maintenance page during site downtime -->
  <!-- <meta http-equiv="refresh" content="0; url=Offline for Maintenance.html"> -->

  <!-- Viewport settings for responsive web design -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Main stylesheet link -->
  <link rel="stylesheet" href="index.css" />

  <!-- Bootstrap CSS for responsive and modern UI components -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- JavaScript file for additional interactivity - Uncomment if needed -->
  <!-- <script defer src="script.js"></script> -->

  <!-- Title of the webpage -->
  <title>Home Harmony - Your Home Management Dashboard</title>
  <script defer src="index.js"></script>
</head>

<body>
  <?php
  // Include the header component
  include("./Home_harmony_components/header/header.php");
  ?>

  <div>
    <!-- Login section with background -->
    <section id="login-section" class="sections section2 ">
      <?php
      // Include the login page HTML
      include './pages/insecured/login.html'
      ?>
    </section>

    <!-- Registration section with background, initially not active -->
    <section id="register-section" class="sections section2  not-active">
      <?php
      // Include the registration page HTML
      include './pages/insecured/register.html'
      ?>
    </section>
  </div>
  <div class="footer">
    <a>FOOTER</a>
  </div>
</body>

</html>