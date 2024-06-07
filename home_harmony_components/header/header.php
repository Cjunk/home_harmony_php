<link rel="stylesheet" href="../../../home_harmony_components/header/header.css" />
<div id="header" class="header-bar">
  <span class="harmony-title">HOME HARMONY</span>
  <h1 class="sub-title">Organising your hobbies</h1>
  <div>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
      // If the session variable is set (the user is logged in so show the logged in menu ) 
      include('secured_menu.html');
    }
    ?>
  </div>
</div>