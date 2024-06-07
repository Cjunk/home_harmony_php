<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../css/page.css">
  <link rel="stylesheet" href="../statistics_page/stats.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <link rel="stylesheet" href="https://www.phat-fitness.com/components/charts/gauge/style.css" />
  <script src="https://www.phat-fitness.com/components/charts/gauge/gauge.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="page_container">
    <section id="second-section" class="page_section">
      <div class="page-title">
        <h1>Your Statistics</h1>
      </div>
      <div class="page-content">
        <div class="container mt-4">
          <div class="row">
            <div class="col-md-3">
              <h2 class="text-center">Item Types Distribution 1</h2>
              <canvas id="myPieChart1"></canvas>
            </div>
            <div class="col-md-3">
              <h2 class="text-center">Location Utilisation</h2>
              <canvas id="myBarChart"></canvas>
              <div>
                <canvas id="gaugeCanvas" width="auto" height="100"></canvas>
                <div class="gauge-value" id="gaugeValue"></div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: '../php/fetch_stats.php',
        method: 'GET',
        success: function(response) {
          try {
            if (response.success) {
              const itemDistribution = response.item_distribution;
              const locationUtilisationCount = response.location_utilisation_count;

              // Process itemDistribution data
              const labels = itemDistribution.map(item => item.type_name);
              const counts = itemDistribution.map(item => item.total_count);

              // Pie chart configurations
              function createPieChartConfig(title) {
                return {
                  type: 'pie',
                  data: {
                    labels: labels,
                    datasets: [{
                      label: 'Item Types',
                      data: counts,
                      backgroundColor: [
                        'rgba(0, 123, 255, 0.8)', // Blue
                        'rgba(40, 167, 69, 0.8)', // Green
                        'rgba(255, 193, 7, 0.8)', // Yellow
                        'rgba(23, 162, 184, 0.8)', // Cyan
                        'rgba(108, 117, 125, 0.8)', // Gray
                        'rgba(102, 16, 242, 0.8)' // Purple
                      ],
                      borderColor: [
                        'rgba(0, 123, 255, 1)', // Blue
                        'rgba(40, 167, 69, 1)', // Green
                        'rgba(255, 193, 7, 1)', // Yellow
                        'rgba(23, 162, 184, 1)', // Cyan
                        'rgba(108, 117, 125, 1)', // Gray
                        'rgba(102, 16, 242, 1)' // Purple
                      ],
                      borderWidth: 1
                    }]
                  },
                  options: {
                    responsive: true,
                    plugins: {
                      legend: {
                        position: 'top',
                      },
                      title: {
                        display: true,
                        text: title
                      }
                    }
                  }
                };
              }

              // Bar chart configuration
              function createBarChartConfig(title, total, capacity) {
                return {
                  type: 'bar',
                  data: {
                    labels: ['Occupied', 'Remaining'],
                    datasets: [{
                      label: 'Occupied',
                      data: [total, capacity - total],
                      backgroundColor: [
                        'rgba(40, 167, 69, 0.8)', // Green
                        'rgba(108, 117, 125, 0.8)' // Gray
                      ],
                      borderColor: [
                        'rgba(40, 167, 69, 1)', // Green
                        'rgba(108, 117, 125, 1)' // Gray
                      ],
                      borderWidth: 1
                    }],

                  },
                  options: {
                    responsive: true,
                    indexAxis: 'y', // This makes the bar chart horizontal
                    plugins: {
                      legend: {
                        position: 'top',
                      },
                      title: {
                        display: true,
                        text: title
                      }
                    },
                    scales: {
                      x: {
                        beginAtZero: true,
                        max: capacity
                      },
                      y: {
                        beginAtZero: true
                      }
                    }
                  }
                };
              }
              const totalUsed = locationUtilisationCount; // Use the count of unique locations
              const capacity = 65;
              new Chart(document.getElementById('myPieChart1'), createPieChartConfig('Distribution of Item Types 1'));
              new Chart(document.getElementById('myBarChart'), createBarChartConfig('Location Utilisation', totalUsed, capacity));
              const gaugeValue = totalUsed; // Replace this with the actual value you want to display
              drawGauge(gaugeValue);
            } else {
              console.error(response.message);
            }
          } catch (error) {
            console.error("Error parsing JSON response:", error);
            console.error("Response:", response);
          }
        },
        error: function(xhr, status, error) {
          console.error("Error fetching data:", error);
          console.error("Status:", status);
          console.error("XHR:", xhr);
        }
      });
    });
  </script>

</body>

</html>