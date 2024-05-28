  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="../components/item_master_row.css" rel="stylesheet">

  <?php foreach ($_SESSION['ITEM_MASTER'] as $row) :
    $original_url = $row['item_prime_photo'];
    $transformed_url = preg_replace(
      '/(upload\/)(v\d+\/)?/',
      '$1w_150,h_150,c_fill,q_auto:best/', // Increase dimensions, maintain aspect ratio, and set optimal quality
      $original_url
    );
  ?>
    <div class="row-container">
      <div class="master_items_row" onclick="item_master_row_click(<?= htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') ?>)">
        <div class="img-wrapper">
          <img src="<?= $transformed_url; ?>" class="img-fluid " alt="Item image">
        </div>
        <div class="item-details-container">
          <div class="item-detail">
            <p class="details-line"><strong class="field-clr">Name:</strong> <?= $row['item_name']; ?></p>
            <p class="details-line"><strong class="field-clr">Item Number:</strong> <?= $row['item_number']; ?></p>
            <p class="details-line"><strong class="field-clr">Description:</strong>
            <div><?= $row['item_descr']; ?></div>
            </p>
          </div>
        </div>
        <div class="">
          <div class="item-detail">
            <p></p>
            <p class="details-line"><strong class="field-clr">Barcode:</strong> <?= $row['item_barcode']; ?></p>
            <p class="details-line"><strong class="field-clr">Alt Number:</strong> <?= $row['alt_item_number']; ?></p>
            <p class="details-line"><strong class="field-clr">Type:</strong> <?= $row['item_type']; ?></p>
            <p class="details-line">
              <strong class="field-clr">Image:</strong>
              <?= strlen($row['item_prime_photo']) > 20 ? substr($row['item_prime_photo'], 0, 20) . '...' : $row['item_prime_photo']; ?>
            </p>
          </div>
        </div>
        <div class="">
          <div class="item-detail">
            <p></p>
            <p class="details-line"><strong class="field-clr">Weight:</strong> <?= $row['item_name']; ?></p>
            <p class="details-line"><strong class="field-clr">Height:</strong> <?= $row['item_height']; ?></p>
            <p class="details-line"><strong class="field-clr">Width:</strong> <?= $row['item_width']; ?></p>
          </div>
        </div>
        <div class="">
          <div class="item-detail">
            <p></p>

            <p class="details-line"><strong class="field-clr">Height:</strong> <?= $row['item_height']; ?></p>
            <p class="details-line"><strong class="field-clr">Width:</strong> <?= $row['item_width']; ?></p>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>