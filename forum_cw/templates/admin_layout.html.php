<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="../posts.css">
</head>
<body>
    <header id="admin">
        <h1>Forum Coursework 2026 Admin Area<br />
    Manage posts, modules and users</h1></header>
    <nav>
        <ul>
            <!-- <li><a href="index.php">Home</a></li> -->
            <li><a href="posts.php">Posts</a></li>
            <li><a href="addpost.php">Add a new post</a></li>
            <li><a href="../index.php">Public Site</a></li>
        </ul>
    </nav>
    <main>
        <?=$output?>
    </main>
    <footer>&copy; FCW 2026</footer>
</body>
</html>