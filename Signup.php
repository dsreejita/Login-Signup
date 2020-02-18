<?php

$servername = "localhost";
$username = "Ataul";
$password = "Pwd@123";
$sqldbname = "sql_db";


// Create connection
$conn = new mysqli($servername, $username, $password,$sqldbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$uname;$name;$email;$pw;
$id = uniqid();

if(isset($_POST["username"])){
    $uname = $_POST["username"];
}

if(isset($_POST["name"])){
    $name = $_POST["name"];
}

if(isset($_POST["email"])){
    $email = $_POST["email"];
}

if(isset($_POST["pw"])){
    $pw = $_POST["pw"];
}

$check = $conn->prepare("select Email, UserName from user_info where Email = ? or UserName = ?");
$check->bind_param("ss", $email, $uname);
$check->execute();
$check->bind_result($exists_email, $exists_uname);
$check->fetch();
$check->close();

if($exists_email || $exists_uname){
    echo 'User Name or Email already exists.';
    $conn->close();
}
else{
$insert = $conn->prepare("insert into user_info(ID, UserName, Name, Email, Password) values(?, ?, ?, ?, ?)");
$insert->bind_param("sssss", $id, $uname, $name, $email, $pw );
$insert->execute();
$insert->close();
$conn->close();
}




?>


<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='design.css' type='text/css'>
<meta charset="UTF-8"/>
</head>
<body>
    <div>
    <h1>Sign Up</h1>
    <h5>Please provide the required information</h5>
    <div class="form">
    <form method = 'post' >
        <input type="text" name="username" placeholder="Enter User Name" required/><br>
        <input type="text" name="name" placeholder="Enter Full Name" required/><br>
        <input type="email" name="email" placeholder="Enter Email" required/><br>
        <input type="password" name="pw" placeholder="Enter Password" required/><br>
        <input type="submit" value="Sign Up"/> <input type="button" value="Login" onclick="window.location.href='login.php';"/>

    </form>
    </div>
    </div>
    <div class="bottom">
        <p>&copy; Copy Right. All Rights Reserved.</p>
    </div>
</body>
</html>