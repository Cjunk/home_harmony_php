document.querySelectorAll('.dropdown_menu li').forEach(item => {
  item.addEventListener('click', function () {
    const pageNumber = this.getAttribute('data-page-number');
    fetch(`../php/update_page_number.php?page_number=${pageNumber}`)
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          window.location.href = 'home.php';
        } else {
          alert('Failed to update the session.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
      });
  });
});