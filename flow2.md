# Project Structure

```mermaid
%% DEFINITIONS ===================
graph TD
                classDef smallText font-size:12px;
                classDef tightSpacing spacing:0.5em;
                subgraph Components
                  subgraph Header
                    header_css[css]:::clickable
                    header_php[php]:::clickable
                  end
                  subgraph secured_menu
                    secured_menu_html[html]:::clickable
                    secured_menu_js[js]:::clickable
                  end
                end
                subgraph Global
                  debug_log[debug_log.txt]:::clickable
                  config[config.php]:::clickable
                  db[db.php]:::clickable
                end
                subgraph Index
                  A[Index.php]:::clickable
                  B[index.css]:::clickable
                  C[index.js]:::clickable
                end

                subgraph Authenticate
                  LO[Login]:::clickable
                  RE[Register]:::clickable
                end
                subgraph ItemRow
                  Item_master_row.css[Item_master_row.css]:::clickable
                  Item_master_row.php[Item_master_row.php]:::clickable
                end
                subgraph LocationRow
                  Location_row_php[Location_row.php]:::clickable
                end
                subgraph Security
                  D[Insecured]:::clickable
                  E[Secured_pages]:::clickable
                end
                subgraph Pages
                  SOH[soh_page.php]:::clickable
                  IM[item_master.php]:::clickable
                  LM[Location_master.php]:::clickable
                  STATS[stats.php]:::clickable
                  class SOH,IM,LM,STATS smallText;
                end
                HO[Home.php]:::clickable
                HO -.-> home_script[home_script.js]:::clickable
                HO -.-> home_styles[home_styles.css]:::clickable
                Index --> Security
                D --> Authenticate
                E --> HO
                LO --> HO
                HO --> Pages
                IM --> ItemRow
                LM --> LocationRow

```

## Project Files

- [Index.php](index.php)
- Components
  - Header
    - [header.php](developer/components/header/header.php)
    - [header.css](components/header/header.css)
    - [header.js](components/header/header.js)
  - Footer
    - [footer.php](components/footer/footer.php)
    - [footer.css](components/footer/footer.css)
    - [footer.js](components/footer/footer.js)
- Assets
  - CSS
    - [main.css](assets/css/main.css)
  - JS
    - [main.js](assets/js/main.js)
