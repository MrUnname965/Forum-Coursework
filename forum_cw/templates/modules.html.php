<p><?=$totalModules?> modules have been created.</p>

<?php foreach($modules as $module): ?>
    <blockquote>

        <?=htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8')?><br><br>

        <a href="editmodule.php?id=<?=$module['id']?>">Edit</a><br><br>

        <form action="deletemodule.php" method="post">
            <input type="hidden" name="id" value="<?=$module['id']?>">
            <input type="submit" value="Delete">
        </form>
    </blockquote>
    <?php endforeach;?>
