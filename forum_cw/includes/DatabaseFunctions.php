<?php
function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function totalPosts($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM post');
    $row = $query->fetch();
    return $row[0];
}

function getPost($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM post WHERE id = :id', $parameters);
    return $query->fetch();
}

function updatePost($pdo, $id, $post_text, $userid, $moduleid, $image){
    $query = 'UPDATE post SET post_text = :post_text, userid = :userid, moduleid = :moduleid, image = :image WHERE id = :id';
    $parameters = [':post_text' => $post_text, ':userid' => $userid, ':moduleid' => $moduleid, ':image' => $image, ':id' => $id];
    query($pdo, $query, $parameters);
}

function deletePost($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM post WHERE id = :id', $parameters);
}

function insertPost($pdo, $post_text, $image, $userid, $moduleid){
    $query = 'INSERT INTO post SET 
    post_text = :post_text,
    post_date = CURDATE(),
    image = :image,
    userid = :userid,
    moduleid = :moduleid';
    
    $parameters = [':post_text' => $post_text, ':image' => $image, ':userid' => $userid, ':moduleid' => $moduleid];
    query($pdo, $query, $parameters);
}

function allUsers($pdo){
    $users = query($pdo, 'SELECT * FROM user');
    return $users->fetchAll();
}

function allModules($pdo){
    $modules = query($pdo, 'SELECT * FROM module');
    return $modules->fetchAll();
}

function allPosts($pdo){
    $posts = query($pdo, 'SELECT post.id, post_text, user.name, email, module.name AS module, post_date, image FROM post
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id');
    return $posts->fetchAll();
}

function insertUser($pdo, $name, $email){
    $query = 'INSERT INTO user SET
    name = :name,
    email = :email';

    $parameters = [':name' => $name, ':email' => $email];
    query($pdo, $query, $parameters);
}

function insertModule($pdo, $name){
    $query = 'INSERT INTO module SET
    name = :name';

    $parameters = [':name' => $name];
    query($pdo, $query, $parameters);
}

function totalUsers($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM user');
    $row = $query->fetch();
    return $row[0];
}

function getUser($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM user WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateUser($pdo, $id, $name, $email){
    $query = 'UPDATE user SET name = :name, email = :email WHERE id = :id';
    $parameters = [':name' => $name, ':email' => $email, ':id' => $id];
    query($pdo, $query, $parameters);
}

function deleteUser($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM user WHERE id = :id', $parameters);
}

function totalModules($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM module');
    $row = $query->fetch();
    return $row[0];
}

function getModule($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM module WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateModule($pdo, $id, $name){
    $query = 'UPDATE module SET name = :name WHERE id = :id';
    $parameters = [':name' => $name, ':id' => $id];
    query($pdo, $query, $parameters);
}

function deleteModule($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM module WHERE id = :id', $parameters);
}
?>