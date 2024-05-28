document.addEventListener('DOMContentLoaded', function () {
    var sections = document.querySelectorAll('[id^="section-"]');
    sections.forEach(section => {
    fetch(`./sections/${section.id}.html`) // Adjust the path as necessary
        .then(response => response.text()) // Convert the response to text
        .then(html => {
            section.innerHTML = html; // Insert the HTML content into the section
        })
        .catch(error => console.error('Error loading the section:', error));
    });
})
document.addEventListener('DOMContentLoaded', function () {
    var sections = document.querySelectorAll('.navbar');
    
    sections.forEach(section => {
        fetch(`../components/nav-bar.html`) // Adjust the path as necessary
            .then(response => response.text()) // Convert the response to text
            .then(html => {
                section.innerHTML = html; // Insert the HTML content into the section
            })
            .catch(error => console.error('Error loading the section:', error));
    });
})
document.addEventListener('DOMContentLoaded', function () {
    var sections = document.querySelectorAll('.site-footer');

    sections.forEach(section => {
        fetch(`../components/footer.html`) // Adjust the path as necessary
            .then(response => response.text()) // Convert the response to text
            .then(html => {
                section.innerHTML = html; // Insert the HTML content into the section
            })
            .catch(error => console.error('Error loading the section:', error));
    });
})
document.addEventListener("DOMContentLoaded", function () {
    var scrollLinks = document.querySelectorAll('.nav-link');
    scrollLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default anchor behavior
            const href = this.getAttribute('href');
            const offsetTop = document.querySelector(href).offsetTop;

            scroll({
                top: offsetTop,
                behavior: "smooth"
            });
        });
    });
});