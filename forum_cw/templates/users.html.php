<p><?=$totalUsers?> users have been registered.</p>

<?php foreach($users as $user): ?>
    <blockquote>

        <?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8')?><br><br>

        <a href="mailto:<?=htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8');?>">
        <?=htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8');?></a><br><br>

        <a href="edituser.php?id=<?=$user['id']?>">Edit</a><br><br>

        <form action="deleteuser.php" method="post">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <input type="submit" value="Delete">
        </form>
    </blockquote>
    <?php endforeach;?>
