<form action="" method="post">
    <input type="hidden" name="userid" value="<?=$user['id'];?>">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8')?>" required>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?=htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8')?>" required>
    <input type="submit" name="submit" value="Save">
</form>
