<?php
$host = 'localhost';
$username = 'admin';
$password = 'password123';
$dbname = 'dolphin_crm';
$id = 1;

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$stmt = $conn->query("SELECT c.firstname AS 'contacts_firstname', c.lastname AS 
'contacts_lastname', n.comment AS 'comment', u.firstname AS 'users_firstname', 
u.lastname AS 'users_lastname' FROM notes n INNER JOIN contacts c ON n.id = c.id 
INNER JOIN users u ON n.created_by = u.id;");
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?><?php foreach ($notes as $row): ?><?php endforeach;
echo $row['users_firstname'];
echo " ";
echo $row['users_lastname'];?>