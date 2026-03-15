<?php
include 'config.php';

$db->exec("CREATE TABLE IF NOT EXISTS students(
id INTEGER PRIMARY KEY AUTOINCREMENT,
name TEXT,
roll_no TEXT UNIQUE,
blood_group TEXT,
photo_path TEXT,
email TEXT,
phone TEXT,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$db->exec("CREATE TABLE IF NOT EXISTS books(
id INTEGER PRIMARY KEY AUTOINCREMENT,
title TEXT,
author TEXT,
isbn TEXT,
type TEXT,
quantity INTEGER,
digital_url TEXT
)");

$db->exec("CREATE TABLE IF NOT EXISTS issues(
id INTEGER PRIMARY KEY AUTOINCREMENT,
student_id INTEGER,
book_id INTEGER,
issue_date DATETIME,
due_date DATETIME,
return_date DATETIME,
fine REAL,
status TEXT
)");

$count = $db->query("SELECT COUNT(*) FROM students")->fetchColumn();

if($count==0){

$db->exec("INSERT INTO students(name,roll_no,blood_group,email,phone) VALUES
('Ram Prasad Shrestha','10A001','O+','ram@xyz.com','984123'),
('Sita Kumari Thapa','10A005','A+','sita@xyz.com','985123')
");

$db->exec("INSERT INTO books(title,author,isbn,type,quantity) VALUES
('Muna Madan','Devkota','111','physical',10),
('Atomic Habits','James Clear','222','physical',5)
");

echo "<div class='alert alert-success'>Demo Data Loaded</div>";
}
?>