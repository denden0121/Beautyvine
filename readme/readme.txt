======================================================
BEAUTYVINE - LOCAL INSTALLATION AND SETUP INSTRUCTIONS
======================================================

This document provides instructions for setting up and running the BeautyVine web application on a local development environment using XAMPP.

------------------------------------------------------
1. SYSTEM REQUIREMENTS
------------------------------------------------------
- XAMPP
- PHP 
- A modern web browser

------------------------------------------------------
2. DATABASE SETUP
------------------------------------------------------
1. Launch the XAMPP Control Panel.
2. Start the following services:
   - Apache
   - MySQL
3. Open your web browser and navigate to:
   http://localhost/phpmyadmin
4. Create a new database (if not automatically created) or simply import the existing one.
5. Click the **Import** tab in phpMyAdmin.
6. Choose the SQL file you exported (e.g., `beautyvine.sql`).
7. Click **Go** to import the database.

------------------------------------------------------
3. PROJECT FILE SETUP
------------------------------------------------------
1. Copy the entire folder named **beautyvine**.
2. Paste it inside your XAMPP **htdocs** directory.  


------------------------------------------------------
4. RUNNING THE APPLICATION
------------------------------------------------------

Ensure Apache and MySQL are running in XAMPP.

Open your web browser and navigate to:
http://localhost/beautyvine

The BeautyVine application should now load on your local environment.

LOGIN INFORMATION (This is for the admin account)

Username: admin@gmail.com
Password: 123



