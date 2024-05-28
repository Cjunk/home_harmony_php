<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="../components/item_row.css" rel="stylesheet">

<?php foreach ($todos as $row) :
  $original_url = $row['item_prime_photo'];
  $transformed_url = preg_replace(
    '/(upload\/)(v\d+\/)?/',
    '$1w_150,h_150,c_fill,q_auto:best/', // Increase dimensions, maintain aspect ratio, and set optimal quality
    $original_url
  );
?>
  <div class="row-container">
    <div class="row" onclick="row_click(<?= htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') ?>)">
      <div class="img-wrapper">
        <img src="<?= $transformed_url; ?>" class="img-fluid " alt="Item image">
      </div>
      <div class="item-details-container">
        <div class="item-detail">
          <p class="details-line"><strong class="field-clr">Name:</strong> <?= $row['item_name']; ?></p>
          <p class="details-line"><strong class="field-clr">Item Number:</strong> <?= $row['item_number']; ?></p>
          <p class="details-line"><strong class="field-clr">Description:</strong> <?= $row['item_descr']; ?></p>
        </div>
      </div>
      <div class="">
        <div class="item-detail">
          <p></p>
          <p class="details-line"><strong class="field-clr">Qty:</strong> <?= $row['soh_qty']; ?></p>
          <p class="details-line"><strong class="field-clr">Location:</strong> <?= $row['location_name']; ?></p>
        </div>
      </div>
      <div class="">
        <div class="item-detail">
          <p></p>
          <p class="details-line"><strong class="field-clr">Name:</strong> <?= $row['item_name']; ?></p>
          <p class="details-line"><strong class="field-clr">Location ID:</strong> <?= $row['location_id']; ?></p>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>