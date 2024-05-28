function debounce(func, timeout = 300) {
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      func.apply(this, args);
    }, timeout);
  };
}

function updateQuantity(soh_id, operation) {
  
  let qtyElement2 = document.getElementById('qty_2' + soh_id);
  let currentQty = parseInt(qtyElement2.innerText);
  let newQty = (operation === 'increment') ? currentQty + 1 : currentQty - 1;
  if (newQty < 0) {
    alert("Quantity cannot be less than zero.");
    return;
  }
  qtyElement2.innerText = newQty;
  debounce(function () {
    sendUpdateToServer(soh_id, newQty);
  })();
}

function sendUpdateToServer(soh_id, newQty) {
  console.log("Sending update to server...");
  fetch('../php/update_quantity.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: `soh_id=${encodeURIComponent(soh_id)}&quantity=${encodeURIComponent(newQty)}`
  })
    .then(response => {

      // Check if the response is OK (status code 200)
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
   
      if (data.success) {
        if (data.deleted) {
          // Refresh the list of items
          location.reload();
        } else {
          // alert('Quantity updated successfully.');
        }
      } else {
        alert(`Error updating quantity: ${data.message || 'Unknown error'}. Please refresh and try again.`);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred. Please check your connection and try again.');
    });
}


function row_click(row) {
  fetch('../php/get_quantity.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: `soh_id=${row.soh_id}`
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        row.soh_qty = data.quantity;
      }
      const modalContent = document.getElementById('modal-content');
      modalContent.innerHTML = `
      <img src="${row.item_prime_photo}" class="img-fluid2 rounded-start" alt="Item image">
      <h5 class="mt-0 field-clr">Item Details</h5>
      <p><strong class="field-clr">Name:</strong> ${row.item_name}</p>
      <p><strong class="field-clr">Item Number:</strong> ${row.item_number}</p>
      <p><strong class="field-clr">Description:</strong> ${row.item_descr}</p>
      <p><strong class="field-clr">Location:</strong> ${row.location_name}</p>
      <p><strong class="field-clr">Quantity:</strong> <span style="font-size:25px;color:red;" id="qty_2${row.soh_id}">${row.soh_qty}</span></p>
      <div class="qty-buttons-container">
        <button class="btn btn-outline-primary btn-sm qty-button qty-button-inc" onclick="event.stopPropagation(); updateQuantity(${row.soh_id}, 'increment')">+</button>
        <button class="btn btn-outline-secondary btn-sm qty-button qty-button-dec" onclick="event.stopPropagation(); updateQuantity(${row.soh_id}, 'decrement')">-</button>
      </div>
    `;
      const itemModal = new bootstrap.Modal(document.getElementById('itemModal'));
      itemModal.show();
    })
    .catch(error => {
      console.error('Error:', error);
    });
}
// Debounce function to delay processing
function filterSOH() {
  var input, filter, table, rows, cell, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase(); // Get the search term and convert to uppercase for case-insensitivity
  table = document.getElementById("sohTable"); // Your SOH data table ID
  rows = table.getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < rows.length; i++) {
    cell = rows[i].getElementsByTagName("td")[0]; // Assume we're searching in the first column; adjust as needed
    if (cell) {
      txtValue = cell.textContent || cell.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none"; // Hides the row
      }
    }
  }
}