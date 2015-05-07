<h1>Questions</h1>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Counter</th>
        <th>Category</th>
        <th>Tag</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php foreach($this->questions as $question) : ?>
        <tr>
            <td><?php echo $question[0] ?></td>
            <td><?php echo $question[1] ?></td>
            <td><?php echo $question[2] ?></td>
            <td><?php echo $question[3] ?></td>
            <td><?php echo $question[4] ?></td>
            <td><a href="/questions/delete/<?=$question[0]?> ">[Delete]</a></td>
            <td><form method="post" action="/questions/comment/<?=$question[0]?>">
                <input type="text" name="comment_name" value="<?php echo $this->getFieldValue('comment_name'); ?>">
                <?php echo $this->getValidationError('comment_name'); ?>
                <br/>
                <input type="submit" value="Comment">
            </form></td>
        </tr>


    <?php endforeach; ?>
</table>

<a href="/questions/create">[New]</a>

<a href="/questions/index/<?= $this->page - 1 ?>/<?= $this->pageSize ?>">Previous</a>
<a href="/questions/index/<?= $this->page + 1 ?>/<?= $this->pageSize ?>">Next</a>