## Dynamic Login for Contao Bundle (Contao 5)

The module provides a dynamic login form for Contao, loaded via a button click and displayed in an iFrame. This prevents the main page from reloading with incorrect login attempts. Upon successful login, the user is automatically redirected, triggering a full page reload.


**DE** Das Modul ermöglicht ein dynamisches Login-Formular für Contao, das per Klick nachgeladen und in einem iFrame angezeigt wird. Dadurch bleibt die Hauptseite bei falschen Eingaben unverändert. Bei korrekter Eingabe der Login-Daten erfolgt eine automatische Weiterleitung, die die Seite neu lädt.


## Module Setup

### 1. Create a New Page Layout
In Contao, create a new page layout without headers, footers, columns, or blocks. Integrate the article module into the main area.

### 2. Create a New Page and Assign the Layout
Create a new page and assign the newly created layout to it. This page will later be loaded into the iFrame.

### 3. Create a Frontend Module (Login Form)
Create a new frontend module (login form) and under **"This module is included on the (iFrame)-Page"**, select the newly created page for the iFrame.

### 4. Configure the Root Page
Navigate to the root page (Website root) and select the corresponding login module from the dropdown menu labeled **"This page includes the login iframe"**.

### 5. Add a Button to Load the iFrame in the Frontend
Add a button in the frontend that loads the iFrame with the login form. Use the class `.js-openLoginFrame`.

#### Example:

```html
<button class="js-openLoginFrame">Load Login iFrame</button>
```

You can also add the class `.js-openLoginFrame` to the navigation (page structure) to load the iFrame in the same way.


## Install

Copy to:  
root  
\- src  
\- - hh-com  
\- - - contao-dynamiclogin  

Update your contao installation composer.json
``` code
"repositories": [
    {
        "type": "path",
        "url": "src/hh-com/contao-dynamiclogin",
        "options": {
                "symlink": true
        }
    }
],
"require": {
    ...
    "hh-com/contao-dynamiclogin": "@dev",
    ... 
}
```