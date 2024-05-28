<?php
session_start();
if (!isset($_SESSION['username'])) {
  // If the session variables are not set, redirect to login page
  header('Location:../../../index.php');
  exit();
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<link rel="stylesheet" href="../css/page.css">
<link rel="stylesheet" href="../location_master/location_master.css">
<script defer src="../location_master/location_master.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--  <?php include '../php/fetch_locations.php'; ?> -->
<div class="page_container">
  <section id="second-section" class="page_section">
    <div class="page-title">
      <h1>Location Master</h1>
    </div>
    <p class="page-content">Top of details</p>
    <?php
    if (isset($_SESSION['locations']) && is_array($_SESSION['locations'])) :
    ?>
      <?php include '../Location_master/location_row.php'; ?><!-- Include the ROW html -->
    <?php
    else :
      echo "No locations set in session.";
    endif;
    ?>
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