// The below script is specifaclly for the home PROJECTs page which isnt showing at the moment

async function fetchBitcoinPrice() {
  const apiUrl = "https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd";

  try {
    const response = await fetch(apiUrl);
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    // Parse the JSON response
    const data = await response.json();
    const bitcoinPriceUSD = data.bitcoin.usd;

    // Display the Bitcoin price
    document.getElementById('bitcoin-price').textContent = `BTC/USD: $${bitcoinPriceUSD}`;
  } catch (error) {
    // Handle any errors
    document.getElementById('bitcoin-price').textContent = "Failed to load Bitcoin price";
    console.error("Error fetching Bitcoin price:", error);
  }
}
// Call the function on page load
fetchBitcoinPrice();
// Function to open a path in Visual Studio Code using the 'vscode://' protocol
function openInVsCode(hrefPath) {
  const cleanPath = hrefPath.replace(/\.html$|\.php$/i, '');
  window.location.href = `vscode://file/${hrefPath}`;
}
// Attach click event listeners to all elements with the 'open-vscode' class
const vscodeIcons = document.querySelectorAll('.yellow-folder');
vscodeIcons.forEach((icon) => {
  icon.addEventListener('click', function () {
    // Find the associated anchor with the nearest 'vscode-link' class
    const anchor = icon.previousElementSibling;

    // If the previous sibling isn't an anchor with the 'vscode-link' class, search more widely
    if (anchor && anchor.classList.contains('vscode-link')) {
      const hrefPath = anchor.getAttribute('href');
      openInVsCode("f://DEVELOPER/" + hrefPath);
    } else {
      console.error('No associated anchor found for this icon.');
    }
  });
});
// ****** End Home projects section of the script