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

function updatePost($pdo, $id, $post_text){
    $query = 'UPDATE post SET post_text = :post_text WHERE id = :id';
    $paremeters = [':post_text' => $post_text, ':id' => $id];
    query($pdo, $query, $paremeters);
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
?>