<?php
// Start the session
session_start();

// Write some data to the session
$_SESSION['write_test'] = 'Session write test successful';

// Output the data
echo $_SESSION['write_test'];
