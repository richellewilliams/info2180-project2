
<?php
$host = 'localhost';
$username = 'admin';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM users");


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

    <table id="Users">
        <tr>s
          <th><?= 'Name' ?></th>
          <th><?= 'Email'?></th>
          <th><?= 'Company' ?></th>
          <th><?= 'Type' ?></th>
        </tr>
    <?php foreach ($results as $row){ ?>
            <tr>
            <strong><td><?= $row['firstname'] . " " . $row['lastname'];?></td><strong>
            <td><?= $row['email']; ?></td>
            <td><?= $row['company']; ?></td>
            <td><?= $row['type']; ?></td> 
          </tr>
    <?php } ?>
    </table>