<p><?=$totalPosts?> posts have been submitted to the forum.</p>

<?php foreach($posts as $post): ?>
    <blockquote>

        <?=htmlspecialchars($post['post_text'], ENT_QUOTES, 'UTF-8')?><br><br>

        (by <a href="mailto:<?=htmlspecialchars($post['email'], ENT_QUOTES, 'UTF-8');?>">
        <?=htmlspecialchars($post['name'], ENT_QUOTES, 'UTF-8');?></a>)<br><br>

        <?php $display_date = date("D d M Y", strtotime($post['post_date']))?>
        <?=htmlspecialchars($display_date, ENT_QUOTES, 'UTF-8')?><br><br>

        <a href="editpost.php?id=<?=$post['id']?>">Edit</a><br><br>

        <img height="100px" src="<?=$imagePath ?? ''?>images/<?=htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8'); ?>"
        alt="Image uploaded by <?=htmlspecialchars($post['name'], ENT_QUOTES, 'UTF-8'); ?>" /><br><br>

        (<?=htmlspecialchars($post['module'], ENT_QUOTES, 'UTF-8');?> Module)

        <form action="deletepost.php" method="post">
            <input type="hidden" name="id" value="<?=$post['id']?>">
            <input type="submit" value="Delete">
        </form>
    </blockquote>
    <?php endforeach;?>