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
    <div class="form">
    <form method = 'post' >
        <input type="text" name="username" placeholder="Enter User Name" required/><br>
        <input type="password" name="pw" placeholder="Enter Password" required/><br>
        <input type="submit" value="Login"/> <input type="button" value="Sign Up" onclick="window.location.href='Signup.php';"/>
</form>
    </div>
    <div class="bottom">
        <p>&copy; Copy Right. All Rights Reserved.</p>
    </div>
</body>
</html>