# Cmon IoT CI-with-HMVC
Setup HMVC and local session storage with Codeigniter 3

Modules are groups of independent components, typically model, controller and view, arranged in an application modules sub-directory that can be dropped into other Codeigniter applications. This allows easy distribution of independent components (MVC) in a single directory across other CodeIgniter applications

 ![theme](https://github.com/user-attachments/assets/d4715832-7613-423a-99c7-9b3360dc1b52)


# Updated for PHP 8
# 
# PHP Version 8.2.27
# redis
```bash

$('document').ready(function () {
 setInterval(function () {getRealData()}, 1000);//request every x seconds

 }); 

function getRealData() {
$.ajax({
         url: "number.php",
         type: "POST",
         data: {
             name: name
         },
         cache: false,
         success: function () {
             /// some code to get result
         }
     }
 }

# postgreSQL

1.First enable these two extensions
extension=php_pgsql.dll
extension=php_pdo_pgsql.dll
2.Then restart apache
3.Add $db['default']['port'] = 5432 in 

# sqlite
extension=php_pdo_sqlite.dll
extension=php_sqlite3.dll
``` 
