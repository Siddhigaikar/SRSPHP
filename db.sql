MariaDB [(none)]> CREATE DATABASE course_system;
Query OK, 1 row affected (0.002 sec)

MariaDB [(none)]> USE course_system;CREATE TABLE users (
Database changed
    ->     id INT AUTO_INCREMENT PRIMARY KEY,
    ->     name VARCHAR(100) NOT NULL,
    ->     email VARCHAR(100) UNIQUE NOT NULL,
    ->     password VARCHAR(255) NOT NULL,
    ->     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    -> );
Query OK, 0 rows affected (0.031 sec)

MariaDB [course_system]> CREATE TABLE courses (
    ->     id INT AUTO_INCREMENT PRIMARY KEY,
    ->     course_name VARCHAR(150) NOT NULL,
    ->     description TEXT NOT NULL,
    ->     duration VARCHAR(50) NOT NULL,
    ->     image VARCHAR(255),
    ->     user_id INT,
    ->     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    -> );
Query OK, 0 rows affected (0.016 sec)