function item_master_row_click(row) {
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
      <h5 class="mt-0 field-clr">${row.item_name}</h5>

      <p><strong class="field-clr">Item Number:</strong> ${row.item_number}</p>
      <p><strong class="field-clr">Description:</strong> ${row.item_descr}</p>
      <p><strong class="field-clr">Location:</strong> ${row.location_name}</p>

    `;
      const itemModal = new bootstrap.Modal(document.getElementById('itemModal'));
      itemModal.show();
    })
    .catch(error => {
      console.error('Error:', error);
    });
}