CREATE DATABASE school_orders;
USE school_orders;
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_class VARCHAR(255),
  sandwich VARCHAR(255)
);