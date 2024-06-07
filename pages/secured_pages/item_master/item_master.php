  <?php
  session_start();
  if (!isset($_SESSION['username'])) {
    // If the session variables are not set, redirect to login page
    header('Location:../../../index.php');

    exit();
  } else {
    include '../php/get_item_list.php';
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <link rel="stylesheet" href="../css/page.css">
    <link rel="stylesheet" href="../Item_master/item_master.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="page_container">
      <section id="second-section" class="page_section">
        <div class="page-title">
          <h1>Item Master</h1>
        </div>
        <div class="page-content">
          <div class="master_item_all_rows_container">
            <?php include '../components/item_master_row.php'; ?><!-- Include the ROW html -->
          </div>
        </div>
        <div class="item-page-content">
        </div>
      </section>
    </div>
    <!-- Modal Structure -->
    <div class="modal fade fullscreen-modal" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="itemModalLabel">Item Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="modal-content"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script defer src="../Item_master/item_master.js"></script>
  </body>

  </html>