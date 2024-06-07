window.addEventListener("scroll", function () {
  var scrollPosition = window.scrollY;
  var background = document.querySelector(".background");
  background.style.top = -(scrollPosition * 0.5) + "px"; // Adjust the multiplier to control the parallax effect
});
