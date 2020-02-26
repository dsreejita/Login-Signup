<?php
session_start();

$abc = "";

if(isset($_POST["submit"])){
    $_SESSION["username"]=$_POST["username"];
    $abc = $_SESSION["username"];
}
echo $abc;

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


$uname;$pw;

if(isset($_POST["username"])){
    $uname = $_POST["username"];
}

if(isset($_POST["pw"])){
    $pw = $_POST["pw"];
}

$check = $conn->prepare("select UserName, Password from user_info where UserName = ? and Password = ?");

$check->bind_param("ss", $uname, $pw);
$check->execute();

$check->bind_result($exists_uname, $exists_pw);
$check->fetch();


$check->close();

if(($exists_uname && $exists_pw) == TRUE){
    $conn->close();
}
else{
    echo 'User  doesnot exists.';
    $conn->close();
}




?>


<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='design.css' type='text/css'>
</head>
<body>
    <div>
    <h1>Login</h1>
    <h5>Please provide your credentials to login</h5>
    </div>
    <div class="form" method="POST">
    <form method = 'post' >
        <input type="text" name="username" placeholder="Enter User Name" required/><br>
        <input type="password" name="pw" placeholder="Enter Password" required/><br>
        <input type="submit" value="Login"/> <input type="button" value="Sign Up" onclick="window.location.href='Signup.php';"/>
        <?php echo $abc; ?>
</form>
    </div>
    <div class="bottom">
        <p>&copy; Copy Right. All Rights Reserved.</p>
    </div>
</body>
</html>