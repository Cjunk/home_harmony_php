/*  The navigation script written by Jericho Sharman
    This will generate a navigation menu from the theNavMenu.js array of objects

    Files required:
        theNavMenu.js  (contains the menu structure and functions)
        

*/
function test(e) {
    console.log(e)
}
import { theMenu } from './theNavMenu.js';
const unorderedList = document.querySelectorAll(".the-list li")
const navigationMenu = document.querySelector(".navigation-menu");
unorderedList.forEach(item => {
    item.addEventListener("click", () => {
        console.log("clicked", item.textContent)
    });
});
function addMenu(menu_) { /* Adds an individual Menu*/
    // function to add a simple menu to the already existing menu bar
    const newDiv = document.createElement("div")
    const newButton = document.createElement("button")
    const newMenu = document.createElement("ul");
    newDiv.classList.add("dropdown");
    newButton.classList.add("dropbtn");
    newMenu.classList.add('the-list', 'dropdown-content')
    newButton.textContent = menu_.title;
    if (menu_.menuItems) {
        menu_.menuItems.forEach(item => {
            let newItem = document.createElement("li");
            let newItema = document.createElement("a");
            newItema.textContent = item.title;
            newItem.appendChild(newItema);

            newItem.addEventListener("click", function (e) {
                if (item.function) {
                    item.function(item.id); // Execute the function specified in the menu item
                }
            });

            newMenu.appendChild(newItem);
        });
    }
    else {
        newMenu.classList.remove('dropdown-content');
        newButton.addEventListener("click", function (e) {
            menu_.function(menu_.id)
        });
    }
    newButton.appendChild(newMenu)
    newDiv.appendChild(newButton)
    navigationMenu.appendChild(newDiv);
}
function addNavigationMenus(theNavMenu) {
    theNavMenu.forEach(menu => {
        addMenu(menu)
    })
}
addNavigationMenus(theMenu)
export { test };