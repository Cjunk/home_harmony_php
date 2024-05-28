<?php
define('ON', 1);
define('OFF', 0);
define('DEBUG', ON); // Set to OFF to disable debugging

function debug_log($message)
{
  if (DEBUG === ON) {
    file_put_contents('debug_log.txt', $message . "\n", FILE_APPEND);
  }
}
