# Program Flow
# Project Structure

```mermaid
graph TD
    A[Root] --> B[Components]
    A --> C[Assets]
    A --> D[Index.php]

    B --> E[Header]
    B --> F[Footer]

    E --> G[header.php]
    E --> H[header.css]
    E --> I[header.js]

    F --> J[footer.php]
    F --> K[footer.css]
    F --> L[footer.js]

    C --> M[css]
    C --> N[js]

    M --> O[main.css]
    N --> P[main.js]

    click A href "file:///F:/DEVELOPER/pages/secured_pages/soh_page/soh_page.php"
    
```
```mermaid

graph TD;
    A[Home] --> B[SOH Page];
    A --> C[Projects];
    A --> D[Location Master];
    A --> E[Item Master];
    A --> F[External Link];

    click A href "file:///F:/DEVELOPER/pages/secured_pages/soh_page/soh_page.php" "Open Home"
    click B href "file:///F:/DEVELOPER/pages/secured_pages/soh_page/soh_page.php" "Open SOH Page"
    click C href "vscode://file/F:/DEVELOPER/pages/secured_pages/projects.php" "Open Projects"
    click D href "vscode://file/F:/DEVELOPER/pages/secured_pages/location_master/location_master.php" "Open Location Master"
    click E href "vscode://file/F:/DEVELOPER/pages/secured_pages/item_master/item_master.php" "Open Item Master"
    click F href "https://www.externalwebsite.com" "Open External Link"
```
```mermaid
    flowchart LR
    A --> B
    WebserverA --> DatabaseserverA
    WebserverA -.-> DatabaseserverB

```

### Links to Open Files in Visual Studio Code

- [Home](vscode://file/F:/DEVELOPER/index.php)
- [SOH Page](vscode://file/F:/Main%20Website/soh_page/soh_page.php)
- [Projects](vscode://file/F:/Main%20Website/projects/projects.php)
- [Location Master](vscode://file/F:/Main%20Website/location_master/location_master.php)
- [Item Master](vscode://file/F:/Main%20Website/item_master/item_master.php)
- [External Link](https://www.externalwebsite.com)
