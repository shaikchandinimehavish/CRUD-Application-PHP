<?php
include 'db.php';

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username,password)
            VALUES('$username','$password')";

    if($conn->query($sql))
    {
        echo "Registration Successful!";
    }
    else
    {
        echo "Error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>User Registration</h2>

<form method="POST">
    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <input type="submit" name="register" value="Register">
</form>

<br>
<a href="login.php">Login Here</a>

</body>
</html>