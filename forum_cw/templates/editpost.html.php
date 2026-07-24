<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="postid" value="<?=$post['id'];?>">
    <label for="post_text">Edit your post here</label>
    <textarea name="post_text" rows="3" cols="40" required>
    <?=htmlspecialchars($post['post_text'], ENT_QUOTES, 'UTF-8')?>
    </textarea>

    <select name="users" required>
        <option value="">Select a user</option>
        <?php foreach ($users as $user): ?>
            <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>"
            <?=$user['id']==$post['userid']?'selected':''?>>
            <?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="modules" required>
        <option value="">Select a module</option>
        <?php foreach ($modules as $module): ?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>"
            <?=$module['id']==$post['moduleid']?'selected':''?>>
            <?=htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="image">Replace image (leave blank to keep current)</label>
    <input type="file" name="image">

    <input type="submit" name="submit" value="Save">
</form>