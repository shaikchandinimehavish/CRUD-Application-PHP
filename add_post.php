<?php
session_start();
include 'db.php';

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts(title, content)
            VALUES('$title','$content')";

    if($conn->query($sql))
    {
        echo "Post Added Successfully!";
    }
}
?>

<h2>Welcome <?php echo $_SESSION['username']; ?></h2>

<form method="POST">
    Title:
    <input type="text" name="title" required><br><br>

    Content:
    <textarea name="content" required></textarea><br><br>

    <input type="submit" name="submit" value="Add Post">
</form>

<br>

<a href="view_posts.php">View Posts</a><br><br>
<a href="logout.php">Logout</a>