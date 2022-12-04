<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listed Users Page</title>
    <link rel="stylesheet" href="loginPage.css">
    <header>&#x1F42C Dolphin CRM</header>
</head>
<body>
     <div class="container">   
       
        <div class="flex-container">

            <div id="home" class="flex-item">
                <a href="dashboard.php">Home</a>  
            </div>

            <div id="newContact" class="flex-item">
                <a href="newcontact.php">New Contact</a>
            </div>

            <div id="Users" class="flex-item">
                <a href="userlist.php">Users</a>
            </div>

            <div id="logout" class="flex-item">
                <a href="logout.php">Logout</a>
            </div>

        </div>
        <main>
          
            <div class="result">
                <h1>Users</h1> 
                <button type="button" id="user"><a href="new_user.php">  + Add User</a></button>
                <?php include"welcome.php"; ?>  
            </div>
</div>
            
        </main> 
        </div>  
</body>
</html>
