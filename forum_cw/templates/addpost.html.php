<form action="" method="post" enctype="multipart/form-data">
    <label for="post_text">Type your post here</label>
    <textarea name="post_text" rows="3" cols="40" required></textarea>

    <select name="users" required>
        <option value="">Select a user</option>
        <?php foreach ($users as $user): ?>
            <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="modules" required>
        <option value="">Select a module</option>
        <?php foreach ($modules as $module): ?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <label for="image">Upload an image</label>
    <input type="file" name="image">
    
    <input type="submit" name="submit" value="Add">
</form>