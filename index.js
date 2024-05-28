 type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "WebPage",
      "name": "Home Harmony",
      "description": "A comprehensive dashboard for managing your home efficiently.",
      "author": {
        "@type": "Person",
        "name": "Jericho Sharman"
      }
    }
    // Function to update the date and time display
    function updateDateTime() {
      const now = new Date();
      const formattedDateTime = now.toLocaleString(); // Format can be customized as needed
      document.getElementById('datetime').textContent = formattedDateTime;
    }

    // Set interval to update the date and time every second
    setInterval(updateDateTime, 1000);

    // Initial call to set the date/time immediately on page load
updateDateTime();
function toggleSections() {
  const loginSection = document.getElementById('login-section');
  const registerSection = document.getElementById('register-section');
  loginSection.classList.toggle('not-active');
  registerSection.classList.toggle('not-active');
}
function validatePassword() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm-password").value;
  if (password !== confirmPassword) {
    alert("Passwords do not match.");
    return false;
  }
  return true;
}
 