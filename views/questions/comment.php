<h1>Create New Question</h1>

<form method="post" action="/questions/create">
    Name: <input type="text" name="question_name" value="<?php echo $this->getFieldValue('question_name'); ?>">
    <?php echo $this->getValidationError('question_name'); ?>
    <br/>
    <input type="submit" value="Create">
</form>
