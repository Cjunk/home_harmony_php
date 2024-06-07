window.onload = function () {
    setTimeout(function () {
        console.log("Delayed initialization.");
        initializeGallery();
    }, 100);  // Delay in milliseconds
};

function initializeGallery() {
    const imageRow = document.getElementById('imageRow');
    const images = imageRow ? imageRow.innerHTML : '';
    if (imageRow && images) {
        imageRow.innerHTML += images; // Duplicates the innerHTML
    }

    document.querySelectorAll('.image-row img').forEach(img => {
        img.onclick = function () {
            const modal = document.getElementById('myModal');
            const modalImg = document.getElementById('img01');
            modal.style.display = "flex";  // Uses flexbox to center the content
            modalImg.src = this.src;
            modalImg.alt = this.alt;
            document.getElementById('caption').textContent = this.alt;
        };
    });

    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function () {
        modal.style.display = "none";
    }
};





