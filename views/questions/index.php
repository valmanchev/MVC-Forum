<h1>Questions</h1>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Counter</th>
        <th>Category</th>
        <th>Tag</th>
    </tr>
    <?php foreach($this->questions as $question) : ?>
        <tr>
            <td><?php echo $question[0] ?></td>
            <td><?php echo $question[1] ?></td>
            <td><?php echo $question[2] ?></td>
            <td><?php echo $question[3] ?></td>
            <td><?php echo $question[4] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="/questions/index/<?= $this->page - 1 ?>/<?= $this->pageSize ?>">Previous</a>
<a href="/questions/index/<?= $this->page + 1 ?>/<?= $this->pageSize ?>">Next</a>