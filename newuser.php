<?php 


$host = 'localhost';
$username = 'admin';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$pword = $_GET['password'];
$role = $_GET['role'];


$fname = trim(filter_var($fname, FILTER_UNSAFE_RAW));
$lname = trim(filter_var($lname, FILTER_UNSAFE_RAW));
$email = trim(filter_var($email, FILTER_UNSAFE_RAW));
$pword = trim(filter_var($pword, FILTER_UNSAFE_RAW));
$role = filter_var($role, FILTER_UNSAFE_RAW);


if(empty($fname)){
    echo '<span style= "color: red;"> Please enter a value for First Name.</span>';
    return;
}else if(!preg_match('/^[a-zA-Z\s]+$/',$fname))
{
    echo '<span style= "color: red;"> First Name must be letters only.</span>';
    return;
}else{
    $fname= mysqli_real_escape_string($conn, $fname);
}

if(empty($lname)){
    echo '<span style= "color: red;"> Please enter a value for Last Name.</span>';
    return;
}else if(!preg_match('/^[a-zA-Z\s]+$/',$lname))
{
    echo '<span style= "color: red;"> Last Name must be letters only.</span>';
    return;
}else{
    $lname= mysqli_real_escape_string($conn, $lname);
}

if(empty($pword)){
    echo '<span style= "color: red;"> Please enter a value for Password.</span>';
    return;
}else if(!preg_match('@[A-Z]@', $pword)) {
    echo '<span style= "color: red;"> Your Password must contain at least 1 uppercase letter'.'<br>';
    return;
}else if(!preg_match('@[a-z]@', $pword)){
    echo '<span style= "color: red;"> Your Password must contain at least 1 lowercase letter'.'<br>';
    return;
}else if(!preg_match('@[0-9]@', $pword)){
    echo '<span style= "color: red;"> Your Password must contain at least 1 number'.'<br>';
    return;
}else if(strlen($pword) < 8){
    echo '<span style= "color: red;"> Your Password should be at least 8 characters in length'.'<br>';
    return;
}else{
    echo 'Strong password'.'<br>';
    $pword = password_hash($pword, PASSWORD_DEFAULT);
    $pword = mysqli_real_escape_string($conn, $pword);
}

if(empty($email)){
    echo '<span style= "color: red;"> Please enter a value for email.</span>';
    return;
}else if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
    echo '<span style= "color: red;"> Email must be a valid email address.</span>';
    return;
}else{
    $email = mysqli_real_escape_string($conn, $email);
}

if($role === "None")
{
    echo '<span style= "color: red;"> Plese select a Role.</span>';
    return;
}else{
    $role= mysqli_real_escape_string($conn, $role);
}


$sql = "INSERT INTO users (firstname, lastname, password, email, role) VALUES ('$fname', '$lname', '$pword', '$email', '$role')";


if(mysqli_query($conn,$sql)){
    echo'Added to the database';
}else{
    echo"Didn't write to database";
}

mysqli_close($conn); 

?>