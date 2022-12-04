<?php
$host = 'localhost';
$username = 'admin';
$password = 'password123';
$dbname = 'dolphin_crm';
$id = 1;

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$stmt = $conn->query("SELECT * FROM contacts WHERE id LIKE '%$id%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$statement = $conn->query("SELECT c.title AS 'contact_title', c.firstname AS 'contact_firstname',
c.lastname AS 'contact_lastname', u.firstname AS 'users_firstname', u.lastname AS 'users_lastname'
FROM contacts c
INNER JOIN users u
ON c.created_by = u.id
WHERE c.id LIKE '%$id%'");
$createdByResults = $statement->fetchAll(PDO::FETCH_ASSOC);

$statemnt = $conn->query("SELECT user.firstname AS 'users_firstname', user.lastname AS 
'users_lastname', n.comment AS 'comment', n.created_at AS 'created_at'
FROM notes n
INNER JOIN users user
ON n.created_by = user.id;");
$notesResults = $statemnt->fetchAll(PDO::FETCH_ASSOC);

?><?php foreach ($results as $row):?><?php endforeach;?>
<?php foreach ($createdByResults as $r):?><?php endforeach;?>
<?php foreach ($notesResults as $rw): ?><?php endforeach;?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contact Details</title>
    <link rel="stylesheet" href="view-contact-details.css">
    <script src="view-contact-details.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
    <header>
        <p>&#128044; Dolphin CRM</p>
    </header>
    <aside>
        <ul>
            <li><a href='dashboard.php'>Home</a></li>
            <li><a href='newcontact.php'>New Contact</a></li>
            <li><a href='userlist.php'>Users</a></li>
            <li><a href='logout.php'>Logout</a></li>
        </ul> 
    </aside>
    <main>
        <section>
            <div id="current-contact">
                <div class="current-ctact">
                    <h2 class="title-firstname-lastname"> <?=$row['title']?> <?= $row['firstname']?> <?= $row['lastname']?></h2>
                    <p class="created-at">Created on <?php $createdDate = new DateTime($row['created_at']);
                    echo $createdDateResult = $createdDate->format('F j, Y');
                    ?> by <?= $r['users_firstname']?> <?= $r['users_lastname']?></p>
                    <p class="updated-at">Updated on <?php $updatedDate = new DateTime($row['updated_at']);
                    echo $updatedDateResult = $updatedDate->format('F j, Y');
                    ?></p>
                </div>
                <div class="assignment-buttons">
                    <button id="assignButton" action="process-assign-to-me-button.php" method="get">Assign to me</button>
                    <button id="switchButton" action="process-switch-button.php" method="get">Switch to <?php                    
                    if ($row['type'] == "Sales Lead") {
                      echo $type = "Support"; 
                    } elseif ($row['type'] == "Support")  {
                      echo $type = "Sales Lead"; 
                    }
                    ?></button>     
                </div>
            </div>           
        </section>   
        <section id="contact-details">
            <div class="contact-details">
                <div class="email">
                    <p>Email</p> 
                    <p class="email-result"><?= $row['email']?></p>                   
                </div>
                <div class="company">
                    <p>Company</p>
                    <p class="company-result"><?= $row['company']?></p>
                </div>
                <div class="telephone">
                    <p>Telephone</p>  
                    <p class="telephone-result"><?= $row['telephone']?></p>
                </div>
                <div class="assigned-to">
                    <p>Assigned To</p>  
                    <p class="assigned-to-result"><?= $r['users_firstname']?> <?= $r['users_lastname']?></p>
                </div>
            </div>       
        </section>
        <section>
            <div class="notes-section">
                <div class="notes">
                    <p>Notes</p>
                </div>
                <hr>
                <div class="created-notes">
                    <p class="created-by"><?= $rw['users_firstname']?> <?= $rw['users_lastname']?></p>
                    <p class="comment"><?= $rw['comment']?></p>
                    <p id="created-at-notes"><?php $date = new DateTime($rw['created_at']);
                    echo $createdDateResult = $createdDate->format('F j, Y');?> at <?php $time = new DateTime($rw['created_at']);
                    echo $createdTimeResult = $createdDate->format('ga');?></p>
                    <p id="notes-created-by"></p>
                    <p id="notes-entered-by-user"></p>
                    <p id="notes-created-at"></p>
                </div>
                <div class="note-details">
                    <div class="note-msg">
                        <p>Add a note about <?= $row['firstname']?></p>
                    </div>
                    <div class="note-for-user">
                    <form action="" method="post">
                        <textarea type="text" name="notes" id="notes" placeholder="Enter details here" rows="6" method="post"></textarea>
                        <button id="addNoteButton">Add Note</button>
                    </form>
                    </div>
                </div>
            </div>
        </section>
    </div> 
    </section>
    </main>
</div>
</body>
</html>