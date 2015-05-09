<h1>Comment</h1>
<form method="post" action="/questions/comment/<?=$this->comment?>">
    Comment: <input type="text" name="comment_name" value="<?php echo $this->getFieldValue('comment_name'); ?>">
    <br/>
    <?php echo $this->getValidationError('comment_name'); ?>
    <br/>
    <input type="submit" value="Create">
</form>