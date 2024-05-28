  <?php
  session_start();
  if (!isset($_SESSION['username'])) {
    // If the session variables are not set, redirect to login page
    header('Location:../../../index.php');
    exit();
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="home_styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <title>Home Harmony Welcome <?php echo $_SESSION['page_number'] ?></title>
  </head>
  <body>
    <?php
    include("../../../Home_harmony_components/Header/header.php");
    switch ($_SESSION['page_number']) {
      case 1:
        include '../soh_page/soh_page.php';  //
        break;
      case 2:
        include '../projects/projects.php';
        break;
      case 6:
        include '../location_master/location_master.php';
        break;
      case 3:
        include '../item_Master/item_master.php';
        break;
      default:
        include '../template/template.php';
        echo 'page not found';
        break;
    }
    ?>
    <div class="footer">
      <a>FOOTER</a>
    </div>
  </body>

  </html>