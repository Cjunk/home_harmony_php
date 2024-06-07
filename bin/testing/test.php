<link rel="stylesheet" href="test.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<h1 class="test-heading">Test1.php</h1>
<?php
$variable = "Jericho";
include("child1.php");
include("child2.php");
?>
<p2><?php echo $child1_var; ?></p2>
<p2><?php echo $child2_var; ?></p2>

<?php
// Set the year and month (you can modify these to make them dynamic)
$year = 2035;
$month = 7;  // July, not May (as previously stated)

// Create the first date of that month
$date = strtotime("$year-$month-01");

// Get the first day of the month (what weekday it starts on)
$firstDayOfMonth = date('w', $date);

// Calculate the number of days in the month
$daysInMonth = date('t', $date);

// Start building the calendar HTML using Bootstrap classes
echo "<table class='table table-bordered table-hover'>";
echo "<thead class='thead-light'>";
echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>";
echo "</thead>";
echo "<tbody>";

// The variable $day will count the correct number of days to be placed in the calendar
$day = 1;

// Calculate the number of weeks in the month
$weeksInMonth = ceil(($firstDayOfMonth + $daysInMonth) / 7);

// Create rows for weeks
for ($week = 0; $week < $weeksInMonth; $week++) {
  echo "<tr>";
  // Create cells for each day of the week
  for ($dayOfWeek = 0; $dayOfWeek < 7; $dayOfWeek++) {
    echo "<td>";
    if ($week == 0 && $dayOfWeek < $firstDayOfMonth) {
      // Before the start of the month, the cell is empty
      echo "&nbsp;";
    } elseif ($day > $daysInMonth) {
      // After the end of the month, the cell is empty
      echo "&nbsp;";
    } else {
      // Display the day and increment the counter
      echo $day;
      $day++;
    }
    echo "</td>";
  }
  echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>