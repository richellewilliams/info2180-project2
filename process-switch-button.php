<?php
$host = 'localhost';
$username = 'admin';
$password = 'password123';
$dbname = 'dolphin_crm';
$id = 1;

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$stmt = $conn->query("SELECT * FROM contacts WHERE id LIKE '%$id%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$statement = $conn->query("UPDATE `contacts` set `type` = 'Support' where
`type` = 'Sales Lead';");

$statement = $conn->query("UPDATE `contacts` set `type` = 'Sales Lead' where
`type` = 'Support';");

?><?php foreach ($results as $row):?><?php endforeach;

if ($row['type'] == "Sales Lead") {
    $changeToSupport = $statement->fetchAll(PDO::FETCH_ASSOC);
  } elseif ($row['type'] == "Support")  {
    $changeToSalesLead = $statement->fetchAll(PDO::FETCH_ASSOC);
}
$statement = $conn->query("SELECT updated_at FROM contacts FOR UPDATE;
UPDATE contacts SET updated_at=CURRENT_TIMESTAMP WHERE id=1 SELECT CURRENT_TIMESTAMP");
$updatedDate = $statement->fetchAll(PDO::FETCH_ASSOC);

?><?php foreach ($updatedDate as $row): ?><?php endforeach;

if ($_SERVER['REQUEST_METHOD'] === 'GET')  {;
    echo date('F j, Y', strtotime($row['updated_at']));
}?>