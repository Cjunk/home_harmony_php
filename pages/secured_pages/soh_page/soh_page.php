  <?php  /* Security measure so one must be logged in to execute this php file*/
  session_start();
  if (!isset($_SESSION['username'])) {
    // If the session variables are not set, redirect to login page
    header('Location:../../../index.php');
    exit();
  }
  ?>
  <link rel="stylesheet" href="../css/page.css">
  <link rel="stylesheet" href="../soh_page/soh_page.css">
  <script defer src="../soh_page/soh_script.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Fetch the stock on hand data -->
  <?php include '../php/fetch_data.php'; ?>   
  <div class="page_container">
    <section id="second-section" class="page_section">
      <div class="page-title">
        <h1>Stock On Hand</h1>
      </div>

      <div class="page-content">
        <div class="rows_all_rows_container">
          <?php include '../components/item_row.php'; ?><!-- Include the ROW html -->
        </div>
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>