<form action="" method="post">
    <input type="hidden" name="moduleid" value="<?=$module['id'];?>">

    <label for="name">Module name</label>
    <input type="text" name="name" id="name" value="<?=htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8')?>" required>

    <input type="submit" name="submit" value="Save">
</form>
