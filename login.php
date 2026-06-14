<?php
session_start();
include 'db.php';

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password']))
        {
            $_SESSION['username'] = $username;
            header("Location: add_post.php");
            exit();
        }
        else
        {
            echo "Wrong Password!";
        }
    }
    else
    {
        echo "User Not Found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">
</form>

</body>
</html>