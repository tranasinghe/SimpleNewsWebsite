
Synopsis
---------
This is a very basic MVC web application. MVC layout is a custom library which is developed by myself and it has essencial set of classes only. MVC library could find under `Lib` directory.

I have used Bootsratp and JQuery for the frontend. 

I have attached architectural diagram whicth depict the structrue of the web application.

Server Requirements
----------
Apache 2.4.7<br/>
MySQL 5.5<br/>
PHP 5.5.9<br/>

How to Setup
------------

Restore the database, db backup file in `database/news_site.sql`. Then setup database connection in `App/Config/database.php`. Once configureation are done create a vertualhost on apache webserver


`<VirtualHost *:80>`

    ServerAdmin [xxx]@[yy].com
    ServerName mymvc.localhost
    
    DocumentRoot [PATH TO PROJECT FOLDER]/public
    <Directory [PATH TO PROJECT FOLDER]/public>
        Order allow,deny
        Allow from All
        #Deny from 94.180.196.247
        AllowOverride None
        Require all granted

        #Disable directlry browsing
        Options  Indexes FollowSymLinks

        RewriteEngine On
        RewriteBase /

        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)$ /index.php?url=$1 [L,QSA]
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>`

Further Improvements
-------
1. FormValidation<br/>
2. CSRF Validation<br/>
3. Exeception Handling<br/>
4. Custom Error Pages (404, 500 etc..)<br/>
5. Improve Models to follow convention to find relared relation in the database<br/>
6. Implement Caching mechanisam(use APC to cache view contenst, memcache or rediss to cache data in models to reduce db calls)<br/>
7. Implemet router class to construct seo frendly urls<br/>

