<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style2.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script defer src="script.js"></script>
  <title>Events Calendar</title>
</head>
<?php
session_start();
if (isset($_SESSION['username'])) {
  // If the session variables are not set, redirect to login page
  header("Location: ./pages/secured_pages/secure_page.php");
  exit();
}

?>

<body>
  <div id="header" class="header-bar">
    <!-- <ul class="menu-list">
      <li><a href="#section1">menu 1</a></li>
      <li><a href="#section2">menu 2</a></li>
      <li><a href="#section3">menu 3</a></li>
    </ul> -->

  </div>
  <div>
    <section id="section1" class="sections section1">
      <?php
      include './pages/under_page.html'
      ?>
    </section>
    <div class="scroll-container">
      <section id="section2" class="sections section2">
        <?php
        include './pages/home_page.html'
        ?>
      </section>
      <section id="section3" class="sections section3">
        <?php
        include './pages/section3.html'
        ?>
      </section>
    </div>
  </div>
  <?php include './components/footer.html' ?>
</body>

</html>