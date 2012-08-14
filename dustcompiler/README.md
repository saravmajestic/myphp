PHP Compiler for Dust.js
====================================

This is a simple compiler for compiling [DUST][1] templates before rendering to the page.


Prerequisites
--------------------------------
 1. PHP running on Apache server
 2. All dust templates should have ".dust" extension. Ex: **first.dust**

 
Basic Usage
-----------
 1. Deploy the dustcompiler folder to your apache htdocs folder(your document root)
 2. Load index.html in browser. Ex: **http://[servername]/dustcompiler**
 3. Select your source folder which contains your dust templates
 4. Select your destination folder, where the compiled templates should be saved
 5. Click the "compile" button
 6. Compiled files will be listed and error will be notified,if any.


  [1]: http://akdubya.github.com/dustjs/

Issues
=======
Report issues/features on github, please.