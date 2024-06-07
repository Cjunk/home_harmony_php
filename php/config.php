<?php
define('ON', 1);
define('OFF', 0);
define('DEBUG', ON); // Set to OFF to disable debugging



$START_UP_PAGE = 1;
$menu3 = ON;




function debug_log($message)
{
  if (DEBUG === ON) {
    file_put_contents('F:/DEVELOPER/pages/secured_pages/php/debug_log.txt', $message . "\n", FILE_APPEND);
  }
}

define('DB_PASSWORD', 'Quest35#Scrap35#');
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_samesite', 'Strict');

