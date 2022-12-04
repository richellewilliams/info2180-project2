
    <?php
    $host = 'localhost';
    $username = 'admin';
    $password = 'password123';
    $dbname = 'dolphin_crm';
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->query("SELECT * FROM users");
    
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $e = $_POST['email'];
        $pwd = $_POST['password'];
        if ($e === "admin@project2.com" && $pwd === "password123" ||  $e === "admin2@project2.com" && $pwd === "password112"
        || $e === "admin3@project2.com" && $pwd === "password113"|| $e === "admin4@project2.com" && $pwd === "password114"
        || $e === "admin5@project2.com" && $pwd === "password115") 
        {
           
            foreach ($results as $row){
                echo strcmp($row['email'], $e);
                if( $row['email'] == $e )
                    echo $row['email'] == $e;
                {    
                    if($row['role'] == "admin"){
                        header("Location:dashboard.php");
                        break;
                    }  
            }
             
        }
        }
    }    
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="loginPage.css">
       
    </head>
    <body>
    <header>🐬 Dolphin CRM</header>
    <main>
    <h1 id = "login">Login</h1>
        <form action="login.php" method="post">
            <div class="form">    
                <input type="text" placeholder="Email address" name="email" id="email" >     
                <input type="password" placeholder="Password" name="password" id="password">
                <button type="submit">Login</button>  
            </div>     

        </form>
        <div class="result"></div>
    </main> 
    <?php include"loginFooter.php"; ?>  
</body>
</html>