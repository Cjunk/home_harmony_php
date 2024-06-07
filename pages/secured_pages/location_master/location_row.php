<?php foreach ($_SESSION['locations'] as $location) : ?>
  <div class="location_list_items">
    <p><?= htmlspecialchars($location['location_id']) ?></p>
    <p><?= htmlspecialchars($location['location_name']) ?></p>
    <p><?= htmlspecialchars($location['location_desc']) ?></p>
    <p>
      <?php
      if (!empty($location['location_date_last_used'])) {
        $date = new DateTime($location['location_date_last_used']);
        echo htmlspecialchars($date->format('Y-m-d H:i:s')); // Adjust format as needed
      } else {
        echo '';
      }
      ?>
    </p>
    <p><?= htmlspecialchars($location['IsAvailable']) ?></p>
  </div>
<?php endforeach; ?>