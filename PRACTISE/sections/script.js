// script.js

console.log("DOMContentLoaded");

document.addEventListener('DOMContentLoaded', function () {
    var scrollContainer = document.querySelector('.scroll-container');

    if (scrollContainer) {
        scrollContainer.addEventListener('scroll', function () {
            var header = document.getElementById('header');
            console.log("Scroll event triggered");
            console.log("Current scrollY:", scrollContainer.scrollTop); // Use scrollTop for elements

            if (scrollContainer.scrollTop > 50) {
                
                header.classList.add('scrolled');
            } else {
                
                header.classList.remove('scrolled');
            }

            if (scrollContainer.scrollTop > 1000) {
              
                header.classList.add('scrolled2');
            } else {
                
                header.classList.remove('scrolled2');
            }
        });
    } else {
        console.log("Scroll container not found");
    }
});