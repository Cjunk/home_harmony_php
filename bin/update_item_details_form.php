<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Test Update Item Details</title>
  <style> 
  .frm {
    display:flex;
    flex-direction: column;

  }
  .frm > input,label,button {
    width:20%;
  }
  .frm > input {
    margin-bottom:5px;
  }
</style>
</head>

<body>
  <form class="frm" action="update_item_details.php" method="POST">
    <label for="item_number">Item Number:</label>
    <input type="text" id="item_number" name="item_number">

    <label for="alt_item_number">Alt Number:</label>
    <input type="text" id="alt_item_number" name="alt_item_number">

    <label for="item_name">Name:</label>
    <input type="text" id="item_name" name="item_name">


    <label for="item_descr">Description:</label>
    <input type="text" id="item_descr" name="item_descr">

    <label for="item_barcode">Barcode:</label>
    <input type="text" id="item_barcode" name="item_barcode">

    <label for="item_weight">Weight:</label>
    <input type="text" id="item_weight" name="item_weight">

    <label for="item_prime_photo">Main Photo:</label>
    <input type="text" id="item_prime_photo" name="item_prime_photo">

    <button type="submit">Submit</button>
  </form>
</body>

</html>