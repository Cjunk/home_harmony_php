function drawGauge(value) {
  const canvas = document.getElementById('gaugeCanvas');
  const ctx = canvas.getContext('2d');

  const centerX = canvas.width / 2;
  const centerY = canvas.height;
  const radius = canvas.width / 5;
  const startAngle = Math.PI;
  const endAngle = 2 * Math.PI;
  // Draw text at the desired position
  const text = 'Utilization';
  const textX = canvas.width / 2;
  const textY = canvas.height / 1.1;
  // Set font style and size
  ctx.font = '20px Arial';
  // Set text alignment
  ctx.textAlign = 'center';
  // Set text color
  ctx.fillStyle = 'black';


  // Clear the canvas
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Draw the background arc
  ctx.beginPath();
  ctx.arc(centerX, centerY, radius, startAngle, endAngle);
  ctx.lineWidth = 20;
  ctx.strokeStyle = '#d3d3d3';
  ctx.stroke();

  // Draw the filled arc
  const fillEndAngle = startAngle + (endAngle - startAngle) * (value / 100);
  ctx.beginPath();
  ctx.arc(centerX, centerY, radius, startAngle, fillEndAngle);
  ctx.lineWidth = 20;
  ctx.strokeStyle = '#0f6384';
  ctx.stroke();
  ctx.fillText(text, textX, textY);
  // Update the gauge value
  document.getElementById('gaugeValue').textContent = Math.round(value) + '%';
}
function getParameterByName(name, url = window.location.href) {
  name = name.replace(/[\[\]]/g, '\\$&');
  const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}



