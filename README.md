# To-Do List Project Documentation

## Project Overview
This is a web-based To-Do List application built with **PHP**, **MySQL**, and **jQuery**. It features a dark-themed interface, task management (add, edit, delete), and a simple admin authentication system.

## Project Structure
- **`index.php`**: The main entry point. It contains the HTML structure and loads tasks dynamically using AJAX.
- **`get.php`**: Handled backend logic for fetching tasks. **Crucially, this file also acts as the configuration file for database connections and admin credentials.**
- **`insert.php`, `update.php`, `delete.php`**: PHP scripts for handling CRUD operations on the database.
- **`login.php`**: A basic login page for admin access.
- **`data_base-file/todo-list.sql`**: The SQL dump file to create the necessary database tables.
- **`css/` & `js/`**: Contains styling and frontend scripts (Bootstrap, FontAwesome, custom scripts).

## Prerequisites
To run this project, you need a local server environment (like XAMPP, WAMP, or MAMP) with:
- **PHP** (Version 7.x or higher)
- **MySQL** or **MariaDB**
- **Apache** (or Nginx)

## Installation Guide

### 1. Setup the Files
Copy the entire `todo-list` directory to your web server's root directory (e.g., `htdocs` in XAMPP or `www` in WAMP).

### 2. Database Setup
1. Open your database management tool (e.g., **phpMyAdmin**).
2. Create a new empty database (e.g., named `todo_list_db`).
3. Import the provided SQL file:
   - Select your new database.
   - Go to the **Import** tab.
   - Choose the file: `data_base-file/todo-list.sql`.
   - Click **Go** to run the import.

### 3. Configuration
This application uses `get.php` to define database credentials via session variables.

1. Open `get.php` in a text editor.
2. Locate lines 6-10:
   ```php
   $_SESSION['admin'] = ''; // here set name the admin
   $_SESSION['domain'] = '';       // set name data base
   $_SESSION['user'] = '';         // user base data
   $_SESSION['password'] = '';     // data base password
   $_SESSION['database-name'] = ''; //data base name
   ```
3. Fill in your specific configuration:
   - **`$_SESSION['admin']`**: Set a secret string. This acts as **both** the username and password for the admin login.
   - **`$_SESSION['domain']`**: Usually `localhost`.
   - **`$_SESSION['user']`**: Your database username (e.g., `root`).
   - **`$_SESSION['password']`**: Your database password (leave empty if using default XAMPP).
   - **`$_SESSION['database-name']`**: The name of the database you created in Step 2 (e.g., `todo_list_db`).

   **Example Configuration:**
   ```php
   $_SESSION['admin'] = 'mySecretAdmin';
   $_SESSION['domain'] = 'localhost';
   $_SESSION['user'] = 'root';
   $_SESSION['password'] = '';
   $_SESSION['database-name'] = 'todo_list_db';
   ```

## How to Run
1. Start your Apache and MySQL servers.
2. Open your web browser and navigate to the project URL (e.g., `http://localhost/todo-list`).
3. You should see the main interface.

### Admin Access
1. Click the "تسجيل الدخول" (Login) button or go to `http://localhost/todo-list/login.php`.
2. Enter the value you set for `$_SESSION['admin']` in **both** the Name and Password fields.
3. Once logged in, you will have additional privileges to manage tasks.
