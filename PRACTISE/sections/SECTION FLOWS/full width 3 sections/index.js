var side_panal_locked = false;

document.addEventListener('DOMContentLoaded', function () {
    var button = document.getElementById('panal1-button');
    const sidePanel = document.getElementById('side-panel');

    // Toggle lock state when the button is clicked
    button.addEventListener('click', function (e) {
        e.preventDefault();
        side_panal_locked = !side_panal_locked;
        console.log('Side Panel Locked:', side_panal_locked);
    });

    // Show side panel when mouse hovers over the left edge
    document.addEventListener('mousemove', function (e) {
        if (e.pageX < 20 && !side_panal_locked) {
            sidePanel.classList.add('active');
        }
    });

    // Hide side panel when the mouse leaves and panel is not locked
    sidePanel.addEventListener('mouseleave', function () {
        if (!side_panal_locked) {
            sidePanel.classList.remove('active');
        }
    });
});


