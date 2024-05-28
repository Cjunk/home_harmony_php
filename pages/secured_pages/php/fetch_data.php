<!-- TODO: This entire file must be reworked for LIVE -->


<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    // If the session variables are not set, redirect to login page
    header('Location:../../../index.php');
    exit();
  }

function fetchData()
{

  require_once '../../../pages/secured_pages/php/db.php';
  $conn = Database::getInstance();
  $sql = "SELECT
                soh.soh_id,
                soh.item_number,
                soh.location_id,
                item.item_name,
                locations.location_name,
                item.item_descr,
                item.item_prime_photo,
                item.item_barcode,
                soh.soh_qty,
                soh.soh_date_added,
                soh.soh_last_updated,
                itypes.type_name,
                catts.cat_name
            FROM
                SOH soh
            LEFT JOIN 
                ITEM_MASTER item ON soh.item_number = item.item_number AND (item.userID = 1 OR item.userID = 2)
            LEFT JOIN
                LOCATION_MASTER locations ON soh.location_id = locations.location_id AND (locations.userID = 1 OR locations.userID = 2)
            LEFT JOIN
                ITEM_TYPES itypes ON item.item_type = itypes.type_id AND (itypes.userID = 1 OR itypes.userID = 2)
            LEFT JOIN 
                categories catts ON catts.catID = item.item_cat AND (catts.userID = 1 OR catts.userID = 2)
            WHERE soh.userID = 2"; // TODO: Change user ID to the current logged in user $_SESSION['user_id']
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  if ($stmt === false) {
    throw new Exception('Unable to prepare statement');
  }
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
try {
  $todos = fetchData();
  $_SESSION['todos'] = $todos;
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
