<?php
$host = 'localhost';
$username = 'admin';
$password = 'password123';
$dbname = 'dolphin_crm';
$id = 1;

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$statement = $conn->query("UPDATE contacts INNER JOIN users 
ON contacts.created_by = users.id
SET assigned_to = 4"); //change number using GET
$update = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $conn->query("SELECT updated_at FROM contacts FOR UPDATE;
UPDATE contacts SET updated_at=CURRENT_TIMESTAMP WHERE id=1 SELECT CURRENT_TIMESTAMP");
$updatedDate = $statement->fetchAll(PDO::FETCH_ASSOC);

?><?php foreach ($updatedDate as $row): ?><?php endforeach;

if ($_SERVER['REQUEST_METHOD'] === 'GET')  {;
    echo date('F j, Y', strtotime($row['updated_at']));
}?>