<form action="" method="post">
    <input type="hidden" name="postid" value="<?=$post['id'];?>">
    <label for="post_text">Edit your post here</label>
    <textarea name="post_text" rows="3" cols="40">
    <?=$post['post_text']?>
    </textarea>
    <input type="submit" name="submit" value="Save">
</form>