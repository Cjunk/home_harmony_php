  <?php
  session_start();
  if (!isset($_SESSION['username'])) {
    // If the session variables are not set, redirect to login page
    header('Location:../../../index.php');
    exit();
  }
  ?>
  <link rel="stylesheet" href="../css/page.css">
  <link rel="stylesheet" href="../template/template.css">
  <script defer src="../template/template.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <div class="page_container">
    <section id="second-section" class="page_section">
      <div class="page-title">
        <h1>TEMPLATE PAGE</h1>
      </div>
    </section>
  </div>