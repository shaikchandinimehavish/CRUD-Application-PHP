<?php
include 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM posts WHERE id=$id");
$row = $result->fetch_assoc();

if(isset($_POST['update']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query("UPDATE posts
                  SET title='$title',
                      content='$content'
                  WHERE id=$id");

    header("Location: view_posts.php");
}
?>

<form method="POST">

Title:
<input type="text"
name="title"
value="<?php echo $row['title']; ?>">

<br><br>

Content:
<textarea name="content"><?php echo $row['content']; ?></textarea>

<br><br>

<input type="submit"
name="update"
value="Update Post">

</form>