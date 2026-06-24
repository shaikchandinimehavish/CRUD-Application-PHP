<?php
include 'db.php';
$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];
}

$limit = 3;

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($page - 1) * $limit;

$result = $conn->query("SELECT * FROM posts
WHERE title LIKE '%$search%'
LIMIT $start, $limit");
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>View Posts</title>
</head>
<body>
<div class="container mt-4">
<h2>All Posts</h2>
<form method="GET" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Search posts"><br>
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<table class="table table-bordered table-striped">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Content</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['content']; ?></td>

    <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

        <a href="delete.php?id=<?php echo $row['id']; ?>">
            Delete
        </a>
    </td>
</tr>

<?php } ?>

</table>
<?php

$total_result = $conn->query("SELECT COUNT(*) as total FROM posts");
$total_row = $total_result->fetch_assoc();

$total_posts = $total_row['total'];

$total_pages = ceil($total_posts / $limit);

for($i = 1; $i <= $total_pages; $i++)
{
    echo "<a href='?page=$i'>$i</a> ";
}

?>

<br>
<a href="add_post.php">Add New Post</a>
</div>
</body>
</html>