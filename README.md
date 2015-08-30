# diemproject

This is a personal stylist website and management system developed using the MVC architecture, where the 'src' folder contains all of the system's backend part and the 'web' folder contains all of the system's frontend part (The whole system is located inside the 'AngelaFinal' directory).

This dynamic website and system was developed using the following technologies:
- PHP 5.5;
- Javascript & JQuery;
- AJAX;
- HTML5 & CSS3;
- MySQL.


# Hosting the system:

1. The files which you must upload in your hosting website or localhost application server are inside the 'AngelaFinal' directory;
2. There is a script in the 'database' folder, including the whole database schema. Before import the database script, you shall create a database in your MySQL SGBD;
After importing the database script, you must change the database connection class 'src/persistenceDAOPdo/connectionDAOPdo.php'. You are going to change the following variables:

- $dbname = "your_databse";
- $dbusername = "your_database_username";
- $dbhost = "database_ip_or_hostname";
- $dbpassword = "your_database_username_password";
