<link rel="stylesheet" href="../../../Home_harmony_components/Header/header.css" />
<div id="header" class="header-bar">
  <span class="harmony-title">HOME HARMONY</span>
  <h1 class="sub-title">Organising your hobbies</h1>
  <div>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
      // If the session variable is set (the user is logged in ) 
      include('secured_menu.html');
    }
    ?>
  </div>
</div>