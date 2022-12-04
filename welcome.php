<link rel="stylesheet" href="loginPage.css">
</div>
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
        <tr>
          <th><?= 'Name'; ?></th>
          <th><?= 'Email'; ?></th>
          <th><?= 'Role'; ?></th>
          <th><?= 'Created'; ?></th>
        </tr>
    <?php foreach ($results as $row){ ?>
            <tr>
            <strong><td><?= $row['firstname'] . " " . $row['lastname'];?></td><strong>
            <td><?= $row['email']; ?></td>
            <td><?= $row['role']; ?></td>
            <td><?= $row['created_at']; ?></td> 
          </tr>
    <?php } ?>
    </table>