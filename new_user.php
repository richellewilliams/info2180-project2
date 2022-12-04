<?php
session_start();

    echo "<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>New User</title>
            <link rel='stylesheet' href='newuser.css'>
            <script src='newuser.js'></script>
        </head>
        <body>
            <div class='grid-container'>
                <div id='header' class='grid-item'>
                <header>
                    <div class='flex-container'>
                    <div id='head' class='flex-item'>
                        <h1>&#128044; Dolphin CRM </h1>
                    </div>
                    </div>
                </header>
                </div>
                <main>
                    <div id='body' class='grid-item'>
                        <h2> New User</h2>                      
                        <form action='#' method='post'>
                            <div class='form-group'>
                                <div class='box'>
                                    <label for='fname'> First Name </label><br>
                                    <input type='text' id='fname' placeholder='John' required>
                                </div>
                                <div class='box'>
                                    <label for='lname'> Last Name </label><br>
                                    <input type='text' id='lname' placeholder='Doe' required>
                                </div>
                                <div class='box'>
                                    <label for='email'> Email </label><br>
                                    <input type='email' id='email' placeholder='something@example.com' required>
                                </div>
                                <div class='box'>
                                    <label for='password'>Password </label><br>
                                    <input type='password' id='password' placeholder='' required>
                                </div><br>
                                <div name='dropdown'> 
                                    <label style='padding: 7px;'>Role</label><br>
                                    <select name='role' id='role'>
                                        <option>Member</option>
                                        <option>Admin</option>
                                    </select><br><br>
                                </div>
                                <div id='button-section'>
                                    <button type='submit' id ='button' name='button'>Save</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                    <div id = 'show'></div>
                </main>
                <div id='sidebar' class='grid-item'>
                        <div class='buttonaside' id='home'>
                            <a href='dashboard.php'>Home</a>
                        </div>
                        <div class='buttonaside' id='newcontact'>
                            <a href='newcontact.php'>New Contact</a>
                        </div>
                        <div class='buttonaside' id='users'>
                            <a href='userlist.php'>Users</a>
                        </div>
                        <div class='buttonaside' id='logout'>
                            <a href='logout.php'>Logout</a>
                        </div>
                </div>
            </div>
        </body>
    </html>";
?>